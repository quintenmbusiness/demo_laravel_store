<?php

namespace App\Http\Requests\Product;

use App\Popo\ProductPopo;
use Illuminate\Foundation\Http\FormRequest;

class UpdateRoleRequest extends FormRequest
{
    /**
     * @return array
     */
    public function rules(): array
    {
        return [
            'name'        => ['required', 'string'],
            'description' => ['required', 'string'],
            'price'       => ['required', 'numeric'],
            'stock'       => ['required', 'numeric'],
            'category_id' => ['required', 'exists:categories,id'],
        ];
    }

    /**
     * @return ProductPopo
     */
    public function toPopo(): ProductPopo
    {
        $validated = $this->validated();

        return new ProductPopo(
            (string) $validated['name'],
            (string) $validated['description'],
            (float) $validated['price'],
            (int) $validated['stock'],
            (int) $validated['category_id'],
        );
    }
}
