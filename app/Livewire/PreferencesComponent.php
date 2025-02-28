<?php

namespace App\Livewire;

use App\Livewire\Forms\PreferenceForm;
use App\Models\AiModel;
use App\Models\Preference;
use App\Models\Provider;
use Livewire\Component;

class PreferencesComponent extends Component
{
    public PreferenceForm $form;

    public $providers;

    public $models;

    public function mount()
    {
        $this->models = AiModel::get();
        $this->providers = Provider::get();

        //        $preferences = Preference::query()->whereBelongsTo(auth()->user())->firstOrFail();

        //        $this->form->fill($preferences);
    }

    public function save()
    {
        $this->validate();

        dd($this->form);
    }

    public function render()
    {
        return view('livewire.preferences-component');
    }
}
