<?php

namespace App\Jobs;

use App\Models\Chunk;
use App\Models\Summary;
use App\Services\YoutubeService;
use Illuminate\Bus\Batchable;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
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
        $chunkSize = $this->summary->user->preference->aiModel->context_window * 0.5;

        while ($reader->read()) {
            if ($reader->nodeType == XMLReader::ELEMENT && $reader->name == 'text') {

                $startInSeconds = (float) $reader->getAttribute('start');
                $decodedText = htmlspecialchars_decode($reader->readString());

                $hours = floor($startInSeconds / 3600);
                $minutes = floor(($startInSeconds % 3600) / 60);
                $seconds = floor($startInSeconds % 60);

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

                    SummarizeChunkJob::dispatch(chunk: $chunk, summary: $this->summary);

                    $transcriptChunk = '';
                }
            }
        }

        if (! empty(trim($transcriptChunk))) {
            $chunk = Chunk::create([
                'content_id' => $this->summary->content->id,
                'chunk' => $transcriptChunk,
            ]);

            SummarizeChunkJob::dispatch(chunk: $chunk, summary: $this->summary);
        }

        CombineChunksJob::dispatch(summary: $this->summary, userInput: $this->userInput);
    }

    public function failed(Throwable $throwable): void
    {
        Log::error($throwable->getMessage());
    }
}
