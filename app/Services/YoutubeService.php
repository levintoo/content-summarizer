<?php

namespace App\Services;

use App\Constants\CacheDuration;
use Illuminate\Http\Client\PendingRequest;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;

class YoutubeService
{
    public function getVideoInfo(string $videoId): ?array
    {
        $cacheKey = 'video-info-'.$videoId;

        if ($info = Cache::get($cacheKey)) {
            return $info;
        }

        $details = $this->getPlayerResponse($videoId)['videoDetails'] ?? [];

        $title = $details['title'] ?? $this->titleFromWatchPage($videoId);
        $channel = $details['author'] ?? null;

        if (! $title && ! $channel) {
            return null;
        }

        $info = ['title' => $title ?? 'Youtube', 'channel' => $channel ?? 'Youtube'];

        Cache::put($cacheKey, $info, CacheDuration::MONTH);

        return $info;
    }

    public function getTranscriptUrl($videoId): string
    {
        $player = $this->getPlayerResponse($videoId);

        $track = $this->pickCaptionTrack($player['captions']['playerCaptionsTracklistRenderer']['captionTracks'] ?? []);

        if (! $track) {
            // Not cached, so the next attempt asks YouTube again.
            Cache::forget($this->playerCacheKey($videoId));
        }

        abort_unless($track, 404, ($player['playabilityStatus']['status'] ?? 'OK') === 'OK'
            ? 'This video has no captions, so a transcript is not available.'
            : 'YouTube did not return captions for this video. It may be private, age restricted or unavailable in this region.');

        // srv3 is a word-timed format; without it YouTube returns simple <text> lines.
        return preg_replace('/&fmt=[^&]*/', '', $track['baseUrl']);
    }

    public function getTranscript(string $videoId)
    {
        return Cache::remember('transcript-'.$videoId, CacheDuration::DAY, function () use ($videoId) {
            $body = $this->youtubeRequest()->get($this->getTranscriptUrl($videoId))->body();

            // An empty body means the signed caption URL expired, so fetch a fresh one next time.
            if (trim($body) === '') {
                Cache::forget($this->playerCacheKey($videoId));
            }

            return trim($body) === '' ? null : $body;
        });
    }

    /**
     * Parsed caption lines with timestamps, shared by the transcript page and
     * the summary pipeline so both read captions the same way.
     *
     * @return array<int, array{start: float, timestamp: string, text: string}>
     */
    public function getTranscriptLines(string $videoId): array
    {
        $transcriptXml = (string) $this->getTranscript($videoId);

        if (trim($transcriptXml) === '') {
            return [];
        }

        $reader = new \XMLReader;
        $reader->xml($transcriptXml);

        $lines = [];

        while (@$reader->read()) {
            if ($reader->nodeType !== \XMLReader::ELEMENT) {
                continue;
            }

            // Simple format uses <text start="seconds">, srv3 uses <p t="milliseconds">.
            $start = match ($reader->name) {
                'text' => (float) $reader->getAttribute('start'),
                'p' => $reader->getAttribute('t') !== null ? (float) $reader->getAttribute('t') / 1000 : null,
                default => null,
            };

            if ($start === null) {
                continue;
            }

            $text = trim(preg_replace('/\s+/', ' ', html_entity_decode($reader->readString(), ENT_QUOTES | ENT_HTML5)));

            if ($text === '') {
                continue;
            }

            $lines[] = [
                'start' => $start,
                'timestamp' => $this->formatTimestamp($start),
                'text' => $text,
            ];
        }

        $reader->close();

        return $lines;
    }

    public function formatTimestamp(float $startInSeconds): string
    {
        $totalSeconds = (int) $startInSeconds;

        $hours = intdiv($totalSeconds, 3600);
        $minutes = intdiv($totalSeconds % 3600, 60);
        $seconds = $totalSeconds % 60;

        return match (true) {
            $hours > 0 => sprintf('%d:%02d:%02d', $hours, $minutes, $seconds),
            $minutes > 0 => sprintf('%02d:%02d', $minutes, $seconds),
            default => sprintf('0:%02d', $seconds),
        };
    }

    /**
     * YouTube rejects outdated web clients, so the player is requested as the
     * client set in config/services.php. Caption URLs are signed and expire,
     * so the response is only cached briefly.
     *
     * @return array<string, mixed>
     */
    protected function getPlayerResponse(string $videoId): array
    {
        return Cache::remember($this->playerCacheKey($videoId), CacheDuration::HOUR, function () use ($videoId) {
            $apiKey = $this->innertubeApiKey($videoId);

            return $this->youtubeRequest()
                ->post('https://www.youtube.com/youtubei/v1/player'.($apiKey ? '?key='.$apiKey : ''), [
                    'videoId' => $videoId,
                    'context' => [
                        'client' => [
                            'hl' => 'en',
                            'clientName' => config('services.youtube.client_name'),
                            'clientVersion' => config('services.youtube.client_version'),
                        ],
                    ],
                ])
                ->json() ?? [];
        });
    }

    /**
     * Prefers English captions written by a person, then English auto captions,
     * then any human captions, then whatever is available.
     *
     * @param  array<int, array<string, mixed>>  $tracks
     * @return array<string, mixed>|null
     */
    protected function pickCaptionTrack(array $tracks): ?array
    {
        $tracks = collect($tracks)->filter(fn (array $track) => ! empty($track['baseUrl']));

        $isEnglish = fn (array $track) => str_starts_with((string) ($track['languageCode'] ?? ''), 'en');
        $isManual = fn (array $track) => ($track['kind'] ?? null) !== 'asr';

        return $tracks->first(fn (array $track) => $isEnglish($track) && $isManual($track))
            ?? $tracks->first($isEnglish)
            ?? $tracks->first($isManual)
            ?? $tracks->first();
    }

    protected function innertubeApiKey(string $videoId): ?string
    {
        preg_match('/"INNERTUBE_API_KEY":\s*"([A-Za-z0-9_-]+)"/', $this->watchPage($videoId), $matches);

        return $matches[1] ?? null;
    }

    protected function titleFromWatchPage(string $videoId): ?string
    {
        if (! preg_match('/<title>(.*?)<\/title>/s', $this->watchPage($videoId), $matches)) {
            return null;
        }

        $title = trim(html_entity_decode(preg_replace('/\s*-\s*YouTube$/', '', $matches[1]), ENT_QUOTES | ENT_HTML5));

        return $title !== '' && $title !== 'YouTube' ? $title : null;
    }

    protected function watchPage(string $videoId): string
    {
        return Cache::remember('watch-page-'.$videoId, CacheDuration::HOUR, fn () => $this->youtubeRequest()
            ->get('https://www.youtube.com/watch', ['v' => $videoId])
            ->body());
    }

    protected function youtubeRequest(): PendingRequest
    {
        // The consent cookie skips the EU cookie wall, which otherwise replaces the watch page.
        return Http::timeout(15)
            ->withHeaders([
                'Accept-Language' => 'en-US,en;q=0.9',
                'Cookie' => 'CONSENT=YES+cb; SOCS=CAI',
            ]);
    }

    protected function playerCacheKey(string $videoId): string
    {
        return 'youtube-player-'.$videoId;
    }
}
