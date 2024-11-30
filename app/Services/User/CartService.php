<?php

namespace App\Services\User;

use App\Models\Cart;
use App\Popo\CartPopo;
use App\Repositories\Cart\CartRepository;
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
     * @return Collection
     */
    public function index(): Collection
    {
        return $this->cartRepository->index();
    }

    /**
     * @param Cart $cart
     * @return Cart
     */
    public function show(Cart $cart): Cart
    {
        return $this->cartRepository->show($cart);
    }

    /**
     * @param CartPopo $cartPopo
     * @param Cart $cart
     * @return Cart
     */
    public function update(CartPopo $cartPopo, Cart $cart): Cart
    {
        return $this->cartRepository->update($cartPopo, $cart);
    }

    /**
     * @param Cart $cart
     * @return bool
     */
    public function delete(Cart $cart): bool
    {
        return $this->cartRepository->delete($cart);
    }

    /**
     * @param CartPopo $popo
     * @return Cart
     */
    public function store(CartPopo $popo): Cart
    {
        return $this->cartRepository->store($popo);
    }
}
