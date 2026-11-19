<?php

namespace App\Jobs;

use App\Events\ContentSummarisedEvent;
use App\Models\Chunk;
use App\Models\Summary;
use App\Services\YoutubeService;
use Illuminate\Bus\Batchable;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Bus;
use Illuminate\Support\Facades\Log;
use Throwable;
use XMLReader;

class ChunkTranscriptJob implements ShouldQueue
{
    use Batchable, Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public function __construct(public Summary $summary, public array $userInput) {}

    public function handle(): void
    {
        $videoId = $this->summary->content->video_id;

        $youtube = new YoutubeService;

        $transcriptXml = $youtube->getTranscript($videoId);

        $reader = new XMLReader;
        $reader->xml($transcriptXml);

        $transcriptChunk = '';
        $chunkJobs = [];
        $chunkSize = $this->summary->user->preference->aiModel->context_window * 0.5;

        while ($reader->read()) {
            if ($reader->nodeType == XMLReader::ELEMENT && $reader->name == 'text') {

                $startInSeconds = (float) $reader->getAttribute('start');
                $decodedText = htmlspecialchars_decode($reader->readString());

                $hours = floor((int) $startInSeconds / 3600);
                $minutes = floor(((int) $startInSeconds % 3600) / 60);
                $seconds = floor((int) $startInSeconds % 60);

                if ($hours > 0) {
                    $formattedStart = sprintf('%d:%02d:%02d', $hours, $minutes, $seconds);
                } elseif ($minutes > 0) {
                    $formattedStart = sprintf('%02d:%02d', $minutes, $seconds);
                } else {
                    $formattedStart = sprintf('0:%02d', $seconds);
                }

                $lineWithTimestamp = $formattedStart.' '.$decodedText.' ';

                $transcriptChunk .= $lineWithTimestamp;

                if (strlen($transcriptChunk) >= $chunkSize) {
                    $chunk = Chunk::create([
                        'content_id' => $this->summary->content->id,
                        'chunk' => $transcriptChunk,
                    ]);

                    $chunkJobs[] = new SummarizeChunkJob(chunk: $chunk, summary: $this->summary);

                    $transcriptChunk = '';
                }
            }
        }

        if (! empty(trim($transcriptChunk))) {
            $chunk = Chunk::create([
                'content_id' => $this->summary->content->id,
                'chunk' => $transcriptChunk,
            ]);

            $chunkJobs[] = new SummarizeChunkJob(chunk: $chunk, summary: $this->summary);
        }

        if ($chunkJobs === []) {
            Log::warning("No transcript text found for video [{$videoId}].");

            self::markFailed($this->summary);

            return;
        }

        $summary = $this->summary;
        $userInput = $this->userInput;

        // Combining waits for every chunk, and a single failed chunk fails the summary.
        Bus::batch($chunkJobs)
            ->name("summary-{$summary->id}")
            ->then(static fn () => CombineChunksJob::dispatch(summary: $summary, userInput: $userInput))
            ->catch(static fn () => self::markFailed($summary))
            ->dispatch();
    }

    public static function markFailed(Summary $summary): void
    {
        $summary->update(['failed' => true]);

        ContentSummarisedEvent::dispatch($summary->id);
    }

    public function failed(Throwable $throwable): void
    {
        self::markFailed($this->summary);

        Log::error($throwable->getMessage());
    }
}
