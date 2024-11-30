<?php

namespace App\Http\Controllers\User;

use App\Http\Requests\User\Review\DeleteReviewRequest;
use App\Http\Requests\User\Review\IndexReviewRequest;
use App\Http\Requests\User\Review\ShowReviewRequest;
use App\Http\Requests\User\Review\StoreReviewRequest;
use App\Http\Requests\User\Review\UpdateReviewRequest;
use App\Models\User\Review;
use App\Services\User\ReviewService;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Routing\Controller;

class ReviewController extends Controller
{
    /**
     * @var ReviewService
     */
    private ReviewService $reviewService;

    /**
     * @param ReviewService $reviewService
     */
    public function __construct(ReviewService $reviewService)
    {
        $this->reviewService = $reviewService;
    }

    /**
     * @param IndexReviewRequest $request
     * @return Collection
     */
    public function index(IndexReviewRequest $request): Collection
    {
        return $this->reviewService->index();
    }

    /**
     * @param ShowReviewRequest $request
     * @param Review $review
     * @return Review
     */
    public function show(ShowReviewRequest $request, Review $review): Review
    {
        return $this->reviewService->show($review);
    }

    /**
     * @param UpdateReviewRequest $request
     * @param Review $review
     * @return Review
     */
    public function update(UpdateReviewRequest $request, Review $review): Review
    {
        return $this->reviewService->update($request->toPopo(), $review);
    }

    /**
     * @param DeleteReviewRequest $request
     * @param Review $review
     * @return bool
     */
    public function delete(DeleteReviewRequest $request, Review $review): bool
    {
        return $this->reviewService->delete($review);
    }

    /**
     * @param  StoreReviewRequest $request
     * @return Review
     */
    public function store(StoreReviewRequest $request): Review
    {
        return $this->reviewService->store($request->toPopo());
    }
}
