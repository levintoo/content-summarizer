<?php

use App\Models\AiModel;
use App\Models\Content;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('chunks', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Content::class);
            $table->text('chunk');
            $table->text('summary')->nullable();
            $table->boolean('merged')->nullable();
            $table->foreignIdFor(AiModel::class)->nullable();
            $table->string('prompt_tokens')->nullable();
            $table->string('completion_tokens')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('chunks');
    }
};
