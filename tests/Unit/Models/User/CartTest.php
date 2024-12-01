<?php

namespace Models\User;

use App\Models\User\Cart;
use Tests\BaseModelTest;

class CartTest extends BaseModelTest
{
    /**
     * The model class being tested.
     *
     * @var string
     */
    protected string $modelClass = Cart::class;

    public function test_factory_is_valid()
    {
        $this->assertFactoryWorks();
    }
}
