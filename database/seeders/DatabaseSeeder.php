<?php

namespace Database\Seeders;

use App\Models\User\User;
use Illuminate\Database\Seeder;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
            'name'  => 'Test User',
            'email' => 'test@example.com',
        ]);

        \App\Models\User\User::factory(10)->create();
        \App\Models\Product\Category::factory(5)->create();
        \App\Models\Product\Tag::factory(10)->create();
        \App\Models\Product\Product::factory(20)->create();
        \App\Models\Order\Order::factory(10)->create();
        User\Review::factory(50)->create();
    }
}
