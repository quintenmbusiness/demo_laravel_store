<?php

namespace Tests;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Testing\RefreshDatabase;

class BaseModelTest extends TestCase
{
    use RefreshDatabase;

    /**
     * The model class being tested.
     *
     * @var string
     */
    protected string $modelClass;

    /**
     * The model instance being tested.
     *
     * @var Model
     */
    protected Model $mode;

    /**
     * Set up the model instance if the child class defines a model class.
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();

        if ($this->modelClass) {
            $this->model = new $this->modelClass();
        }
    }

    /**
     * Assert that the model's factory is valid.
     *
     * @return void
     */
    protected function assertFactoryWorks(): void
    {
        $this->assertNotNull($this->modelClass, 'Model class is not defined in the test.');
        $currentCount = $this->model->count();

        $model = $this->modelClass::factory()->create();

        $this->assertInstanceOf(
            $this->modelClass,
            $model,
            "Failed asserting that the factory produces an instance of {$this->modelClass}."
        );

        $this->assertEquals($currentCount + 1, $model->count());
    }
}
