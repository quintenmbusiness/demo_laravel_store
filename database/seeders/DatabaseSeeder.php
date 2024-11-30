<?php

namespace Database\Seeders;

use App\Models\Order\Order;
use App\Models\Product\Category;
use App\Models\Product\Product;
use App\Models\Product\Tag;
use App\Models\User\Review;
use App\Models\User\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
            'name'  => 'quinten',
            'email' => 'quintenmbusiness@gmail.com',
        ]);

        User::factory(10)->create();
        Category::factory(5)->create();
        Tag::factory(10)->create();
        Product::factory(20)->create();
        Order::factory(10)->create();
        Review::factory(50)->create();
    }
}
