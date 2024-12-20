<?php

namespace App\Repositories\User;

use App\Models\User\Cart;
use App\Popo\User\CartItemPopo;
use App\Popo\User\CartPopo;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Session;

class CartRepository
{
    /**
     * View the current cart items.
     *
     * @param string $sessionId
     * @return Cart
     */
    public function viewCartItems(string $sessionId): Cart
    {
        return Cart::firstOrCreate(
            ['session_id' => $sessionId],
            ['user_id' => auth()->id()]
        );
    }

    /**
     * @param string $sessionId
     * @return Cart
     */
    public function clearCart(string $sessionId): Cart
    {
        $cart = Cart::firstOrCreate(
            ['session_id' => $sessionId],
            ['user_id' => auth()->id()]
        );

        $cart->items()->delete();

        return $cart->refresh();
    }

    /**
     * @param CartItemPopo $popo
     * @param string $sessionId
     * @return void
     */
    public function removeCartItem(CartItemPopo $popo, string $sessionId): void
    {
        $cart = Cart::firstOrCreate(
            ['session_id' => $sessionId],
            ['user_id' => auth()->id()]
        );

        $cart->items->where('product_id', $popo->product_id)->first()->delete();
    }

    /**
     * @param CartItemPopo $cartItemPopo
     * @param string $sessionId
     * @return void
     */
    public function setCartItemQuantity(CartItemPopo $cartItemPopo, string $sessionId): void
    {
        $cart = Cart::firstOrCreate(
            ['session_id' => $sessionId],
            ['user_id' => auth()->id()]
        );

        $cart->items()->updateOrCreate(
            ['product_id' => $cartItemPopo->product_id],
            ['quantity' => $cartItemPopo->quantity]
        );
    }

    /**
     * @param CartItemPopo $cartItemPopo
     * @param string $sessionId
     * @return void
     */
    public function addCartItem(CartItemPopo $cartItemPopo, string $sessionId): void
    {
        $cart = Cart::firstOrCreate(
            ['session_id' => $sessionId],
            ['user_id' => auth()->id()]
        );

        $newQuantity = ($cart->items()
            ->where('product_id', $cartItemPopo->product_id)->value('quantity') ?? 0)
            + $cartItemPopo->quantity;

        $cart->items()->updateOrCreate(
            ['product_id' => $cartItemPopo->product_id],
            ['quantity' => $newQuantity]
        );
    }
}
