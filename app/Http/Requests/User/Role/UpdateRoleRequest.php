<?php

namespace App\Http\Requests\User\Role;

use App\Popo\User\RolePopo;
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
        ];
    }

    /**
     * @return RolePopo
     */
    public function toPopo(): RolePopo
    {
        $validated = $this->validated();

        return new RolePopo(
            (string) $validated['name']
        );
    }
}
