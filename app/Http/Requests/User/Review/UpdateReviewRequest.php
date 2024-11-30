<?php

namespace App\Http\Requests\User\Review;

use App\Popo\User\ReviewPopo;
use Illuminate\Foundation\Http\FormRequest;

class UpdateReviewRequest extends FormRequest
{
    /**
     * @return array
     */
    public function rules(): array
    {
        return [
            'product_id'    => ['required', 'exists:products,id'],
            'cart_id'       => ['required', 'exists:carts,id'],
            'quantity'      => ['required', 'integer', 'min:1'],
        ];
    }

    /**
     * @return ReviewPopo
     */
    public function toPopo(): ReviewPopo
    {
        $validated = $this->validated();

        return new ReviewPopo(
            (int) $validated['product_id'],
            (int) $validated['cart_id'],
            (int) $validated['quantity'],
        );
    }
}
