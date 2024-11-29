<?php

namespace Models;

use App\Models\RoleUser;
use Tests\Unit\Models\BaseModelTest;

class RoleUserTest extends BaseModelTest
{
    /**
     * The model class being tested.
     *
     * @var string
     */
    protected string $modelClass = RoleUser::class;

    public function test_factory_is_valid()
    {
        $this->assertFactoryWorks();
    }
}
