<?php

namespace Services\Public;

use App\Models\Product\Category;
use App\Models\Product\Product;
use App\Popo\Product\ProductPopo;
use App\Services\Public\ProductService;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProductServiceTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @var Productservice $service
     */
    private Productservice $service;

    /**
     * @var ProductPopo $productPopo
     */
    private ProductPopo $productPopo;

    /**
     * @var Product $product
     */
    private Product $product;

    /**
     * @var Category $category
     */
    private Category $category;

    protected function setUp(): void
    {
        parent::setUp();

        $this->service = $this->app->make(ProductService::class);
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
        $result = $this->service->index();

        $this->assertInstanceOf(Collection::class, $result);
        $this->assertCount(1, $result);
    }

    public function test_show_method()
    {
        $result = $this->service->show($this->product);

        $this->assertSame($this->product->toArray(), $result->toArray());
    }
}
