<?php

use App\Livewire\ShowSummaryComponent;
use App\Models\Content;
use App\Models\Summary;
use App\Models\User;
use Livewire\Livewire;

test('ai output is rendered without raw html or unsafe links', function () {
    $user = User::factory()->create();
    $content = Content::factory()->create([
        'summary' => 'Intro <script>alert(1)</script> <img src=x onerror=alert(2)> [link](javascript:alert(3)) `${alert(4)}`',
    ]);
    $summary = Summary::factory()->for($user)->for($content)->create();

    Livewire::actingAs($user)
        ->test(ShowSummaryComponent::class, ['summary' => $summary])
        ->assertDontSeeHtml('<script>alert(1)</script>')
        ->assertDontSeeHtml('<img src=x')
        ->assertDontSeeHtml('href="javascript:')
        ->assertDontSeeHtml('writeText(`')
        ->assertSee('Intro');
});

test('users cannot view another users summary', function () {
    $summary = Summary::factory()->create();

    $this->actingAs(User::factory()->create())
        ->get(route('summary.show', $summary))
        ->assertNotFound();
});

test('a summary in progress shows its progress', function () {
    $user = User::factory()->create();
    $content = Content::factory()->create(['summary' => null]);
    $summary = Summary::factory()->for($user)->for($content)->create();

    Livewire::actingAs($user)
        ->test(ShowSummaryComponent::class, ['summary' => $summary])
        ->assertSee('Fetching the transcript...');
});
