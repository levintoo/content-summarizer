<?php

namespace App\Livewire;

use App\Livewire\Forms\AiPreferenceForm;
use App\Livewire\Forms\ApiKeyForm;
use App\Livewire\Forms\OtherPreferenceForm;
use App\Models\AiModel;
use App\Models\ApiKey;
use App\Models\Preference;
use App\Models\Provider;
use Livewire\Component;
use WireUi\Traits\WireUiActions;

class SettingsComponent extends Component
{
    public ApiKeyForm $apiKeyForm;

    public AiPreferenceForm $aiPreferenceForm;

    public OtherPreferenceForm $otherPreferenceForm;

    use WireUiActions;

    public function mount()
    {
        $user = auth()->user();

        $preference = Preference::query()
            ->whereBelongsTo($user)
            ->select([
                'id',
                'provider_id',
                'user_id',
                'ai_model_id',
                'api_key_id',
                'use_custom_prompt',
                'custom_prompt',
                'language',
                'summary_length',
            ])
            ->firstOrCreate(['user_id' => $user->id]);

        $this->aiPreferenceForm->fill([
            'provider' => (string) $preference->provider_id,
            'model' => (string) $preference->ai_model_id,
            'key' => (string) $preference->api_key_id,
        ]);

        $this->otherPreferenceForm->fill([
            'use_custom_prompt' => (bool) $preference->use_custom_prompt,
            'custom_prompt' => (string) $preference->custom_prompt,
            'language' => (string) $preference->language,
            'summary_length' => (string) $preference?->summary_length?->value,
        ]);
    }

    public function saveApiKey(): void
    {
        $this->apiKeyForm->store();
        $this->modal()->close('addApiKeyModal');
        $this->notification()->success('Key saved successfully');
    }

    public function removeApiKey(string $id): void
    {
        ApiKey::whereBelongsTo(auth()->user())->findOrFail($id)->delete();

        $this->notification()->success('Key removed successfully');
    }

    public function saveAiPreference(): void
    {
        $this->aiPreferenceForm->store();
        $this->notification()->success('Preference saved successfully');
    }

    public function saveOtherPreference(): void
    {
        $this->otherPreferenceForm->store();
        $this->notification()->success('Preference saved successfully');
    }

    public function render()
    {
        $user = auth()->user();

        $providers = Provider::query()
            ->limit(1)
            ->get();

        $models = AiModel::query()
            ->where('provider_id', $providers[0]->id)
            ->get();

        $apiKeys = ApiKey::query()
            ->with('provider:id,name')
            ->whereBelongsTo($user)
            ->where('provider_id', $providers[0]->id)
            ->simplePaginate(10);

        $preference = Preference::query()
            ->whereBelongsTo($user)
            ->firstOrCreate(['user_id' => $user->id]);

        return view('livewire.settings-component', compact('providers', 'models', 'apiKeys', 'preference'));
    }
}
