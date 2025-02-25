<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AiModelRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'provider_id' => ['required', 'exists:providers'],
            'name' => ['required'],
            'context_window' => ['required', 'integer'],
            'max_output_tokens' => ['required'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
