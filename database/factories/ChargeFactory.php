<?php

namespace Database\Factories;

use App\Models\Authorization;
use App\Models\Charge;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class ChargeFactory extends Factory
{
    protected $model = Charge::class;

    public function definition(): array
    {
        return [
            'amount' => $this->faker->word(),
            'currency' => $this->faker->word(),
            'status' => $this->faker->word(),
            'reference' => $this->faker->word(),
            'invoice_code' => $this->faker->word(),
            'channel' => $this->faker->word(),
            'paid_at' => Carbon::now(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),

            'user_id' => User::factory(),
            'authorization_id' => Authorization::factory(),
        ];
    }
}
