<?php

namespace Database\Factories\Product;

use App\Models\Product\Product;
use App\Models\Product\ProductTag;
use App\Models\Product\Tag;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<ProductTag>
 */
class ProductTagFactory extends Factory
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
            'tag_id'     => Tag::factory(),
        ];
    }
}
