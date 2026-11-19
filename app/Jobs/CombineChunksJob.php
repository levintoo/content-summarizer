<?php

namespace App\Jobs;

use App\Events\ContentSummarisedEvent;
use App\Models\Summary;
use App\Services\OpenAIService;
use Illuminate\Bus\Batchable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;
use Throwable;

class CombineChunksJob implements ShouldQueue
{
    use Batchable, Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct(public Summary $summary, public array $userInput)
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(OpenAIService $openAIService): void
    {
        $summary = $this->summary;
        $user = $summary->user;
        $preference = $user->preference;
        $content = $summary->content;

        // The batch only calls this job once every chunk is summarized.
        $transcript = $content->chunks()->oldest('id')->pluck('summary')->join(' ');

        $title = $content->title;
        $channel = $content->channel;

        $language = $this->userInput['language'] ?: $preference->language;
        $summary_length = $this->userInput['summary_length'] ?: $preference->summary_length;

        $userPrompt = $preference?->use_custom_prompt
            ? $preference->custom_prompt.' The video is titled '.$title.' by '.$channel.'
               Transcript: '.$transcript
            : "
        Summarize the following YouTube video transcript in a structured format with bulleted sections and nested bullet points for content.

        You will highlight key points from the video.

        Refer to the speakers by their names or pronouns whenever possible.

        **Summary Structure:**

        1. **Introduction:**
           - Start with a <p> tag providing a brief overview of the main topics or themes.

      2. **Sectional Breakdown:**
- Use bullet points with clear, descriptive headers (e.g., **Introduction to Jimmy Falcone** [0:45], **Comedic Canadian Humor** [2:10]).
- Place timestamps at the end of each header (not in bold).
- Under each header, list concise bullet points covering key details.
- Highlight specific events only when essential.

**Example:**
- **Introduction to Jimmy Falcone** [0:45]
  - Jimmy wants his son to join the crime family.
  - Petey's kindness contrasts with the family's criminal ways.
  - Petey dreams of being a physicist, clashing with Jimmy’s hopes.
- **Comedic Canadian Humor** [2:10]
  - Jokes about Canada’s liquor laws and Prohibition.
  - Humor on Canadian stereotypes and party culture.

        3. **Conclusion:**
           - End with a summarizing paragraph in a <p> tag.
           - Recap overarching themes, key takeaways, and the overall impact of the video.

        **Formatting Rules:**
           - All section headers should be bold and bulleted.
           - The content within each section should also be in bullet form.
           - Timestamps should always appear at the start of bullet points in the format [m:s].
           - Avoid using title tags (e.g., h1-h5); only use <p> tags for intros and conclusions.
           - Maintain a concise and efficient format, minimizing bullet points while retaining all relevant information.

                The video is titled $title by $channel
               Transcript: $transcript";

        $systemPrompt = 'You are an expert video transcript summarizer.'.'- Apply user preferences when specified:'
            .($language ? '- Preferred language: ['.$language."]\n" : '')
            .($summary_length ? '- Preferred summary length: ['.$summary_length."]\n" : '');

        $model = $preference->aiModel->name;

        $messages = match ($model) {
            'gpt-4o-mini' => [
                [
                    'role' => 'system',
                    'content' => $systemPrompt,
                ],
                [
                    'role' => 'user',
                    'content' => $userPrompt,
                ],
            ],
            default => [
                [
                    'role' => 'user',
                    'content' => $systemPrompt.' '.$userPrompt,
                ],
            ],
        };

        $response = $openAIService->cachedChat(
            key: $preference->apiKey->key,
            messages: $messages,
            model: $model,
        );

        $content->update([
            'summary' => $response['choices'][0]['message']['content'],
            'ai_model_id' => $preference->ai_model_id,
            'prompt_tokens' => $response['usage']['prompt_tokens'] ?? 0,
            'completion_tokens' => $response['usage']['completion_tokens'] ?? 0,
        ]);

        ContentSummarisedEvent::dispatch($this->summary->id);
    }

    public function failed(Throwable $throwable): void
    {
        $this->summary->update([
            'failed' => true,
        ]);

        ContentSummarisedEvent::dispatch($this->summary->id);

        Log::error($throwable->getMessage());
    }
}
