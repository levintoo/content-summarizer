<?php

namespace Database\Factories;

use App\Models\AiModel;
use App\Models\Preference;
use App\Models\Provider;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class PreferenceFactory extends Factory
{
    protected $model = Preference::class;

    public function definition(): array
    {
        return [
            'summary_length' => fake()->text(),
            'language' => fake()->word(),
            'custom_prompt' => fake()->word(),
            'show_recent_on_sidebar' => fake()->word(),
            'hover_to_open_sidebar' => fake()->word(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),

            'user_id' => User::factory(),
            'provider_id' => Provider::factory(),
            'ai_models_id' => AiModel::factory(),
        ];
    }
}
