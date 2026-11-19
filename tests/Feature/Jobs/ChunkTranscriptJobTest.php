<?php

use App\Enums\SummaryLengthEnum;
use App\Jobs\ChunkTranscriptJob;
use App\Jobs\SummarizeChunkJob;
use App\Models\AiModel;
use App\Models\Content;
use App\Models\Preference;
use App\Models\Summary;
use App\Models\User;
use Illuminate\Bus\PendingBatch;
use Illuminate\Support\Facades\Bus;
use Illuminate\Support\Facades\Http;

function summaryForTranscript(string $transcriptXml): Summary
{
    Http::fake([
        'youtubei.googleapis.com/*' => Http::response([
            'captions' => ['playerCaptionsTracklistRenderer' => ['captionTracks' => [['baseUrl' => 'https://captions.test/track']]]],
        ]),
        'captions.test/*' => Http::response($transcriptXml),
    ]);

    $user = User::factory()->create();
    $model = AiModel::factory()->create(['context_window' => 40]);
    Preference::factory()->for($user)->create([
        'ai_model_id' => $model->id,
        'provider_id' => $model->provider_id,
        'use_custom_prompt' => false,
        'summary_length' => SummaryLengthEnum::balanced,
    ]);

    return Summary::factory()->for($user)->for(Content::factory()->state(['video_id' => 'abc123XYZ_-']))->create();
}

test('transcript chunks are summarized in one batch', function () {
    Bus::fake();

    $summary = summaryForTranscript('<transcript><text start="0">first part of the video</text><text start="65">second part of the video</text><text start="3700">third part of the video</text></transcript>');

    (new ChunkTranscriptJob($summary, ['language' => '', 'summary_length' => '']))->handle();

    Bus::assertBatched(fn (PendingBatch $batch) => $batch->jobs->count() === 3
        && $batch->jobs->every(fn ($job) => $job instanceof SummarizeChunkJob));

    expect($summary->content->chunks()->count())->toBe(3);
});

test('an empty transcript marks the summary as failed', function () {
    Bus::fake();

    $summary = summaryForTranscript('<transcript></transcript>');

    (new ChunkTranscriptJob($summary, ['language' => '', 'summary_length' => '']))->handle();

    Bus::assertNothingBatched();
    expect($summary->fresh()->failed)->toBeTruthy();
});
