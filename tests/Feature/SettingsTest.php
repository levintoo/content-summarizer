<?php

use App\Enums\SummaryLengthEnum;
use App\Livewire\SettingsComponent;
use App\Models\ApiKey;
use App\Models\Preference;
use App\Models\User;
use Livewire\Livewire;

test('settings load before any provider exists', function () {
    Livewire::actingAs(User::factory()->create())
        ->test(SettingsComponent::class)
        ->assertOk();
});

test('removing an unselected key keeps the selected key', function () {
    $user = User::factory()->create();
    $selected = ApiKey::factory()->for($user)->create();
    $other = ApiKey::factory()->for($user)->create();
    Preference::factory()->for($user)->create([
        'api_key_id' => $selected->id,
        'use_custom_prompt' => false,
        'summary_length' => SummaryLengthEnum::balanced,
    ]);

    Livewire::actingAs($user)
        ->test(SettingsComponent::class)
        ->call('removeApiKey', (string) $other->id);

    expect($user->preference->fresh()->api_key_id)->toBe($selected->id)
        ->and($other->fresh()->trashed())->toBeTrue();
});
