<?php

namespace Models\User;

use App\Models\User\Role;
use Tests\BaseModelTest;

class RoleTest extends BaseModelTest
{
    /**
     * The model class being tested.
     *
     * @var string
     */
    protected string $modelClass = Role::class;

    public function test_factory_is_valid()
    {
        $this->assertFactoryWorks();
    }
}
