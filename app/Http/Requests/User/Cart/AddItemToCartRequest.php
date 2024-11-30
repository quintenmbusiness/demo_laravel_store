<?php

namespace App\Http\Requests\User\Cart;

use App\Popo\User\CartItemPopo;
use App\Popo\User\CartPopo;
use Illuminate\Foundation\Http\FormRequest;

class AddItemToCartRequest extends FormRequest
{
    /**
     * @return array
     */
    public function rules(): array
    {
        return [
            'cart_id ' => ['required', 'exists:carts,id'],
            'product_id ' => ['required', 'exists:products,id'],
            'quantity ' => ['required', 'integer', 'min:1'],
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
            (int) $validated['quantity'],
        );
    }
}
