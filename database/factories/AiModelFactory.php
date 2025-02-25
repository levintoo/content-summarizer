<?php

namespace Database\Factories;

use App\Models\AiModel;
use App\Models\Provider;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class AiModelFactory extends Factory
{
    protected $model = AiModel::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'context_window' => $this->faker->randomNumber(),
            'max_output_tokens' => $this->faker->word(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),

            'provider_id' => Provider::factory(),
        ];
    }
}
