<?php

namespace App\Livewire;

use App\Services\YoutubeService;
use App\Traits\ExtractsYouTubeVideoId;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\View\View;
use Livewire\Attributes\Url;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Symfony\Component\HttpFoundation\StreamedResponse;
use Throwable;
use WireUi\Traits\WireUiActions;

class TranscriptComponent extends Component
{
    use ExtractsYouTubeVideoId;
    use WireUiActions;

    #[Validate(['required', 'string', 'max:255'])]
    public string $link = '';

    /**
     * Only the ID is kept in component state and the URL. Transcripts can be
     * large, so they are loaded from the cache on render instead.
     */
    #[Url(as: 'v', except: '')]
    public string $videoId = '';

    public function mount(): void
    {
        if ($this->videoId !== '' && (! $this->extractVideoId($this->videoId) || ! $this->withinRateLimit())) {
            $this->videoId = '';
        }

        $this->link = $this->videoId;
    }

    public function submit(): void
    {
        $this->validate();

        $videoId = $this->extractVideoId($this->link);

        if (! $videoId) {
            $this->addError('link', 'Unable to read a video ID from this link. Please check the URL.');

            return;
        }

        if (! $this->withinRateLimit()) {
            return;
        }

        $this->resetErrorBag();
        $this->videoId = $videoId;
    }

    /**
     * Each new video is a request to YouTube, so limit how fast one user can fetch them.
     */
    protected function withinRateLimit(): bool
    {
        $limiterKey = 'transcript:'.auth()->id();

        if (RateLimiter::tooManyAttempts($limiterKey, 20)) {
            $this->addError('link', 'Too many transcripts requested. Please try again in '.RateLimiter::availableIn($limiterKey).' seconds.');

            return false;
        }

        RateLimiter::hit($limiterKey);

        return true;
    }

    public function clear(): void
    {
        $this->reset('link', 'videoId');
    }

    public function download(YoutubeService $youtubeService): ?StreamedResponse
    {
        if (! $this->extractVideoId($this->videoId)) {
            return null;
        }

        $lines = $youtubeService->getTranscriptLines($this->videoId);
        $info = $youtubeService->getVideoInfo($this->videoId);

        $text = collect($lines)
            ->map(fn (array $line) => $line['timestamp'].' '.$line['text'])
            ->prepend('')
            ->prepend('https://www.youtube.com/watch?v='.$this->videoId)
            ->prepend($info['title'] ?? 'YouTube video')
            ->join(PHP_EOL);

        return response()->streamDownload(
            fn () => print ($text),
            'transcript-'.$this->videoId.'.txt',
            ['Content-Type' => 'text/plain; charset=UTF-8'],
        );
    }

    public function render(YoutubeService $youtubeService): View
    {
        $lines = [];
        $info = null;
        $error = null;

        if ($this->videoId !== '') {
            try {
                $info = $youtubeService->getVideoInfo($this->videoId);
                $lines = $youtubeService->getTranscriptLines($this->videoId);

                if ($lines === []) {
                    $error = 'This video has no transcript text.';
                }
            } catch (Throwable $exception) {
                report($exception);

                $error = 'Could not get a transcript for this video. Its captions may be turned off.';
            }
        }

        return view('livewire.transcript-component', compact('lines', 'info', 'error'));
    }
}
