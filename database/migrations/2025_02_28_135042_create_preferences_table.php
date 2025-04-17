<?php

use App\Models\AiModel;
use App\Models\ApiKey;
use App\Models\Provider;
use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('preferences', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class);
            $table->foreignIdFor(Provider::class)->nullable();
            $table->foreignIdFor(AiModel::class)->nullable();
            $table->foreignIdFor(ApiKey::class)->nullable();
            $table->string('use_custom_prompt')->nullable();
            $table->text('custom_prompt')->nullable();
            $table->string('language')->nullable();
            $table->integer('summary_length')->default(\App\Enums\SummaryLengthEnum::balanced);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('preferences');
    }
};
