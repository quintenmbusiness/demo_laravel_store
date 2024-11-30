<?php

namespace App\Http\Requests\Order;

use App\Popo\Order\OrderPopo;
use Illuminate\Foundation\Http\FormRequest;

class UpdateOrderRequest extends FormRequest
{
    /**
     * @return array
     */
    public function rules(): array
    {
        return [
            'user_id'   => ['required','exists:users,id'],
            'total'     => ['required', 'float'],
            'status'    => ['required', 'string'],
        ];
    }

    /**
     * @return OrderPopo
     */
    public function toPopo(): OrderPopo
    {
        $validated = $this->validated();

        return new OrderPopo (
            $validated['user_id'],
            $validated['total'],
            $validated['status']
        );
    }
}
