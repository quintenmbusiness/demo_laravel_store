<?php

namespace Models\Order;

use App\Models\Order\OrderItem;
use Tests\BaseModelTest;

class OrderItemTest extends BaseModelTest
{
    /**
     * The model class being tested.
     *
     * @var string
     */
    protected string $modelClass = OrderItem::class;

    public function test_factory_is_valid()
    {
        $this->assertFactoryWorks();
    }
}
