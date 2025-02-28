<?php

namespace Database\Factories;

use App\Models\Authorization;
use App\Models\Plan;
use App\Models\Subscription;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class SubscriptionFactory extends Factory
{
    protected $model = Subscription::class;

    public function definition(): array
    {
        return [
            'subscription_code' => $this->faker->word(),
            'email_token' => $this->faker->unique()->safeEmail(),
            'customer_code' => $this->faker->word(),
            'status' => $this->faker->word(),
            'next_payment_date' => Carbon::now(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),

            'user_id' => User::factory(),
            'plan_id' => Plan::factory(),
            'authorization_id' => Authorization::factory(),
        ];
    }
}
