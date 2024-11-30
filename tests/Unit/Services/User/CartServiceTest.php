<?php

namespace Tests\Unit\Services\User;

use App\Models\User\Cart;
use App\Models\User\User;
use App\Popo\User\CartPopo;
use App\Repositories\User\CartRepository;
use App\Services\User\CartService;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CartServiceTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @var CartRepository $cartRepository
     */
    private CartRepository $cartRepository;

    /**
     * @var CartPopo
     */
    private CartPopo $cartPopo;

    /**
     * @var User $user
     */
    private User $user;

    /**
     * @var Cart
     */
    private Cart $cart;

    /**
     * @var CartService $cartService
     */
    private CartService $cartService;

    protected function setUp(): void
    {
        parent::setUp();

        $this->cartRepository = new CartRepository();
        $this->cartService = new CartService($this->cartRepository);
        $this->cart = Cart::factory()->create();

        $this->user = User::factory()->create();
        $this->cartPopo = new CartPopo($this->user->id);
    }

    public function test_index_method()
    {
        $result = $this->cartService->index();

        $this->assertInstanceOf(Collection::class, $result);
        $this->assertCount(1, $result);
    }

    public function test_show_method()
    {
        $result = $this->cartService->show($this->cart);

        $this->assertSame($this->cart->toArray(), $result->toArray());
    }

    public function test_update_method()
    {
        $updatedCart = $this->cartService->update($this->cartPopo, $this->cart);

        $this->assertEquals($this->user->id, $updatedCart->user_id);
    }

    public function testDelete()
    {
        $result = $this->cartService->delete($this->cart);

        $this->assertTrue($result);
        $this->assertNull(Cart::find($this->cart->id));
    }

    public function testStore()
    {
        $cart = $this->cartService->store($this->cartPopo);

        $this->assertInstanceOf(Cart::class, $cart);
        $this->assertEquals($this->user->id, $cart->user_id);
    }
}
