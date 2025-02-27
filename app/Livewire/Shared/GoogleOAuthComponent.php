<?php

namespace App\Livewire\Shared;

use Laravel\Socialite\Facades\Socialite;
use Livewire\Component;

class GoogleOAuthComponent extends Component
{
    public function handleRedirect()
    {
        $socialite = Socialite::driver('google')->redirect();

        $this->redirect($socialite->getTargetUrl());
    }

    public function render()
    {
        return view('livewire.shared.google-o-auth-component');
    }
}
