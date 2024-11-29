<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name'        => $this->faker->word,
            'description' => $this->faker->paragraph,
            'price'       => $this->faker->randomFloat(2, 5, 500),
            'stock'       => $this->faker->numberBetween(0, 100),
            'category_id' => Category::factory(),
        ];
    }
}
