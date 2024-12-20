<?php

namespace Models\Product;

use App\Models\Product\Product;
use Tests\BaseModelTest;

class ProductTest extends BaseModelTest
{
    /**
     * The model class being tested.
     *
     * @var string
     */
    protected string $modelClass = Product::class;

    public function test_factory_is_valid()
    {
        $this->assertFactoryWorks();
    }
}
