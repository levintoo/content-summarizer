<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PreferenceRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'user_id' => ['required', 'exists:users'],
            'provider_id' => ['required', 'exists:providers'],
            'ai_models_id' => ['required', 'exists:ai_models'],
            'summary_length' => ['nullable'],
            'language' => ['nullable'],
            'custom_prompt' => ['nullable'],
            'show_recent_on_sidebar' => ['nullable'],
            'hover_to_open_sidebar' => ['nullable'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
