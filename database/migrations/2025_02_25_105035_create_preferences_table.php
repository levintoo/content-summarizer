<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('preferences', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(\App\Models\User::class);
            $table->foreignIdFor(\App\Models\Provider::class);
            $table->foreignIdFor(\App\Models\AiModel::class);
            $table->string('summary_length')->nullable();
            $table->string('language')->nullable();
            $table->string('custom_prompt')->nullable();
            $table->string('show_recent_on_sidebar')->nullable();
            $table->string('hover_to_open_sidebar')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('preferences');
    }
};
