<?php

use App\Livewire\SettingsComponent;
use App\Models\AiModel;
use App\Models\ApiKey;
use App\Models\Provider;
use App\Models\User;
use Livewire\Livewire;

beforeEach(function () {
    $this->provider = Provider::factory()->create();
    $this->model = AiModel::factory()->for($this->provider)->create();
    $this->user = User::factory()->create();
});

test('users can select their own api key', function () {
    $key = ApiKey::factory()->for($this->user)->for($this->provider)->create();

    Livewire::actingAs($this->user)
        ->test(SettingsComponent::class)
        ->set('aiPreferenceForm.provider', $this->provider->id)
        ->set('aiPreferenceForm.model', $this->model->id)
        ->set('aiPreferenceForm.key', $key->id)
        ->call('saveAiPreference')
        ->assertHasNoErrors();

    expect($this->user->preference->fresh()->api_key_id)->toBe($key->id);
});

test('users cannot select another users api key', function () {
    $otherKey = ApiKey::factory()->for(User::factory())->for($this->provider)->create();

    Livewire::actingAs($this->user)
        ->test(SettingsComponent::class)
        ->set('aiPreferenceForm.provider', $this->provider->id)
        ->set('aiPreferenceForm.model', $this->model->id)
        ->set('aiPreferenceForm.key', $otherKey->id)
        ->call('saveAiPreference')
        ->assertHasErrors(['aiPreferenceForm.key']);

    expect($this->user->preference->fresh()->api_key_id)->toBeNull();
});

test('users cannot select a model from another provider', function () {
    $key = ApiKey::factory()->for($this->user)->for($this->provider)->create();
    $otherModel = AiModel::factory()->create();

    Livewire::actingAs($this->user)
        ->test(SettingsComponent::class)
        ->set('aiPreferenceForm.provider', $this->provider->id)
        ->set('aiPreferenceForm.model', $otherModel->id)
        ->set('aiPreferenceForm.key', $key->id)
        ->call('saveAiPreference')
        ->assertHasErrors(['aiPreferenceForm.model']);
});
