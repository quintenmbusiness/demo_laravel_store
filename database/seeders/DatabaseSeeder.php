<?php

namespace Database\Seeders;

use App\Models\Order\Order;
use App\Models\Order\OrderItem;
use App\Models\Product\Category;
use App\Models\Product\Product;
use App\Models\Product\Tag;
use App\Models\User\Review;
use App\Models\User\Role;
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

        Role::factory()->create(['name' => 'admin']);
        Role::factory()->create(['name' => 'employee']);
        $customerRole = Role::factory()->create(['name' => 'customer']);

        $users = User::factory(4)->withRole($customerRole)->create();

        Category::factory(5)->create();
        Tag::factory(2)->create();
        $products = Product::factory(10)->create();

        foreach ($products as $product) {
            $quantity = fake()->numberBetween(1, 10);

            $order = Order::factory()->create(['total' => $product->price * $quantity]);
            OrderItem::factory()->create(['order_id' => $order->id, 'product_id' => $product->id, 'quantity' => $quantity, 'price' => $product->price * $quantity]);
        }


        Review::factory(5)->create();
    }
}
