<?php

namespace App\Livewire;

use App\Livewire\Forms\ApiKeyForm;
use App\Models\AiModel;
use App\Models\ApiKey;
use App\Models\Provider;
use Livewire\Component;
use WireUi\Traits\WireUiActions;

class SettingsComponent extends Component
{
    public ApiKeyForm $apiKeyForm;

    use WireUiActions;

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

    public function chooseApiKey(string $id): void
    {
        $key = ApiKey::whereBelongsTo(auth()->user())->findOrFail($id);

        dump($key);
    }

    public function render()
    {
        $providers = Provider::query()
            ->limit(1)
            ->get();
        $models = AiModel::query()
            ->where('provider_id', $providers[0]->id)
            ->get();
        $apiKeys = ApiKey::query()->with('provider:id,name')
            ->where('provider_id', $providers[0]->id)
            ->simplePaginate(10);
        return view('livewire.settings-component', compact('providers', 'models', 'apiKeys'));
    }
}
