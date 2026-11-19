<?php

use App\Models\Charge;
use App\Models\Plan;
use App\Models\Subscription;
use App\Models\User;

beforeEach(function () {
    config(['services.paystack.api_key' => 'sk_test_secret']);

    $this->user = User::factory()->create(['email' => 'payer@example.com']);
    $this->plan = Plan::factory()->create(['plan_code' => 'PLN_test']);
});

function paystackData(array $extra = []): array
{
    return array_merge([
        'domain' => 'test',
        'status' => 'active',
        'customer' => ['email' => 'payer@example.com', 'customer_code' => 'CUS_test'],
        'plan' => ['plan_code' => 'PLN_test'],
        'authorization' => [
            'authorization_code' => 'AUTH_test', 'bin' => '408408', 'last4' => '4081', 'exp_month' => '12',
            'exp_year' => '2030', 'channel' => 'card', 'card_type' => 'visa', 'bank' => 'Test Bank',
            'country_code' => 'NG', 'brand' => 'visa', 'reusable' => true, 'signature' => 'SIG_test', 'account_name' => null,
        ],
    ], $extra);
}

function postPaystack(string $event, array $data)
{
    $payload = json_encode(['event' => $event, 'data' => $data]);

    return test()->call('POST', '/api/paystack-webhook', [], [], [], [
        'CONTENT_TYPE' => 'application/json',
        'HTTP_X_PAYSTACK_SIGNATURE' => hash_hmac('sha512', $payload, 'sk_test_secret'),
    ], $payload);
}

test('webhooks without a valid signature are rejected', function () {
    $this->postJson('/api/paystack-webhook', ['event' => 'subscription.create'], ['X-Paystack-Signature' => 'forged'])
        ->assertForbidden();

    expect(Subscription::count())->toBe(0);
});

test('repeated subscription events create one subscription', function () {
    $data = paystackData([
        'subscription_code' => 'SUB_test',
        'email_token' => 'token',
        'next_payment_date' => now()->addMonth()->toIso8601String(),
    ]);

    postPaystack('subscription.create', $data)->assertSuccessful();
    postPaystack('subscription.create', $data)->assertSuccessful();

    expect(Subscription::count())->toBe(1);
});

test('repeated charge events create one charge', function () {
    $data = paystackData([
        'amount' => 5000,
        'currency' => 'NGN',
        'reference' => 'REF_test',
        'status' => 'success',
        'channel' => 'card',
        'paid_at' => now()->toIso8601String(),
    ]);

    postPaystack('charge.success', $data)->assertSuccessful();
    postPaystack('charge.success', $data)->assertSuccessful();

    expect(Charge::count())->toBe(1);
});
