<?php

namespace Models;

use App\Models\User\Review;
use Tests\Unit\Models\BaseModelTest;

class ReviewTest extends BaseModelTest
{
    /**
     * The model class being tested.
     *
     * @var string
     */
    protected string $modelClass = Review::class;

    public function test_factory_is_valid()
    {
        $this->assertFactoryWorks();
    }
}
