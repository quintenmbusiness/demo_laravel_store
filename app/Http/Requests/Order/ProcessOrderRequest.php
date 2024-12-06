<?php

namespace App\Http\Requests\Order;

use App\Popo\Order\OrderPopo;
use Illuminate\Foundation\Http\FormRequest;

class ProcessOrderRequest extends FormRequest
{
    /**
     * @return array
     */
    public function rules(): array
    {
        return [
            'address' => ['required', 'string','max:255'],
            'payment_method' => ['required', 'string'],
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
            $validated['address'],
            $validated['payment_method']
        );
    }
}
