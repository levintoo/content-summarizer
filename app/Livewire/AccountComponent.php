<?php

namespace App\Livewire;

use App\Models\Plan;
use App\Services\PaystackService;
use Livewire\Component;
use Livewire\WithPagination;

class AccountComponent extends Component
{
    use WithPagination;

    public $plans;

    public function mount()
    {
        $this->plans = Plan::get();
    }

    public function subscribe(string $planCode, PaystackService $paystack)
    {
        abort_if(auth()->user()->hasActiveSubscription(), 403);

        $plan = $this->plans->where('plan_code', $planCode)->first();

        $res = $paystack->initializeTransaction(auth()->user(), $plan, route('summary.create'));

        return $this->redirect($res['data']['authorization_url']);
    }

    public function unsubscribe(PaystackService $paystack): void
    {
        abort_unless(auth()->user()->hasActiveSubscription(), 403);

        $paystack->cancelSubscription(auth()->user()->subscription()->first());
    }

    public function render()
    {
        return view('livewire.account-component');
    }
}
