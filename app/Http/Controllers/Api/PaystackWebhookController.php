<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\SubscriptionService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;

class PaystackWebhookController extends Controller
{
    public function __invoke (Request $request, SubscriptionService $subscription) {
        abort_unless($this->requestHasValidSignature($request), Response::HTTP_FORBIDDEN);

        if(app()->isProduction() && $request['data']['domain'] == 'test') {
            Log::warning('event with domain test was handled');
            return;
        }

        if ($request->event == 'subscription.create') {
            $subscription->subscriptionCreate($request);
        }

        else if ($request->event == 'charge.success') {
            $subscription->chargedSuccess($request);
        }

        //handle invoices
        else if ($request->event == 'invoice.create') {
            $subscription->handleInvoice($request);
        }

        else if ($request->event == 'invoice.create') {
            $subscription->handleInvoice($request);
        }

        else if ($request->event == 'invoice.payment_failed') {
            $subscription->invoicePaymentFailed($request);
        }

        else if ($request->event == 'subscription.disable') {
            $subscription->subscriptionDisable($request);
        }

        else if ($request->event == 'subscription.not_renew') {
            $subscription->subscriptionNotRenew($request);
        }

        // handle refund events
        else if ($request->event == 'refund.failed') {
            $subscription->handleRefunds($request);
        }

        else if ($request->event == 'refund.pending') {
            $subscription->handleRefunds($request);
        }

        else if ($request->event == 'refund.processing') {
            $subscription->handleRefunds($request);
        }

        else if ($request->event == 'refund.processed') {
            $subscription->handleRefunds($request);
        }

        else {
            info($request);
        }
    }

    protected function requestHasValidSignature(Request $request): bool
    {
        if(!$request->hasHeader('X-Paystack-Signature')) return false;

        $signature = $request->header('x-paystack-signature');

        $secretKey = config('services.paystack.api_key');

        $payload = $request->getContent();

        $calculatedSignature = hash_hmac('sha512', $payload, $secretKey);

        return hash_equals($calculatedSignature, $signature);
    }
}
