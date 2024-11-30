<?php

namespace Database\Factories\User;

use App\Models\Product\Product;
use App\Models\User\Review;
use App\Models\User\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Review>
 */
class ReviewFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'product_id' => Product::factory(),
            'user_id'    => User::factory(),
            'rating'     => $this->faker->numberBetween(1, 5),
            'comment'    => $this->faker->sentence,
        ];
    }
}
