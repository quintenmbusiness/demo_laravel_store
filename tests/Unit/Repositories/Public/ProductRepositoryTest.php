<?php

namespace Repositories\Public;

use App\Models\Product\Category;
use App\Models\Product\Product;
use App\Popo\Product\ProductPopo;
use App\Repositories\Public\ProductRepository;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProductRepositoryTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @var ProductRepository $productRepository
     */
    private ProductRepository $productRepository;

    /**
     * @var ProductPopo
     */
    private ProductPopo $productPopo;

    /**
     * @var Product
     */
    private Product $product;

    /**
     * @var Category
     */
    private Category $category;

    protected function setUp(): void
    {
        parent::setUp();

        $this->productRepository = new ProductRepository();
        $this->product = Product::factory()->create();
        $this->category = Category::factory()->create();

        $this->productPopo = new ProductPopo(
            'test',
           'test',
            100,
            100,
            $this->category->id
        );
    }

    public function test_index_method()
    {
        $result = $this->productRepository->index();

        $this->assertInstanceOf(Collection::class, $result);
        $this->assertCount(1, $result);
    }

    public function test_show_method()
    {
        $result = $this->productRepository->show($this->product);

        $this->assertSame($this->product->toArray(), $result->toArray());
    }
}
