<?php

namespace Database\Factories;

use App\Models\Authorization;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class AuthorizationFactory extends Factory
{
    protected $model = Authorization::class;

    public function definition(): array
    {
        return [
            'authorization_code' => $this->faker->word(),
            'bin' => $this->faker->word(),
            'last4' => $this->faker->word(),
            'exp_month' => $this->faker->word(),
            'exp_year' => $this->faker->word(),
            'channel' => $this->faker->word(),
            'card_type' => $this->faker->word(),
            'bank' => $this->faker->word(),
            'country_code' => $this->faker->word(),
            'brand' => $this->faker->word(),
            'reusable' => $this->faker->word(),
            'signature' => $this->faker->word(),
            'account_name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),

            'user_id' => User::factory(),
        ];
    }
}
