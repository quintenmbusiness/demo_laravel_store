<?php

namespace Models;

use App\Models\CartItem;
use Tests\Unit\Models\BaseModelTest;

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
