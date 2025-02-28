<?php

namespace Database\Factories;

use App\Models\AiModel;
use App\Models\ApiKey;
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
            'use_custom_prompt' => $this->faker->word(),
            'custom_prompt' => $this->faker->word(),
            'language' => $this->faker->word(),
            'summary_length' => $this->faker->text(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),

            'user_id' => User::factory(),
            'provider_id' => Provider::factory(),
            'ai_model_id' => AiModel::factory(),
            'api_key_id' => ApiKey::factory(),
        ];
    }
}
