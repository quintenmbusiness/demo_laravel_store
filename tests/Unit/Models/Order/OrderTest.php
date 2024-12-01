<?php

namespace Models\Order;

use App\Models\Order\Order;
use Tests\BaseModelTest;

class OrderTest extends BaseModelTest
{
    /**
     * The model class being tested.
     *
     * @var string
     */
    protected string $modelClass = Order::class;

    public function test_factory_is_valid()
    {
        $this->assertFactoryWorks();
    }
}
