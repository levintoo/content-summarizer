<?php

namespace App\Jobs;

use App\Events\QuestionAnsweredEvent;
use App\Models\Content;
use App\Models\Preference;
use App\Models\Question;
use App\Services\OpenAIService;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;
use Throwable;

class AskQuestionJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public function __construct(
        private readonly Question $question,
        private readonly Preference $preference,
        private readonly Content $content,
        private readonly array $userInput)
    {
    }

    public function handle(OpenAIService $openAIService): void
    {
        $title = $this->content->title;
        $channel = $this->content->channel;

        $messages = [
            [
                'role' => 'system',
                'content' => 'You are an AI assistant helping users understand YouTube video content.
        Follow these steps before answering any question:
        1. **Identify the key subject of the question** (e.g., a person, place, event, or concept).
        2. **Check if you need additional details** (e.g., if the question asks about a person’s age, determine their identity first).
        3. **Extract relevant information** from the video title, channel name, and summary but never mention you extracted them from the input.
        4. **Use reasoning to deduce missing details** (e.g., if asked about a singer’s age, first find their name, then check when they were born, and calculate their current age).
        5. **Provide a clear and confident answer** based on the gathered information. Never stop at "information not provided"; instead, attempt to deduce an answer logically before stating that information is unavailable.
        If key details are completely missing, suggest the best way to find them.
        Never reveal your sources to the video summary.'
            ],
            [
                'role' => 'user',
                'content' =>
                    "Always keep responses clear, concise, and relevant while maintaining the preferred language."
                    . " User Question: {$this->userInput['userQuestion']}"
                    . ($this->userInput['context'] ? " Video Title: {$title}" : '')
                    . ($this->userInput['context'] ? " Channel Name: {$channel}" : '')
                    . (!empty($this->userInput['language']) ? " Preferred Language: {{$this->userInput['language']}}" : '')
                    . ($this->userInput['context'] ? " Video Summary: {{$this->content->summary}}" : '')
            ],
        ];

        $response = $openAIService->chat(
            key: $this->preference->apiKey->key,
            messages: $messages,
            model: $this->preference->aiModel->name
        );

        $this->question->update([
            'answer' => $response['choices'][0]['message']['content'],
            'ai_model_id' => $this->preference->ai_model_id,
            'prompt_tokens' => $response['usage']['prompt_tokens'] ?? 0,
            'completion_tokens' => $response['usage']['completion_tokens'] ?? 0,
        ]);

        event(new QuestionAnsweredEvent($this->question->summary->id, $this->question->user_id));
    }

    public function failed(Throwable $throwable): void
    {
        $this->question->update([
           'answer' => 'Something went wrong.',
           'failed' => true,
        ]);

        event(new QuestionAnsweredEvent($this->question->summary->id, $this->question->user_id));

        Log::error($throwable->getMessage());
    }
}
