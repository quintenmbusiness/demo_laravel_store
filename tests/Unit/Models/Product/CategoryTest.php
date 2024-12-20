<?php

namespace Models\Product;

use App\Models\Product\Category;
use Tests\BaseModelTest;

class CategoryTest extends BaseModelTest
{
    /**
     * The model class being tested.
     *
     * @var string
     */
    protected string $modelClass = Category::class;

    public function test_factory_is_valid()
    {
        $this->assertFactoryWorks();
    }
}
