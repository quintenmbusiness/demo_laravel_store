<?php

namespace Models;

use App\Models\Order;
use Tests\Unit\Models\BaseModelTest;

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
