<?php

namespace Models\User;

use App\Models\User\CartItem;
use Tests\BaseModelTest;

class CartItemTest extends BaseModelTest
{
    /**
     * The model class being tested.
     *
     * @var string
     */
    protected string $modelClass = CartItem::class;

    public function test_factory_is_valid()
    {
        $this->assertFactoryWorks();
    }
}
