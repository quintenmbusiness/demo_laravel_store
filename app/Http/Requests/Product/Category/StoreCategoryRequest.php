<?php

namespace App\Http\Requests\Product\Category;

use App\Popo\Product\CategoryPopo;
use Illuminate\Foundation\Http\FormRequest;

class StoreCategoryRequest extends FormRequest
{
    /**
     * @return array
     */
    public function rules(): array
    {
        return [
            'name'        => ['required', 'string'],
        ];
    }

    /**
     * @return CategoryPopo
     */
    public function toPopo(): CategoryPopo
    {
        $validated = $this->validated();

        return new CategoryPopo(
            (string) $validated['name'],
        );
    }
}
