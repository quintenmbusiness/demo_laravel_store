<?php

namespace Repositories\Product;

use App\Models\Product\Category;
use App\Models\User\User;
use App\Popo\Product\CategoryPopo;
use App\Repositories\Product\CategoryRepository;
use App\Services\Product\CategoryService;
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

    public function test_update_method()
    {
        $updatedCategory = $this->categoryRepository->update($this->categoryPopo, $this->category);

        $this->assertEquals($this->category->name, $updatedCategory->name);
    }

    public function testDelete()
    {
        $result = $this->categoryRepository->delete($this->category);

        $this->assertTrue($result);
        $this->assertNull(Category::find($this->category->id));
    }

    public function testStore()
    {
        $category = $this->categoryRepository->store($this->categoryPopo);

        $this->assertInstanceOf(Category::class, $category);
        $this->assertEquals($this->categoryPopo->name, $category->name);
    }
}
