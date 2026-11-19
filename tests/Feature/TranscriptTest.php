<?php

use App\Livewire\TranscriptComponent;
use App\Models\User;
use Illuminate\Support\Facades\Http;
use Livewire\Livewire;

function fakeYoutubeTranscript(string $xml): void
{
    Http::fake([
        'youtubei.googleapis.com/*' => Http::response([
            'captions' => ['playerCaptionsTracklistRenderer' => ['captionTracks' => [['baseUrl' => 'https://captions.test/track']]]],
        ]),
        'captions.test/*' => Http::response($xml),
        'www.youtube.com/*' => Http::response('<title>Test Video - YouTube</title>'),
    ]);
}

beforeEach(function () {
    // getVideoInfo scrapes the watch page directly, so cache it to avoid a network call.
    cache()->put('video-info-dQw4w9WgXcQ', ['title' => 'Test Video', 'channel' => 'Test Channel']);
});

test('guests cannot open the transcript page', function () {
    $this->get(route('transcript'))->assertRedirect(route('login'));
});

test('the transcript page is in the menu', function () {
    $this->actingAs(User::factory()->create())
        ->get(route('transcript'))
        ->assertOk()
        ->assertSee('Get Transcript');
});

test('a link shows the transcript with timestamps', function () {
    fakeYoutubeTranscript('<transcript><text start="5">Hello &amp;#39;world&amp;#39;</text><text start="3725">Final words</text></transcript>');

    Livewire::actingAs(User::factory()->create())
        ->test(TranscriptComponent::class)
        ->set('link', 'https://youtu.be/dQw4w9WgXcQ')
        ->call('submit')
        ->assertHasNoErrors()
        ->assertSet('videoId', 'dQw4w9WgXcQ')
        ->assertSee('Test Video')
        ->assertSee('0:05')
        ->assertSee("Hello 'world'")
        ->assertSee('1:02:05')
        ->assertSee('Final words');
});

test('the transcript can be downloaded', function () {
    fakeYoutubeTranscript('<transcript><text start="5">Hello world</text></transcript>');

    Livewire::actingAs(User::factory()->create())
        ->test(TranscriptComponent::class)
        ->set('link', 'dQw4w9WgXcQ')
        ->call('submit')
        ->call('download')
        ->assertFileDownloaded('transcript-dQw4w9WgXcQ.txt');
});

test('invalid links show an error', function () {
    Livewire::actingAs(User::factory()->create())
        ->test(TranscriptComponent::class)
        ->set('link', 'https://evil.test/watch?v=dQw4w9WgXcQ')
        ->call('submit')
        ->assertHasErrors('link')
        ->assertSet('videoId', '');
});

test('videos without captions show a friendly message', function () {
    Http::fake(['youtubei.googleapis.com/*' => Http::response(['captions' => null])]);

    Livewire::actingAs(User::factory()->create())
        ->test(TranscriptComponent::class)
        ->set('link', 'dQw4w9WgXcQ')
        ->call('submit')
        ->assertSee('Its captions may be turned off');
});
