<?php

namespace App\Services;

use App\Constants\CacheDuration;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;

class YoutubeService
{
    function getVideoInfo(string $videoId): ?array
    {
        $cacheKey = 'video-info-' . $videoId;

        $info = Cache::get($cacheKey);

        if ($info) {
            return $info;
        }

        $video_url = "https://www.youtube.com/watch?v=$videoId";

        $content = file_get_contents($video_url);

        $doc = new \DOMDocument();

        @$doc->loadHTML($content);

        $title = $doc->getElementsByTagName('title')->item(0)->textContent;

        $channelInfo = $doc->getElementsByTagName('script')->item(19)->textContent;

        $channel = json_decode($channelInfo)?->itemListElement[0]?->item?->name;

        $info = $title || $channel ? ['title' => explode(' - YouTube', $title)[0], 'channel' => $channel ?? 'Youtube' ] : null;

        if($info) {
            Cache::add($cacheKey, $info, 60 * 60 * 24 * 30);
        }

        return $info;
    }

    public function getTranscriptUrl($videoId): string
    {
        $transcriptUrl = Cache::remember('transcript-url-' . $videoId, CacheDuration::DAY, function () use ($videoId) {
            return Http::post('https://youtubei.googleapis.com/youtubei/v1/player', [
                'videoId' => $videoId,
                "context" => [
                    "client" => [
                        "hl" => "en",
                        "clientName" => "WEB",
                        "clientVersion" => "2.20210721.00.00"
                    ]
                ]
            ])->json("captions.playerCaptionsTracklistRenderer.captionTracks.0.baseUrl");
        });

        abort_unless($transcriptUrl,404,'Could not retrieve a transcript for the video. This is most likely caused disabled subtitles for this video');

        return $transcriptUrl;
    }

    public function getTranscript(string $videoId)
    {
        $transcriptUrl = $this->getTranscriptUrl($videoId);

        return Cache::remember('transcript-' . $videoId, CacheDuration::DAY, function () use($videoId, $transcriptUrl) {
            return Http::post($transcriptUrl, [
                "videoId" => $videoId,
            ])->body();
        });
    }
}
