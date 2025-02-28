<?php

namespace App\Livewire;

use App\Models\AiModel;
use App\Models\Provider;
use Livewire\Component;
use WireUi\Traits\WireUiActions;

class SettingsComponent extends Component
{
    use WireUiActions;

    public function save()
    {
        $this->notification()->send([
            'icon' => 'info',
            'title' => 'Info Notification!',
            'description' => 'This is a description.',
        ]);
    }

    public function render()
    {
        $providers = Provider::query()->limit(1)->get();
        $models = AiModel::query()->where('provider_id', $providers[0]->id)->get();
        return view('livewire.settings-component', compact('providers', 'models'));
    }
}
