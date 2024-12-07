<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\User\DeleteUserRequest;
use App\Http\Requests\User\IndexUserRequest;
use App\Http\Requests\User\ShowUserRequest;
use App\Http\Requests\User\StoreUserRequest;
use App\Http\Requests\User\UpdateUserRequest;
use App\Models\User\User;
use App\Services\Admin\AdminUserService;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Routing\Controller;

class AdminUserController extends Controller
{
    /**
     * @var AdminUserService $userService
     */
    private AdminUserService $userService;

    /**
     * @param AdminUserService $userService
     */
    public function __construct(AdminUserService $userService)
    {
        $this->userService = $userService;
    }

    /**
     * @param IndexUserRequest $request
     * @return Collection
     */
    public function index(IndexUserRequest $request): Collection
    {
        return $this->userService->index();
    }

    /**
     * @param ShowUserRequest $request
     * @param User $user
     * @return User
     */
    public function show(ShowUserRequest $request, User $user): User
    {
        return $this->userService->show($user);
    }

    /**
     * @param UpdateUserRequest $request
     * @param User $user
     * @return User
     */
    public function update(UpdateUserRequest $request, User $user): User
    {
        return $this->userService->update($request->toPopo(), $user);
    }

    /**
     * @param DeleteUserRequest $request
     * @param User $user
     * @return bool
     */
    public function delete(DeleteUserRequest $request, User $user): bool
    {
        return $this->userService->delete($user);
    }

    /**
     * @param  StoreUserRequest $request
     * @return User
     */
    public function store(StoreUserRequest $request): User
    {
        return $this->userService->store($request->toPopo());
    }
}
