<?php

namespace App\Livewire;

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
        return view('livewire.settings-component');
    }
}
