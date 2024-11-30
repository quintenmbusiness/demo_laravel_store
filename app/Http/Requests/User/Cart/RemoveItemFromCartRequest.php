<?php

namespace App\Http\Requests\User\Cart;

use App\Popo\User\CartItemPopo;
use App\Popo\User\CartPopo;
use Illuminate\Foundation\Http\FormRequest;

class RemoveItemFromCartRequest extends FormRequest
{
    /**
     * @return array
     */
    public function rules(): array
    {
        return [
            'cart_id ' => ['required', 'exists:carts,id'],
            'product_id ' => ['required', 'exists:products,id'],
        ];
    }

    /**
     * @return CartItemPopo
     */
    public function toPopo(): CartItemPopo
    {
        $validated = $this->validated();

        return new CartItemPopo(
            (int) $validated['cart_id'],
            (int) $validated['product_id'],
            null
        );
    }
}
