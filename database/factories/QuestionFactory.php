<?php

namespace Database\Factories;

use App\Models\Question;
use App\Models\Summary;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class QuestionFactory extends Factory
{
    protected $model = Question::class;

    public function definition(): array
    {
        return [
            'question' => $this->faker->word(),
            'answer' => $this->faker->word(),
            'prompt_tokens' => $this->faker->randomNumber(),
            'completion_tokens' => $this->faker->randomNumber(),
            'feedback' => $this->faker->randomNumber(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),

            'user_id' => User::factory(),
            'summary_id' => Summary::factory(),
        ];
    }
}
