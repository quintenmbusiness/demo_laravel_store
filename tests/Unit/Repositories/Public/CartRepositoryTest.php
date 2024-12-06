<?php

namespace Tests\Unit\Repositories\Public;

use App\Models\User\Cart;
use App\Models\User\CartItem;
use App\Popo\User\CartItemPopo;
use App\Repositories\Public\CartRepository;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CartRepositoryTest extends TestCase
{
    use RefreshDatabase;

    private CartRepository $cartRepository;
    private string $sessionId;

    protected function setUp(): void
    {
        parent::setUp();

        $this->cartRepository = new CartRepository();
        $this->sessionId = 'test-session-id';
    }

    /** @test */
    public function it_can_view_cart_items(): void
    {
        $cart = $this->cartRepository->viewCartItems($this->sessionId);

        $this->assertInstanceOf(Cart::class, $cart);
        $this->assertEquals($this->sessionId, $cart->session_id);
        $this->assertEquals(auth()->id(), $cart->user_id);
    }

    /** @test */
    public function it_can_clear_cart(): void
    {
        $cart = Cart::factory()->create(['session_id' => $this->sessionId]);
        CartItem::factory()->count(3)->create(['cart_id' => $cart->id]);

        $clearedCart = $this->cartRepository->clearCart($this->sessionId);

        $this->assertTrue($clearedCart->items()->count() === 0);
    }

    /** @test */
    public function it_can_remove_cart_item(): void
    {
        $cart = Cart::factory()->create(['session_id' => $this->sessionId]);
        $item = CartItem::factory()->create(['cart_id' => $cart->id, 'product_id' => 1]);

        $popo = new CartItemPopo();
        $popo->product_id = $item->product_id;

        $this->cartRepository->removeCartItem($popo, $this->sessionId);

        $this->assertDatabaseMissing('cart_items', ['id' => $item->id]);
    }

    /** @test */
    public function it_can_set_cart_item_quantity(): void
    {
        $cart = Cart::factory()->create(['session_id' => $this->sessionId]);
        $item = CartItem::factory()->create(['cart_id' => $cart->id, 'product_id' => 1, 'quantity' => 5]);

        $popo = new CartItemPopo();
        $popo->product_id = $item->product_id;
        $popo->quantity = 10;

        $this->cartRepository->setCartItemQuantity($popo, $this->sessionId);

        $this->assertDatabaseHas('cart_items', ['product_id' => $popo->product_id, 'quantity' => 10]);
    }

    /** @test */
    public function it_can_add_cart_item(): void
    {
        $cart = Cart::factory()->create(['session_id' => $this->sessionId]);
        CartItem::factory()->create(['cart_id' => $cart->id, 'product_id' => 1, 'quantity' => 5]);

        $popo = new CartItemPopo();
        $popo->product_id = 1;
        $popo->quantity = 3;

        $this->cartRepository->addCartItem($popo, $this->sessionId);

        $this->assertDatabaseHas('cart_items', ['product_id' => $popo->product_id, 'quantity' => 8]);
    }
}
