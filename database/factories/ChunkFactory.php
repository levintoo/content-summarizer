<?php

namespace Database\Factories;

use App\Models\AiModel;
use App\Models\Chunk;
use App\Models\Content;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class ChunkFactory extends Factory
{
    protected $model = Chunk::class;

    public function definition(): array
    {
        return [
            'chunk' => $this->faker->word(),
            'summary' => $this->faker->text(),
            'merged' => $this->faker->boolean(),
            'prompt_tokens' => $this->faker->word(),
            'completion_tokens' => $this->faker->word(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),

            'content_id' => Content::factory(),
            'ai_model_id' => AiModel::factory(),
        ];
    }
}
