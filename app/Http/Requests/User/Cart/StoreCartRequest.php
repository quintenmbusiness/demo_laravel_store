<?php

namespace App\Http\Requests\User\Cart;

use App\Popo\User\CartPopo;
use Illuminate\Foundation\Http\FormRequest;

class StoreCartRequest extends FormRequest
{
    /**
     * @return array
     */
    public function rules(): array
    {
        return [
            'user_id' => ['required', 'exists:users,id'],
        ];
    }

    /**
     * @return CartPopo
     */
    public function toPopo(): CartPopo
    {
        $validated = $this->validated();

        return new CartPopo(
            (int) $validated['user_id'],
        );
    }
}
