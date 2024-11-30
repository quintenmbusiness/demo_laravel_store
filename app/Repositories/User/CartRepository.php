<?php

namespace App\Repositories\User;

use App\Models\User\Cart;
use App\Popo\User\CartPopo;
use Illuminate\Database\Eloquent\Collection;

class CartRepository
{
    /**
     * @return Collection
     */
    public function index(): Collection
    {
        return Cart::all();
    }

    /**
     * @param Cart $cart
     * @return bool
     */
    public function delete(Cart $cart): bool
    {
        return $cart->delete();
    }

    /**
     * @param Cart $cart
     * @return Cart
     */
    public function show(Cart $cart): Cart
    {
        return $cart;
    }

    /**
     * @param CartPopo $cartPopo
     * @param Cart $cart
     * @return Cart
     */
    public function update(CartPopo $cartPopo, Cart $cart): Cart
    {
        $cart->update(
            [
                'user_id' => $cartPopo->user_id,
            ]
        );

        return $cart->refresh();
    }

    /**
     * @param CartPopo $cartPopo
     * @return Cart
     */
    public function store(CartPopo $cartPopo): Cart
    {
        return Cart::create(
            [
                'user_id'        => $cartPopo->user_id,
            ]
        );
    }
}
