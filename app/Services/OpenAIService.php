<?php

namespace App\Services;

use App\Constants\CacheDuration;
use Illuminate\Http\Client\ConnectionException;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use RuntimeException;

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

    /**
     * Cache by the exact model and messages so different chunks, prompts and
     * preferences never share a response. Errors are thrown, not cached, so a
     * single failed call can be retried.
     *
     * @param  array<int, array{role: string, content: string}>  $messages
     * @return array<string, mixed>
     *
     * @throws ConnectionException
     * @throws RuntimeException
     */
    public function cachedChat(string $key, array $messages, string $model): array
    {
        $cacheKey = 'openai-chat-'.hash('sha256', $model.json_encode($messages));

        if ($cached = Cache::get($cacheKey)) {
            return $cached;
        }

        $response = $this->chat($key, $messages, $model);

        if (! isset($response['choices'][0]['message']['content'])) {
            throw new RuntimeException('AI provider request failed: '.($response['error']['message'] ?? 'unexpected response'));
        }

        Cache::put($cacheKey, $response, CacheDuration::MONTH);

        return $response;
    }
}
