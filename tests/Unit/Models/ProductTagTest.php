<?php

namespace Models;

use App\Models\ProductTag;
use Tests\Unit\Models\BaseModelTest;

class ProductTagTest extends BaseModelTest
{
    /**
     * The model class being tested.
     *
     * @var string
     */
    protected string $modelClass = ProductTag::class;

    public function test_factory_is_valid()
    {
        $this->assertFactoryWorks();
    }
}
