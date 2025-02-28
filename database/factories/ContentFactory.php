<?php

namespace Database\Factories;

use App\Models\AiModel;
use App\Models\Content;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class ContentFactory extends Factory
{
    protected $model = Content::class;

    public function definition(): array
    {
        return [
            'title' => $this->faker->word(),
            'channel' => $this->faker->word(),
            'video_id' => $this->faker->word(),
            'summary' => $this->faker->text(),
            'prompt_tokens' => $this->faker->randomNumber(),
            'completion_tokens' => $this->faker->randomNumber(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),

            'ai_model_id' => AiModel::factory(),
        ];
    }
}
