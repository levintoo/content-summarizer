<?php

namespace App\Livewire\Public;

use Livewire\Component;

class WelcomeComponent extends Component
{
    public function render()
    {
        return view('livewire.public.welcome-component')->layout('layouts.guest');
    }
}
