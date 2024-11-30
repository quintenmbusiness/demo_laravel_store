<?php

namespace App\Repositories\User;

use App\Models\User;
use App\Popo\UserPopo;
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
     * @return bool
     */
    public function delete(User $user): bool
    {
        return $user->delete();
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
                'price'       => $userPopo->price,
                'stock'       => $userPopo->stock,
                'category_id' => $userPopo->category_id,
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
                'price'       => $userPopo->price,
                'stock'       => $userPopo->stock,
                'category_id' => $userPopo->category_id,
            ]
        );
    }
}
