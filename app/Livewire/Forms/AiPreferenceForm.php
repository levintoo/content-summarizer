<?php

namespace App\Livewire\Forms;

use Illuminate\Validation\Rule;
use Livewire\Form;

class AiPreferenceForm extends Form
{
    public $provider = '';

    public $model = '';

    public $key = '';

    /**
     * The model and key must belong to the chosen provider, and the key must
     * belong to the current user, so nobody can spend another user's credits.
     *
     * @return array<string, array<int, mixed>>
     */
    protected function rules(): array
    {
        return [
            'provider' => ['required', Rule::exists('providers', 'id')->whereNull('deleted_at')],
            'model' => [
                'required',
                Rule::exists('ai_models', 'id')
                    ->where('provider_id', $this->provider)
                    ->whereNull('deleted_at'),
            ],
            'key' => [
                'required',
                Rule::exists('api_keys', 'id')
                    ->where('user_id', auth()->id())
                    ->where('provider_id', $this->provider)
                    ->whereNull('deleted_at'),
            ],
        ];
    }

    public function store(): void
    {
        $this->validate();

        auth()->user()->preference()->update([
            'provider_id' => $this->provider,
            'ai_model_id' => $this->model,
            'api_key_id' => $this->key,
        ]);
    }
}
