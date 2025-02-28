<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;

class AiPreferenceForm extends Form
{
    #[Validate('required|exists:providers,id')]
    public $provider = '';

    #[Validate('required|exists:ai_models,id')]
    public $model = '';

    #[Validate('required|exists:api_keys,id')]
    public $key = '';

    public function store(): void
    {
        $this->validate();

        auth()->user()->preference()->update([
            'provider_id' => $this->provider,
            'ai_model_id'=> $this->model,
            'api_key_id' => $this->key,
        ]);
    }
}
