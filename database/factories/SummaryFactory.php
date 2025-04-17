<?php

namespace Database\Factories;

use App\Models\AiModel;
use App\Models\Content;
use App\Models\Provider;
use App\Models\Summary;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class SummaryFactory extends Factory
{
    protected $model = Summary::class;

    public function definition(): array
    {
        return [
            'shared' => false,

            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),

            'user_id' => User::factory(),
            'content_id' => Content::factory(),
            'provider_id' => Provider::factory(),
            'ai_model_id' => AiModel::factory(),
        ];
    }
}
