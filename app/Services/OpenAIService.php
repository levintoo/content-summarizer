<?php

namespace App\Services;

use Illuminate\Http\Client\ConnectionException;
use Illuminate\Support\Facades\Http;

class OpenAIService
{
    /**
     * @throws ConnectionException
     */
    public function chat($key, $messages, $model = 'gpt-4o-mini')
    {
        return Http::withToken($key)
            ->acceptJson()
            ->post('https://api.openai.com/v1/chat/completions', [
                'model' => $model,
                'messages' => $messages,
            ])->json();
    }
}
