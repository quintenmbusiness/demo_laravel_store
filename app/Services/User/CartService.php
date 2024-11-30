<?php

namespace App\Services\User;

use App\Models\User\Cart;
use App\Popo\User\CartItemPopo;
use App\Popo\User\CartPopo;
use App\Repositories\User\CartRepository;
use Illuminate\Database\Eloquent\Collection;

class CartService
{
    /**
     * @var CartRepository
     */
    private CartRepository $cartRepository;

    /**
     * @param CartRepository $cartRepository
     */
    public function __construct(CartRepository $cartRepository)
    {
        $this->cartRepository = $cartRepository;
    }

    /**
     * View the current cart items.
     *
     * @param string $sessionId
     * @return Cart
     */
    public function viewCartItems(string $sessionId): Cart
    {
        return $this->cartRepository->viewCartItems($sessionId);
    }

    /**
     * @param string $sessionId
     * @return Cart
     */
    public function clearCart(string $sessionId): Cart
    {
        return $this->cartRepository->clearCart($sessionId);
    }

    /**
     * @param CartItemPopo $popo
     * @param string $sessionId
     * @return bool
     */
    public function removeCartItem(CartItemPopo $popo, string $sessionId): bool
    {
        return $this->cartRepository->removeCartItem($popo, $sessionId);
    }

    /**
     * @param CartItemPopo $popo
     * @param string $sessionId
     * @return Cart
     */
    public function addCartItem(CartItemPopo $popo, string $sessionId): Cart
    {
        return $this->cartRepository->addCartItem($popo, $sessionId);
    }
}
