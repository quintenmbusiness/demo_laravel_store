<?php

namespace Models\User;

use App\Models\User\User;
use Tests\BaseModelTest;

class UserTest extends BaseModelTest
{
    /**
     * The model class being tested.
     *
     * @var string
     */
    protected string $modelClass = User::class;

    public function test_factory_is_valid()
    {
        $this->assertFactoryWorks();
    }
}
