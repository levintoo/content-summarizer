<?php

use App\Services\OpenAIService;
use Illuminate\Support\Facades\Http;

function chatResponse(string $content): array
{
    return ['choices' => [['message' => ['content' => $content]]], 'usage' => ['prompt_tokens' => 1, 'completion_tokens' => 1]];
}

test('failed responses are not cached', function () {
    Http::fakeSequence('api.openai.com/*')
        ->push(['error' => ['message' => 'Rate limit reached']], 429)
        ->push(chatResponse('ok'));

    $service = new OpenAIService;
    $messages = [['role' => 'user', 'content' => 'hello']];

    expect(fn () => $service->cachedChat('key', $messages, 'gpt-4o-mini'))
        ->toThrow(RuntimeException::class, 'Rate limit reached');

    expect($service->cachedChat('key', $messages, 'gpt-4o-mini')['choices'][0]['message']['content'])->toBe('ok');
    expect($service->cachedChat('key', $messages, 'gpt-4o-mini')['choices'][0]['message']['content'])->toBe('ok');

    Http::assertSentCount(2);
});

test('different messages never share a cached response', function () {
    Http::fakeSequence('api.openai.com/*')
        ->push(chatResponse('first'))
        ->push(chatResponse('second'));

    $service = new OpenAIService;

    $first = $service->cachedChat('key', [['role' => 'user', 'content' => 'chunk one']], 'gpt-4o-mini');
    $second = $service->cachedChat('key', [['role' => 'user', 'content' => 'chunk two']], 'gpt-4o-mini');

    expect($first['choices'][0]['message']['content'])->toBe('first')
        ->and($second['choices'][0]['message']['content'])->toBe('second');
});
