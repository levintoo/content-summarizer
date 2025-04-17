<?php

namespace App\Livewire\Forms;

use App\Enums\SummaryLengthEnum;
use Illuminate\Validation\Rules\Enum;
use Livewire\Attributes\Validate;
use Livewire\Form;

class OtherPreferenceForm extends Form
{
    #[Validate('nullable|boolean|max:255')]
    public $use_custom_prompt = '';

    #[Validate('required_if:use_custom_prompt,true')]
    public $custom_prompt = '';

    #[Validate('nullable|max:255')]
    public $language = '';

    #[Validate(['nullable', new enum(SummaryLengthEnum::class)])]
    public string $summary_length;

    public function store(): void
    {
        $this->validate();

        auth()->user()->preference()->update([
            'use_custom_prompt' => $this->use_custom_prompt,
            'language' => $this->language,
            'summary_length' => $this->summary_length,
            'custom_prompt' => $this->custom_prompt,
        ]);
    }
}
