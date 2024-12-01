<?php

namespace App\Http\Requests\User\Cart;

use App\Popo\User\CartItemPopo;
use Illuminate\Foundation\Http\FormRequest;

class RemoveItemFromCartRequest extends FormRequest
{
    /**
     * @return array
     */
    public function rules(): array
    {
        return [
            'product_id' => ['nullable', 'integer', 'exists:products,id'],
        ];
    }

    /**
     * @return CartItemPopo
     */
    public function toPopo(): CartItemPopo
    {
        $validated = $this->validated();

        return new CartItemPopo(
            null,
            (int) $validated['product_id'],
            null
        );
    }
}
