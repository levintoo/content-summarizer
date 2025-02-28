<?php

namespace App\Services;

use App\Models\Authorization;
use App\Models\Charge;
use App\Models\Plan;
use App\Models\Subscription;
use App\Models\SubscriptionIntent;
use App\Models\User;
use Illuminate\Http\Request;

class SubscriptionService
{
    protected function getOrCreateAuthorization($data, $user): Authorization
    {
        return Authorization::whereBelongsTo($user)->firstOrCreate([
            'signature' => $data['authorization']['signature'],
        ], [
            'authorization_code' => $data['authorization']['authorization_code'],
            'bin' => $data['authorization']['bin'],
            'last4' => $data['authorization']['last4'],
            'exp_month' => $data['authorization']['exp_month'],
            'exp_year' => $data['authorization']['exp_year'],
            'channel' => $data['authorization']['channel'],
            'card_type' => $data['authorization']['card_type'],
            'bank' => $data['authorization']['bank'],
            'country_code' => $data['authorization']['country_code'],
            'brand' => $data['authorization']['brand'],
            'reusable' => $data['authorization']['reusable'],
            'signature' => $data['authorization']['signature'],
            'account_name' => $data['authorization']['account_name'],
            'email' => $data['customer']['email'],
            'user_id' => $user->id,
        ]);
    }

    public function subscriptionCreate(Request $request): void
    {
        $user = User::query()
            ->select(['id', 'email'])
            ->where('email', $request['data']['customer']['email'])
            ->latest()
            ->firstOrFail();

        $plan = Plan::query()
            ->select(['id', 'plan_code'])
            ->where('plan_code', $request['data']['plan']['plan_code'])
            ->latest()
            ->firstOrFail();

        $intent = SubscriptionIntent::whereBelongsTo($user)->whereBelongsTo($plan)->first();

        $intent?->update([
            'status' => 'fulfilled',
        ]);

        $authorization = $this->getOrCreateAuthorization($request['data'], $user);

        Subscription::create([
            'status' => $request['data']['status'],
            'user_id' => $user->id,
            'plan_id' => $plan->id,
            'authorization_id' => $authorization->id,
            'subscription_code' => $request['data']['subscription_code'],
            'email_token' => $request['data']['email_token'],
            'next_payment_date' => $request['data']['next_payment_date'],
            'customer_code' => $request['data']['customer']['customer_code'],
        ]);
    }

    public function chargedSuccess(Request $request): void
    {
        $user = User::query()
            ->select(['id', 'email'])
            ->where('email', $request['data']['customer']['email'])
            ->latest()
            ->firstOrFail();

        $plan = Plan::query()
            ->select(['id', 'plan_code', 'summaries', 'questions'])
            ->where('plan_code', $request['data']['plan']['plan_code'])
            ->latest()
            ->firstOrFail();

        $authorization = $this->getOrCreateAuthorization($request['data'], $user);

        Charge::create([
            'user_id' => $user->id,
            'authorization_id' => $authorization->id,
            'amount' => $request['data']['amount'],
            'currency' => $request['data']['currency'],
            'reference' => $request['data']['reference'],
            'status' => $request['data']['status'],
            'invoice_code' => $request['data']['invoice_code'] ?? null,
            'channel' => $request['data']['channel'],
            'paid_at' => $request['data']['paid_at'],
        ]);
    }

    public function invoicePaymentFailed(Request $request): void
    {
        $subscription = Subscription::query()
            ->where('subscription_code', $request['data']['subscription']['subscription_code'])
            ->latest()
            ->firstOrFail();

        $subscription->update([
            'status' => $request['event'],
        ]);
    }

    public function subscriptionDisable(Request $request): void
    {
        $subscription = Subscription::query()
            ->where('subscription_code', $request['data']['subscription_code'])
            ->latest()
            ->firstOrFail();

        $subscription->update([
            'status' => 'disabled',
        ]);
    }

    public function subscriptionNotRenew(Request $request): void
    {
        $subscription = Subscription::query()
            ->where('subscription_code', $request['data']['subscription_code'])
            ->latest()
            ->firstOrFail();

        $subscription->update([
            'status' => $request['data']['status'],
        ]);
    }

    public function handleRefunds(Request $request): void
    {
        $charge = Charge::query()
            ->where('reference', $request['data']['transaction_reference'])
            ->latest()
            ->firstOrFail();

        $charge->update([
            'status' => $request['event'],
        ]);
    }

    public function handleInvoice(Request $request): void
    {
        $subscription = Subscription::query()
            ->where('subscription_code', $request['data']['subscription']['subscription_code'])
            ->with('user')
            ->latest()
            ->firstOrFail();

        $authorization = $this->getOrCreateAuthorization($request['data'], $subscription->user);

        $subscription->update([
            'authorization_id' => $authorization->id,
            'next_payment_date' => $request['data']['subscription']['next_payment_date'],
        ]);
    }
}
