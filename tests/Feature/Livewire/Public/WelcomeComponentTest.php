<?php

use App\Livewire\Public\WelcomeComponent;
use Livewire\Livewire;

it('renders successfully', function () {
    Livewire::test(WelcomeComponent::class)
        ->assertStatus(200);
});
