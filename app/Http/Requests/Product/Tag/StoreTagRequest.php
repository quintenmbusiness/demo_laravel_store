<?php

namespace App\Http\Requests\Product\Tag;

use App\Popo\Product\TagPopo;
use Illuminate\Foundation\Http\FormRequest;

class StoreTagRequest extends FormRequest
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
     * @return TagPopo
     */
    public function toPopo(): TagPopo
    {
        $validated = $this->validated();

        return new TagPopo(
            (string) $validated['name']
        );
    }
}
