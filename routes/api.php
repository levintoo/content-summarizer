<?php

use App\Http\Controllers\Api\PaystackWebhookController;
use Illuminate\Support\Facades\Route;

Route::post('paystack-webhook', PaystackWebhookController::class);
