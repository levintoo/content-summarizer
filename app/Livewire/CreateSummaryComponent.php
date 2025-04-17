<?php

namespace App\Livewire;

use App\Enums\SummaryLengthEnum;
use App\Jobs\ChunkTranscriptJob;
use App\Models\Content;
use App\Models\Summary;
use App\Services\YoutubeService;
use App\Traits\ExtractsYouTubeVideoId;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rules\Enum;
use Illuminate\View\View;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Throwable;
use WireUi\Traits\WireUiActions;

class CreateSummaryComponent extends Component
{
    use ExtractsYouTubeVideoId;
    use WireUiActions;

    #[Validate(['required', 'max:255'])]
    public string $link = '';

    #[Validate(['nullable', 'max:255'])]
    public string $language = '';

    #[Validate(['nullable', new enum(SummaryLengthEnum::class)])]
    public string $summary_length;

    public function mount(): void
    {
        $preferences = auth()->user()->preference;
        $this->summary_length = $preferences?->summary_length?->value ?? (string) SummaryLengthEnum::balanced->value;
        $this->language = $preferences->language ?? '';
    }

    public function submit(YoutubeService $youtubeService)
    {
        try {
            $this->validate();
        } catch (Exception $e) {
            $this->notification()->error($e->getMessage());

            return;
        }

        $user = auth()->user();
        $preference = $user?->preference;

        $validationChecks = [
            [$user->hasActiveSubscription(), 'You do not have an active subscription yet'],
            [$preference?->provider_id, 'Please select a valid provider in settings'],
            [$preference?->ai_model_id, 'Please select a valid AI model in settings'],
            [$preference?->api_key_id, 'Please add an API key in settings'],
        ];

        foreach ($validationChecks as [$condition, $message]) {
            if (! $condition) {
                $this->notification()->error($message);

                return;
            }
        }

        $videoId = $this->extractVideoId($this->link);

        if (! $videoId) {
            $this->notification()->error('Unable to extract video ID, please check the video URL');

            return;
        }

        try {
            $youtubeService->getTranscriptUrl(videoId: $videoId);

            $videoInfo = $youtubeService->getVideoInfo(videoId: $videoId);

            $summary = DB::transaction(function () use ($videoInfo, $videoId, &$summary) {
                $content = Content::create([
                    'title' => $videoInfo ? $videoInfo['title'] : 'Youtube',
                    'channel' => $videoInfo ? $videoInfo['channel'] : 'Youtube',
                    'video_id' => $videoId,
                ]);

                return Summary::create([
                    'user_id' => auth()->id(),
                    'content_id' => $content->id,
                    'provider_id' => auth()->user()->preference->provider_id,
                    'ai_model_id' => auth()->user()->preference->ai_model_id,
                ]);
            });

            $userInput = [
                'language' => $this->language ?? '',
                'summary_length' => (string) $this->summary_length ?? '',
            ];

            ChunkTranscriptJob::dispatch($summary, $userInput);

            return $this->redirect(route('summary.show', $summary->id), navigate: true);
        } catch (Throwable $exception) {
            dd($exception);
            $this->notification()->error('Error', 'Something went wrong. This is most likely caused by disabled subtitles for this video.');

            return;
        }
    }

    public function render(): View
    {
        return view('livewire.create-summary-component');
    }
}
