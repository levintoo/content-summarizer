<?php

use App\Livewire\SettingsComponent;
use App\Livewire\ShowSummaryComponent;
use App\Models\Content;
use App\Models\Provider;
use App\Models\Summary;
use App\Models\User;
use Livewire\Livewire;

test('the summaries page shows an empty state for new users', function () {
    $this->actingAs(User::factory()->create())
        ->get(route('summaries'))
        ->assertOk()
        ->assertSee('No summaries yet')
        ->assertSee('Your summaries will show up here.');
});

test('summaries still being generated are labelled in progress', function () {
    $user = User::factory()->create();
    Summary::factory()->for($user)->for(Content::factory()->state(['summary' => null]))->create();

    $this->actingAs($user)
        ->get(route('summaries'))
        ->assertSee('In progress')
        ->assertDontSee('No summaries yet');
});

test('a failed summary explains what went wrong', function () {
    $user = User::factory()->create();
    $summary = Summary::factory()->for($user)->for(Content::factory()->state(['summary' => null]))->create(['failed' => true]);

    Livewire::actingAs($user)
        ->test(ShowSummaryComponent::class, ['summary' => $summary])
        ->assertSee("We couldn't finish this summary", false)
        ->assertSee('Try again')
        ->assertDontSee('Fetching the transcript...');
});

test('settings explain when no provider is set up', function () {
    Livewire::actingAs(User::factory()->create())
        ->test(SettingsComponent::class)
        ->assertSee('No AI providers are set up yet');
});

test('settings prompt for an api key when none exist', function () {
    Provider::factory()->create();

    Livewire::actingAs(User::factory()->create())
        ->test(SettingsComponent::class)
        ->assertSee('Add an API key from your provider')
        ->assertSee('No API keys yet');
});
