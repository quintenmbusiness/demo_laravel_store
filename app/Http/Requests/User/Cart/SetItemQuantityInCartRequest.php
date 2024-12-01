<?php

namespace App\Http\Requests\User\Cart;

use App\Popo\User\CartItemPopo;
use Illuminate\Foundation\Http\FormRequest;

class SetItemQuantityInCartRequest extends FormRequest
{
    /**
     * @return array
     */
    public function rules(): array
    {
        return [
            'product_id' => ['required', 'integer', 'exists:products,id'],
            'quantity' => ['required', 'integer', 'min:1'],
        ];
    }

    /**
     * @return CartItemPopo
     */
    public function toPopo(): CartItemPopo
    {
        $validated = $this->validated();

        return new CartItemPopo(
            $validated['cart_id'] ?? null,
            (int) $validated['product_id'],
            (int) $validated['quantity'],
        );
    }
}
