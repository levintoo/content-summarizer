<?php

namespace App\Services;

use App\Constants\CacheDuration;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;

class YoutubeService
{
    public function getVideoInfo(string $videoId): ?array
    {
        $cacheKey = 'video-info-'.$videoId;

        $info = Cache::get($cacheKey);

        if ($info) {
            return $info;
        }

        $video_url = "https://www.youtube.com/watch?v=$videoId";

        $content = file_get_contents($video_url);

        $doc = new \DOMDocument;

        @$doc->loadHTML($content);

        $xpath = new \DOMXPath($doc);

        $nodes = $xpath->query('//span[@itemtype="https://schema.org/ListItem"]//meta[@itemprop="name"]');

        $channel = $nodes->item(0)?->getAttribute('content');

        $title = $doc->getElementsByTagName('title')->item(0)?->textContent;

        $info = $title || $channel ? ['title' => explode(' - YouTube', $title ?? 'Youtube')[0], 'channel' => $channel ?? 'Youtube'] : null;

        if ($info) {
            Cache::add($cacheKey, $info, 60 * 60 * 24 * 30);
        }

        return $info;
    }

    public function getTranscriptUrl($videoId): string
    {
        $transcriptUrl = Cache::remember('transcript-url-'.$videoId, CacheDuration::DAY, function () use ($videoId) {
            return Http::post('https://youtubei.googleapis.com/youtubei/v1/player', [
                'videoId' => $videoId,
                'context' => [
                    'client' => [
                        'hl' => 'en',
                        'clientName' => 'WEB',
                        'clientVersion' => '2.20210721.00.00',
                    ],
                ],
            ])->json('captions.playerCaptionsTracklistRenderer.captionTracks.0.baseUrl');
        });

        abort_unless($transcriptUrl, 404, 'Could not retrieve a transcript for the video. This is most likely caused disabled subtitles for this video');

        return $transcriptUrl;
    }

    public function getTranscript(string $videoId)
    {
        $transcriptUrl = $this->getTranscriptUrl($videoId);

        return Cache::remember('transcript-'.$videoId, CacheDuration::DAY, function () use ($videoId, $transcriptUrl) {
            return Http::post($transcriptUrl, [
                'videoId' => $videoId,
            ])->body();
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
            if ($reader->nodeType !== \XMLReader::ELEMENT || $reader->name !== 'text') {
                continue;
            }

            $start = (float) $reader->getAttribute('start');
            $text = trim(html_entity_decode($reader->readString(), ENT_QUOTES | ENT_HTML5));

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
}
