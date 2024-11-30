<?php

namespace Database\Factories;

use App\Models\User\Role;
use App\Models\User\RoleUser;
use App\Models\User\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<RoleUser>
 */
class RoleUserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'role_id' => Role::factory(),
            'user_id' => User::factory(),
        ];
    }
}
