<?php

namespace Models\Product;

use App\Models\Product\Tag;
use Tests\BaseModelTest;

class TagTest extends BaseModelTest
{
    /**
     * The model class being tested.
     *
     * @var string
     */
    protected string $modelClass = Tag::class;

    public function test_factory_is_valid()
    {
        $this->assertFactoryWorks();
    }
}
