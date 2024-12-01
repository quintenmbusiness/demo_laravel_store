<?php

namespace Repositories\User;

use App\Models\User\Cart;
use App\Models\User\User;
use App\Popo\User\CartPopo;
use App\Repositories\User\CartRepository;
use App\Services\User\CartService;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CartRepositoryTest extends TestCase
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

    protected function setUp(): void
    {
        parent::setUp();

        $this->cartRepository = new CartRepository();
        $this->cart = Cart::factory()->create();
        $this->user = User::factory()->create();
    }
}
