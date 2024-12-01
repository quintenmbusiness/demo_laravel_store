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
    }
}
