<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;

class ApiKeyForm extends Form
{
    #[Validate('required|exists:providers,id')]
    public $provider = '';

    #[Validate('required')]
    public $key = '';

    #[Validate('required|max:255')]
    public $name = '';

    public function store(): void
    {
        $this->validate();

        auth()->user()->apiKeys()->create([
            'provider_id' => $this->provider,
            'key' => $this->key,
            'name' => $this->name,
        ]);
    }
}
