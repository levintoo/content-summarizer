<?php

namespace App\Traits;

trait ExtractsYouTubeVideoId
{
    /**
     * Supports watch, youtu.be, Shorts, embed and live links, plus bare video IDs.
     * Only YouTube hosts are accepted and the ID must match YouTube's format, so
     * the value is safe to use in outgoing request URLs.
     */
    public function extractVideoId($url): ?string
    {
        $url = trim((string) $url);

        if ($this->isValidVideoId($url)) {
            return $url;
        }

        if (! preg_match('#^https?://#i', $url)) {
            $url = 'https://'.$url;
        }

        $host = strtolower((string) parse_url($url, PHP_URL_HOST));
        $host = preg_replace('/^(www\.|m\.|music\.)/', '', $host);
        $path = trim((string) parse_url($url, PHP_URL_PATH), '/');

        $candidate = match (true) {
            $host === 'youtu.be' => explode('/', $path)[0],
            in_array($host, ['youtube.com', 'youtube-nocookie.com'], true) => $this->videoIdFromYoutubePath($url, $path),
            default => null,
        };

        return $candidate !== null && $this->isValidVideoId($candidate) ? $candidate : null;
    }

    protected function videoIdFromYoutubePath(string $url, string $path): ?string
    {
        $segments = explode('/', $path);

        if (in_array($segments[0], ['shorts', 'embed', 'live', 'v'], true)) {
            return $segments[1] ?? null;
        }

        parse_str((string) parse_url($url, PHP_URL_QUERY), $query);

        return is_string($query['v'] ?? null) ? $query['v'] : null;
    }

    protected function isValidVideoId(string $value): bool
    {
        return preg_match('/^[A-Za-z0-9_-]{11}$/', $value) === 1;
    }
}
