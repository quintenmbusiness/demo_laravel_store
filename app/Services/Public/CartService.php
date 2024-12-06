<?php

namespace App\Services\Public;

use App\Models\User\Cart;
use App\Popo\User\CartItemPopo;
use App\Repositories\Public\CartRepository;

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
     * @param CartItemPopo $popo
     * @param string $sessionId
     * @return void
     */
    public function setCartItemQuantity(CartItemPopo $popo, string $sessionId): void
    {
        $this->cartRepository->setCartItemQuantity($popo, $sessionId);
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
     * @return void
     */
    public function removeCartItem(CartItemPopo $popo, string $sessionId): void
    {
        $this->cartRepository->removeCartItem($popo, $sessionId);
    }

    /**
     * @param CartItemPopo $popo
     * @param string $sessionId
     * @return void
     */
    public function addCartItem(CartItemPopo $popo, string $sessionId): void
    {
        $this->cartRepository->addCartItem($popo, $sessionId);
    }
}
