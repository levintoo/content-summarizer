<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('charges', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->foreignId('authorization_id');
            $table->string('amount');
            $table->string('currency');
            $table->string('status');
            $table->string('reference');
            $table->string('invoice_code')->nullable();
            $table->string('channel')->nullable();
            $table->dateTime('paid_at');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('charges');
    }
};
