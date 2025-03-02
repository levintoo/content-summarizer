<?php

namespace App\Jobs;

use App\Models\Chunk;
use App\Models\Summary;
use App\Services\OpenAIService;
use Illuminate\Bus\Batchable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class SummarizeChunkJob implements ShouldQueue
{
    use Batchable, Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct(public Chunk $chunk, public Summary $summary) {}

    /**
     * Execute the job.
     */
    public function handle(OpenAIService $openAIService): void
    {
        $summary = $this->summary;
        $user = $summary->user;
        $preference = $user->preference;
        $content = $this->summary->content;

        $title = $content->title;
        $channel = $content->channel;

        $messages = [
            [
                'role' => 'system',
                'content' => 'You are an expert video transcript summarizer.',
            ],
            [
                'role' => 'user',
                'content' => "
                Summarize the following part of a YouTube video transcript.
                        You will highlight key points from the video.
                                Refer to the speakers by their names or pronouns whenever possible.

        Present the points in bullet form, including timestamps whenever available.
        Auto-correct any misspelled words.
        Avoid using title tags (e.g., h1-h5).

        The video is titled {$title} by {$channel}.
        Transcript part: {$this->chunk->chunk}",
            ],
        ];

        $response = $openAIService->chat(
            key: $preference->apiKey->key,
            messages: $messages,
            model: $preference->aiModel->name
        );

        $this->chunk->update([
            'summary' => $response['choices'][0]['message']['content'],
            'ai_model_id' => $preference->ai_model_id,
            'prompt_tokens' => $response['usage']['prompt_tokens'] ?? 0,
            'completion_tokens' => $response['usage']['completion_tokens'] ?? 0,
        ]);
    }

    public function failed(\Throwable $throwable): void
    {
        Log::error($throwable->getMessage());
    }
}
