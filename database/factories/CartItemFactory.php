<?php

namespace Database\Factories;

use App\Models\Product\Product;
use App\Models\User\Cart;
use App\Models\User\CartItem;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<CartItem>
 */
class CartItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'cart_id'    => Cart::factory(),
            'product_id' => Product::factory(),
            'quantity'   => $this->faker->numberBetween(1, 5),
        ];
    }
}
