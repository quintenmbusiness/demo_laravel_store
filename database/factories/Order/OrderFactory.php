<?php

namespace Database\Factories\Order;

use App\Models\Order\Order;
use App\Models\User\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'user_id' => User::factory(),
            'total'   => $this->faker->randomFloat(2, 50, 1000),
            'status'  => $this->faker->randomElement(['pending', 'processing', 'shipped', 'delivered']),
        ];
    }
}
