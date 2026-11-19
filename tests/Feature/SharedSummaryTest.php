<?php

use App\Models\Content;
use App\Models\Summary;

test('shared summaries are public', function () {
    $summary = Summary::factory()->for(Content::factory()->state(['title' => 'Shared video']))->create(['shared' => true]);

    $this->get(route('summary.shared', $summary))
        ->assertOk()
        ->assertSee('Shared video');
});

test('unshared summaries are not found for other people', function () {
    $summary = Summary::factory()->create(['shared' => false]);

    $this->get(route('summary.shared', $summary))->assertNotFound();
});

test('owners can preview their unshared summary', function () {
    $summary = Summary::factory()->create(['shared' => false]);

    $this->actingAs($summary->user)
        ->get(route('summary.shared', $summary))
        ->assertOk();
});
