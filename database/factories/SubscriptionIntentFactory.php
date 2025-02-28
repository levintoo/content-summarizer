<?php

namespace Database\Factories;

use App\Models\Plan;
use App\Models\SubscriptionIntent;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class SubscriptionIntentFactory extends Factory
{
    protected $model = SubscriptionIntent::class;

    public function definition(): array
    {
        return [
            'reference' => $this->faker->word(),
            'access_code' => $this->faker->word(),
            'authorization_url' => $this->faker->url(),
            'status' => $this->faker->word(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),

            'plan_id' => Plan::factory(),
            'user_id' => User::factory(),
        ];
    }
}
