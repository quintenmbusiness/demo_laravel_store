<?php

namespace App\Repositories\Public;

use App\Models\User\User;
use App\Popo\User\UserPopo;
use Illuminate\Database\Eloquent\Collection;

class UserRepository
{
    /**
     * @return Collection
     */
    public function index(): Collection
    {
        return User::all();
    }

    /**
     * @param User $user
     * @return User
     */
    public function show(User $user): User
    {
        return $user;
    }

    /**
     * @param UserPopo $userPopo
     * @param User $user
     * @return User
     */
    public function update(UserPopo $userPopo, User $user): User
    {
        $user->update(
            [
                'name'        => $userPopo->name,
                'email'       => $userPopo->email,
                'email_verified_at'       => $userPopo->email_verified_at,
            ]
        );

        return $user->refresh();
    }

    /**
     * @param UserPopo $userPopo
     * @return User
     */
    public function store(UserPopo $userPopo): User
    {
        return User::create(
            [
                'name'        => $userPopo->name,
                'email'       => $userPopo->email,
                'email_verified_at'       => $userPopo->email_verified_at,
            ]
        );
    }
}
