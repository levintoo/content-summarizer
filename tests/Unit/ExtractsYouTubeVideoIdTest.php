<?php

use App\Traits\ExtractsYouTubeVideoId;

function videoIdFrom(string $url): ?string
{
    return (new class
    {
        use ExtractsYouTubeVideoId;
    })->extractVideoId($url);
}

test('video ids are extracted from supported links', function (string $url) {
    expect(videoIdFrom($url))->toBe('dQw4w9WgXcQ');
})->with([
    'https://www.youtube.com/watch?v=dQw4w9WgXcQ',
    'https://youtube.com/watch?v=dQw4w9WgXcQ&t=42s',
    'https://m.youtube.com/watch?v=dQw4w9WgXcQ',
    'youtube.com/watch?v=dQw4w9WgXcQ',
    'https://youtu.be/dQw4w9WgXcQ?si=abc',
    'https://www.youtube.com/shorts/dQw4w9WgXcQ',
    'https://www.youtube.com/embed/dQw4w9WgXcQ',
    'https://www.youtube.com/live/dQw4w9WgXcQ',
    'dQw4w9WgXcQ',
]);

test('invalid or foreign links are rejected', function (string $url) {
    expect(videoIdFrom($url))->toBeNull();
})->with([
    'https://evil.test/watch?v=dQw4w9WgXcQ',
    'https://www.youtube.com/watch?v=short',
    'https://www.youtube.com/watch?v=dQw4w9WgXcQ/../x',
    'https://www.youtube.com/watch',
    'not a link',
]);
