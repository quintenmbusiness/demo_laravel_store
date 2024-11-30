<?php

namespace App\Http\Controllers\User;

use App\Http\Requests\User\Role\DeleteRoleRequest;
use App\Http\Requests\User\Role\IndexRoleRequest;
use App\Http\Requests\User\Role\ShowRoleRequest;
use App\Http\Requests\User\Role\StoreRoleRequest;
use App\Http\Requests\User\Role\UpdateRoleRequest;
use App\Models\User\Role;
use App\Services\User\RoleService;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Routing\Controller;

class RoleController extends Controller
{
    /**
     * @var RoleService
     */
    private RoleService $roleService;

    /**
     * @param RoleService $roleService
     */
    public function __construct(RoleService $roleService)
    {
        $this->roleService = $roleService;
    }

    /**
     * @param IndexRoleRequest $request
     * @return Collection
     */
    public function index(IndexRoleRequest $request): Collection
    {
        return $this->roleService->index();
    }

    /**
     * @param ShowRoleRequest $request
     * @param Role $role
     * @return Role
     */
    public function show(ShowRoleRequest $request, Role $role): Role
    {
        return $this->roleService->show($role);
    }

    /**
     * @param UpdateRoleRequest $request
     * @param Role $role
     * @return Role
     */
    public function update(UpdateRoleRequest $request, Role $role): Role
    {
        return $this->roleService->update($request->toPopo(), $role);
    }

    /**
     * @param DeleteRoleRequest $request
     * @param Role $role
     * @return bool
     */
    public function delete(DeleteRoleRequest $request, Role $role): bool
    {
        return $this->roleService->delete($role);
    }

    /**
     * @param  StoreRoleRequest $request
     * @return Role
     */
    public function store(StoreRoleRequest $request): Role
    {
        return $this->roleService->store($request->toPopo());
    }
}
