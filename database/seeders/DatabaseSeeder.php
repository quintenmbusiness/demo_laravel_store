<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

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

        \App\Models\User::factory(10)->create();
        \App\Models\Category::factory(5)->create();
        \App\Models\Tag::factory(10)->create();
        \App\Models\Product::factory(20)->create();
        \App\Models\Order::factory(10)->create();
        \App\Models\Review::factory(50)->create();
    }
}
