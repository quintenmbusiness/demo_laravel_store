<?php

namespace App\Services\Public;

use App\Models\User\User;
use App\Popo\User\UserPopo;
use App\Repositories\Public\UserRepository;
use Illuminate\Database\Eloquent\Collection;

class UserService
{
    /**
     * @var UserRepository
     */
    private UserRepository $userRepository;

    /**
     * @param UserRepository $userRepository
     */
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * @return Collection
     */
    public function index(): Collection
    {
        return $this->userRepository->index();
    }

    /**
     * @param User $user
     * @return User
     */
    public function show(User $user): User
    {
        return $this->userRepository->show($user);
    }

    /**
     * @param UserPopo $popo
     * @return User
     */
    public function store(UserPopo $popo): User
    {
        return $this->userRepository->store($popo);
    }
}
