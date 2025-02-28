<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('subscription_intents', function (Blueprint $table) {
            $table->id();
            $table->string('reference');
            $table->string('access_code');
            $table->string('authorization_url');
            $table->string('status');
            $table->foreignId('plan_id');
            $table->foreignId('user_id');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('subscription_intents');
    }
};
