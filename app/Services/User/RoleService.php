<?php

namespace App\Services\User;

use App\Models\Role;
use App\Popo\RolePopo;
use App\Repositories\Role\RoleRepository;
use Illuminate\Database\Eloquent\Collection;

class RoleService
{
    /**
     * @var RoleRepository
     */
    private RoleRepository $roleRepository;

    /**
     * @param RoleRepository $roleRepository
     */
    public function __construct(RoleRepository $roleRepository)
    {
        $this->roleRepository = $roleRepository;
    }

    /**
     * @return Collection
     */
    public function index(): Collection
    {
        return $this->roleRepository->index();
    }

    /**
     * @param Role $role
     * @return Role
     */
    public function show(Role $role): Role
    {
        return $this->roleRepository->show($role);
    }

    /**
     * @param RolePopo $rolePopo
     * @param Role $role
     * @return Role
     */
    public function update(RolePopo $rolePopo, Role $role): Role
    {
        return $this->roleRepository->update($rolePopo, $role);
    }

    /**
     * @param Role $role
     * @return bool
     */
    public function delete(Role $role): bool
    {
        return $this->roleRepository->delete($role);
    }

    /**
     * @param RolePopo $popo
     * @return Role
     */
    public function store(RolePopo $popo): Role
    {
        return $this->roleRepository->store($popo);
    }
}
