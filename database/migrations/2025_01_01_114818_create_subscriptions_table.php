<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('subscriptions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->foreignId('plan_id');
            $table->foreignId('authorization_id');
            $table->string('subscription_code');
            $table->string('email_token');
            $table->string('customer_code');
            $table->string('status');
            $table->dateTime('next_payment_date');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('subscriptions');
    }
};
