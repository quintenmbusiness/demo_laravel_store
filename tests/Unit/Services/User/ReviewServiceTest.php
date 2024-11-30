<?php

namespace Services\User;

use App\Models\User\Review;
use App\Models\User\User;
use App\Popo\User\ReviewPopo;
use App\Repositories\User\ReviewRepository;
use App\Services\User\ReviewService;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ReviewServiceTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @var ReviewRepository $reviewRepository
     */
    private ReviewRepository $reviewRepository;

    /**
     * @var ReviewPopo
     */
    private ReviewPopo $reviewPopo;

    /**
     * @var User $user
     */
    private User $user;

    /**
     * @var Review
     */
    private Review $review;

    /**
     * @var ReviewService $reviewService
     */
    private ReviewService $reviewService;

    protected function setUp(): void
    {
        parent::setUp();

        $this->reviewRepository = new ReviewRepository();
        $this->reviewService = new ReviewService($this->reviewRepository);
        $this->review = Review::factory()->create();

        $this->user = User::factory()->create();
        $this->reviewPopo = new ReviewPopo($this->user->id);
    }

    public function test_index_method()
    {
        $result = $this->reviewService->index();

        $this->assertInstanceOf(Collection::class, $result);
        $this->assertCount(1, $result);
    }

    public function test_show_method()
    {
        $result = $this->reviewService->show($this->review);

        $this->assertSame($this->review->toArray(), $result->toArray());
    }

    public function test_update_method()
    {
        $updatedReview = $this->reviewService->update($this->reviewPopo, $this->review);

        $this->assertEquals($this->user->id, $updatedReview->user_id);
    }

    public function testDelete()
    {
        $result = $this->reviewService->delete($this->review);

        $this->assertTrue($result);
        $this->assertNull(Review::find($this->review->id));
    }

    public function testStore()
    {
        $review = $this->reviewService->store($this->reviewPopo);

        $this->assertInstanceOf(Review::class, $review);
        $this->assertEquals($this->user->id, $review->user_id);
    }
}
