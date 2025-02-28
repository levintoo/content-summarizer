<?php

namespace App\Services;

use App\Models\Plan;
use App\Models\Subscription;
use App\Models\SubscriptionIntent;
use App\Models\User;
use Exception;
use Illuminate\Http\Client\ConnectionException;
use Illuminate\Support\Facades\Http;

class PaystackService
{
    protected string $secretKey;

    protected string $paystackUrl;

    protected array $headers;

    public function __construct()
    {
        $this->secretKey = config('services.paystack.api_key');
        $this->paystackUrl = config('services.paystack.api');
        $this->headers = [
            'Accept' => 'application/json',
            'Authorization' => 'Bearer '.config('services.paystack.api_key'),
            'Content-Type' => 'application/json',
        ];
    }

    /**
     * @throws Exception
     */
    public function fetchPlan(string $plan_code)
    {
        $fullURL = $this->paystackUrl.'/plan/'.$plan_code;

        $res = Http::withHeaders($this->headers)->get($fullURL)->json();

        abort_if($res['status'] && ($res['data']['is_deleted'] || $res['data']['is_archived']), 404);

        return $res;
    }

    /**
     * @throws ConnectionException
     */
    public function initializeTransaction(User $user, Plan $plan, ?string $callbackUrl = null)
    {
        $api = $this->paystackUrl.'/transaction/initialize';

        $data = [
            'email' => $user->email,
            'plan' => $plan->plan_code,
            'amount' => $plan->amount,
            'callback_url' => $callbackUrl ?? route('account'),
        ];

        $res = Http::withHeaders($this->headers)->post($api, $data)->json();

        abort_unless($res['status'], 500, $res['message'] ?? 'Something went wrong');

        SubscriptionIntent::create([
            'user_id' => $user->id,
            'plan_id' => $plan->id,
            'reference' => $res['data']['reference'],
            'access_code' => $res['data']['access_code'],
            'authorization_url' => $res['data']['authorization_url'],
            'status' => 'unpaid',
        ]);

        return $res;
    }

    /**
     * @throws ConnectionException
     */
    public function cancelSubscription(Subscription $subscription)
    {
        $api = $this->paystackUrl.'/subscription/disable';

        $data = [
            'code' => $subscription->subscription_code,
            'token' => $subscription->email_token,
        ];

        $res = Http::withHeaders($this->headers)->post($api, $data)->json();

        abort_unless($res['status'], 500, $res['message'] ?? 'Something went wrong');

        $subscription->update([
            'status' => $res['data']['status'],
        ]);

        return $res;
    }
}
