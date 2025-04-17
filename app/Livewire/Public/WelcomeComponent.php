<?php

namespace App\Livewire\Public;

use Illuminate\View\View;
use Livewire\Component;

class WelcomeComponent extends Component
{
    public function render(): View
    {
        return view('livewire.public.welcome-component')->layout('layouts.guest');
    }
}
