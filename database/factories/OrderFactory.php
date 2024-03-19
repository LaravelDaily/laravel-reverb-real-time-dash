<?php

namespace Database\Factories;

use App\Models\Order;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class OrderFactory extends Factory
{
    protected $model = Order::class;

    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'total' => $this->faker->randomFloat(2, 8, 15010),
            'created_at' => $this->faker->dateTimeBetween('-1 month'),
            'updated_at' => Carbon::now(),
        ];
    }
}
