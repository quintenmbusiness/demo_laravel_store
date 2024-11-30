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
            'user_id'       => ['required', 'exists:users,id'],
            'comment'       => ['required', 'string'],
            'rating'      => ['required', 'integer', 'min:0'],
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
            (int) $validated['user_id'],
            (int) $validated['rating'],
            (string) $validated['comment']
        );
    }
}
