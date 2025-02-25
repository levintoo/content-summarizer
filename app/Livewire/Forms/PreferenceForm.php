<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;

class PreferenceForm extends Form
{
    #[Validate('required|exists:providers,id')]
    public $provider_id = '';

    #[Validate('required|exists:ai_models,id')]
    public $ai_model_id = '';

    #[Validate('required|max:255')]
    public $language = '';
}
