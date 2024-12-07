<?php

namespace Tests\Feature\Admin;

use App\Models\Product\Category;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Testing\TestResponse;
use Tests\TestCase;

class AdminCategoryControllerTest extends TestCase
{
    use RefreshDatabase;

    private string $baseRouteName = 'admin.categories';
    private array $categoryData;

    protected function setUp(): void
    {
        parent::setUp();

        // Common reusable category data
        $this->categoryData = ['name' => 'Test Category'];

        // Pre-seed database with a sample category for shared use
        $this->existingCategory = Category::factory()->create([
            'name' => 'Existing Category'
        ]);
    }

    /**
     * Send a request to the specified route.
     *
     * @param string $method  HTTP method (get, post, put, delete).
     * @param string $route   Route name or full URL.
     * @param array  $data    Payload for the request.
     * @param array  $params  Route parameters.
     * @param array  $headers Additional headers for the request.
     * @return TestResponse
     */
    private function sendRequest(
        string $method,
        string $route,
        array $data = [],
        array $params = [],
        array $headers = []
    ): TestResponse {
        $route = route($route, $params);
        return $this->json(strtoupper($method), $route, $data, $headers);
    }

    /** @test */
    public function it_can_list_all_categories(): void
    {
        Category::factory()->count(5)->create();

        $response = $this->sendRequest('get', "{$this->baseRouteName}");

        $response->assertOk()
            ->assertJsonCount(6) // Includes the one from setUp
            ->assertJsonStructure([['id', 'name', 'created_at', 'updated_at']]);
    }

    /** @test */
    public function it_can_create_a_new_category(): void
    {
        $response = $this->sendRequest('post', "{$this->baseRouteName}.store", $this->categoryData);

        $response->assertCreated()
            ->assertJsonFragment(['name' => $this->categoryData['name']]);

        $this->assertDatabaseHas('categories', ['name' => $this->categoryData['name']]);
    }

    /** @test */
    public function it_can_view_a_single_category(): void
    {
        $response = $this->sendRequest('get', "{$this->baseRouteName}.show", [], ['category' => $this->existingCategory->id]);

        $response->assertOk()
            ->assertJson([
                'id' => $this->existingCategory->id,
                'name' => $this->existingCategory->name,
            ]);
    }

    /** @test */
    public function it_can_update_a_category(): void
    {
        $updatedData = ['name' => 'Updated Name'];

        $this->assertDatabaseMissing('categories', ['name' => $updatedData['name']]);

        $response = $this->sendRequest('put', "{$this->baseRouteName}.update", $updatedData, ['category' => $this->existingCategory->id]);

        $response->assertOk()
            ->assertJsonFragment(['name' => $updatedData['name']]);

       $this->assertDatabaseHas('categories', ['name' => $updatedData['name']]);
    }

    /** @test */
    public function it_can_delete_a_category(): void
    {
        $response = $this->sendRequest('delete', "{$this->baseRouteName}.delete", [], ['category' => $this->existingCategory->id]);

        $response->assertSuccessful();

        $this->assertDatabaseMissing('categories', ['id' => $this->existingCategory->id]);
    }

    /** @test */
    public function it_validates_category_creation(): void
    {
        $response = $this->sendRequest('post', "{$this->baseRouteName}.store");

        $response->assertUnprocessable()
            ->assertJsonValidationErrors(['name']);
    }
}
