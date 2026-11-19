<?php

namespace App\Livewire;

use App\Jobs\AskQuestionJob;
use App\Models\Content;
use App\Models\Question;
use App\Models\Summary;
use Exception;
use Illuminate\View\View;
use Livewire\Attributes\Validate;
use Livewire\Component;
use WireUi\Traits\WireUiActions;

class ShowSummaryComponent extends Component
{
    public Summary $summary;

    public Content $content;

    #[Validate(['required', 'max:25000'])]
    public string $userQuestion = '';

    #[Validate(['nullable', 'boolean'])]
    public bool $context = true;

    #[Validate(['nullable', 'max:255'])]
    public string $language = '';

    use WireUiActions;

    public function mount(Summary $summary): void
    {
        $this->authorize('view', $summary);
        $this->summary = $summary;
        $this->content = $summary->content;
        $this->language = auth()->user()->preference?->language ?? '';
    }

    public function getListeners(): array
    {
        return [
            "echo-private:content-transcribed-{$this->summary->id},ContentSummarisedEvent" => 'contentSummarised',
            "echo-private:summary.{$this->summary->id}.user.{$this->summary->user_id},QuestionAnsweredEvent" => 'questionAnswered',
        ];
    }

    public function contentSummarised(): void
    {
        $this->content = $this->summary->content;
    }

    public function questionAnswered(): void
    {
        $this->content = $this->summary->content;
    }

    public function like(): void
    {
        $this->authorize('update', $this->summary);

        $this->summary->update([
            'feedback' => 1,
        ]);
    }

    public function dislike(): void
    {
        $this->authorize('update', $this->summary);

        $this->summary->update([
            'feedback' => -1,
        ]);
    }

    public function likeAnswer(Question $question): void
    {
        $this->authorize('update', $question);

        $question->update(['feedback' => 1]);
    }

    public function dislikeAnswer(Question $question): void
    {
        $this->authorize('update', $question);

        $question->update(['feedback' => -1]);
    }

    public function ask(): void
    {
        $this->authorize('update', $this->summary);

        if (! $this->content->summary) {
            $this->notification()->error('Please wait for the summary first.');

            return;
        }

        try {
            $this->validate();
        } catch (Exception $e) {
            $this->notification()->error($e->getMessage());

            return;
        }

        $summary = $this->summary;
        $user = $summary->user;
        $preference = $user->preference;
        $content = $this->summary->content;

        $validationChecks = [
            [$user->hasActiveSubscription() || $user->isOnTrial(), 'You do not have an active subscription yet'],
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

        $question = $summary->questions()->create([
            'user_id' => $user->id,
            'question' => $this->userQuestion,
        ]);

        $userInput = [
            'userQuestion' => $this->userQuestion ?? null,
            'context' => $this->context ?? false,
            'language' => $this->language ?? null,
        ];

        AskQuestionJob::dispatch($question, $preference, $content, $userInput);

        $this->reset('userQuestion');
    }

    public function render(): View
    {
        $questions = $this->summary->questions()->simplePaginate(100);

        $progress = ['done' => 0, 'total' => 0];

        if (! $this->content->summary && ! $this->summary->failed) {
            $progress = [
                'done' => $this->content->chunks()->whereNotNull('summary')->count(),
                'total' => $this->content->chunks()->count(),
            ];
        }

        return view('livewire.show-summary-component', compact('questions', 'progress'));
    }
}
