<?php

namespace Services\Public;

use App\Models\Product\Category;
use App\Popo\Product\CategoryPopo;
use App\Services\Public\CategoryService;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CategoryServiceTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @var CategoryService $service
     */
    private CategoryService $service;

    /**
     * @var CategoryPopo
     */
    private CategoryPopo $categoryPopo;

    /**
     * @var Category
     */
    private Category $category;

    protected function setUp(): void
    {
        parent::setUp();

        $this->service = $this->app->make(CategoryService::class);
        $this->category = Category::factory()->create();

        $this->categoryPopo = new CategoryPopo('test');
    }

    public function test_index_method()
    {
        $result = $this->service->index();

        $this->assertInstanceOf(Collection::class, $result);
        $this->assertCount(1, $result);
    }

    public function test_show_method()
    {
        $result = $this->service->show($this->category);

        $this->assertSame($this->category->toArray(), $result->toArray());
    }
}
