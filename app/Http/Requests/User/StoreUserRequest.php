<?php

namespace App\Http\Requests\User;

use App\Popo\User\UserPopo;
use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
{
    /**
     * @return array
     */
    public function rules(): array
    {
        return [
            'name'              => ['required', 'string'],
            'email'             => ['required', 'email'],
            'password'          => ['required', 'string'],
        ];
    }

    /**
     * @return UserPopo
     */
    public function toPopo(): UserPopo
    {
        $validated = $this->validated();

        return new UserPopo(
            (string) $validated['name'],
            (string) $validated['email'],
            (string) $validated['password'],
        );
    }
}
