<?php

namespace Database\Factories\User;

use App\Models\User\Role;
use App\Models\User\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends Factory<User>
 */
class UserFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name'              => $this->faker->name,
            'email'             => $this->faker->unique()->safeEmail,
            'email_verified_at' => now(),
            'password'          => bcrypt('password'), // default password
            'remember_token'    => Str::random(10),
        ];
    }

    /**
     * Assign a role to the user being created.
     *
     * @param Role $role
     * @return $this
     */
    public function withRole(Role $role): static
    {
        return $this->afterCreating(function (User $user) use ($role) {
            $user->roles()->attach($role);
        });
    }


    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
