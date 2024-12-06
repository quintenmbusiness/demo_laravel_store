<?php

namespace Repositories\Public;

use App\Models\Product\Category;
use App\Popo\Product\CategoryPopo;
use App\Repositories\Public\CategoryRepository;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CategoryRepositoryTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @var CategoryRepository $categoryRepository
     */
    private CategoryRepository $categoryRepository;

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

        $this->categoryRepository = new CategoryRepository();
        $this->category = Category::factory()->create();

        $this->categoryPopo = new CategoryPopo('test');
    }

    public function test_index_method()
    {
        $result = $this->categoryRepository->index();

        $this->assertInstanceOf(Collection::class, $result);
        $this->assertCount(1, $result);
    }

    public function test_show_method()
    {
        $result = $this->categoryRepository->show($this->category);

        $this->assertSame($this->category->toArray(), $result->toArray());
    }
}
