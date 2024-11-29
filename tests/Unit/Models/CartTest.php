<?php

namespace Models;

use App\Models\Cart;
use Tests\Unit\Models\BaseModelTest;

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
