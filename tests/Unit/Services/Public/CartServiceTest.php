<?php

namespace Services\Public;

use App\Services\Public\CartService;
use Tests\TestCase;
use App\Models\User\Cart;
use App\Popo\User\CartItemPopo;
use App\Models\Product\Product;
use App\Models\Product\Category;
use Illuminate\Support\Facades\Session;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CartServiceTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @var CartService $service
     */
    private CartService $service;

    /**
     * @var string
     */
    private string $sessionId;

    /**
     * @var Product $product
     */
    private Product $product;

    /**
     * @var Category $category
     */
    private Category $category;

    protected function setUp(): void
    {
        parent::setUp();

        $this->service = $this->app->make(CartService::class);

        $this->sessionId = Session::getId();

        $this->cart = Cart::factory()->create([
            'session_id' => $this->sessionId
        ]);

        $this->category = Category::factory()->create([
            'name' => 'test category',
        ]);

        $this->product = Product::factory()->create([
            'price' => 100,
            'name' => 'test product',
            'category_id' => $this->category->id,
        ]);
    }

    public function test_can_view_cart_items(): void
    {
        $this->cart->items()->create([
            'product_id' => $this->product->id,
            'quantity' => 1
        ]);

        $this->assertCount(1, $this->cart->items);

        $cart = $this->service->viewCartItems($this->sessionId);

        $this->assertInstanceOf(Cart::class, $cart);
        $this->assertCount(1, $cart->items);
        $this->assertEquals($this->product->id, $this->cart->items->first()->product->id);
        $this->assertEquals($this->sessionId, $cart->session_id);
    }

    public function test_can_clear_cart(): void
    {
        $this->cart->items()->create([
            'product_id' => $this->product->id,
            'quantity' => 1
        ]);

        $this->assertCount(1, $this->cart->items);

        $cart = $this->service->clearCart($this->sessionId);

        $this->assertCount(0, $cart->items);
    }

    public function test_can_remove_cart_item(): void
    {
        $this->cart->items()->create([
            'product_id' => $this->product->id,
            'quantity' => 1
        ]);

        $cartPopo = new CartItemPopo($this->cart->id, $this->product->id, null);
        $this->service->removeCartItem($cartPopo, $this->sessionId);

        $this->assertCount(0, $this->cart->items);
    }

    public function test_can_set_cart_item_quantity(): void
    {
        $this->cart->items()->create([
            'product_id' => $this->product->id,
            'quantity' => 1
        ]);

        $cartPopo = new CartItemPopo($this->cart->id, $this->product->id, 5);

        $this->service->setCartItemQuantity($cartPopo, $this->sessionId);

        $quantity = $this->cart->items()->where('product_id', $this->product->id)->first()->quantity;
        $this->assertEquals(5, $quantity);
    }

    public function test_can_add_cart_item_if_non_exists(): void
    {
        $cartPopo = new CartItemPopo($this->cart->id, $this->product->id, 5);

        $this->service->addCartItem($cartPopo, $this->sessionId);

        $quantity = $this->cart->items()->where('product_id', $this->product->id)->first()->quantity;
        $this->assertEquals(5, $quantity);
    }

    public function test_can_add_cart_item_if_already_exists_and_increases_quantity(): void
    {
        $this->cart->items()->create([
            'product_id' => $this->product->id,
            'quantity' => 1
        ]);

        $cartPopo = new CartItemPopo($this->cart->id, $this->product->id, 5);

        $this->service->addCartItem($cartPopo, $this->sessionId);

        $quantity = $this->cart->items()->where('product_id', $this->product->id)->first()->quantity;
        $this->assertEquals(6, $quantity);
    }
}
