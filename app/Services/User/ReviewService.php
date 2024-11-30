<?php

namespace App\Services\User;

use App\Models\Review;
use App\Popo\ReviewPopo;
use App\Repositories\Review\ReviewRepository;
use Illuminate\Database\Eloquent\Collection;

class ReviewService
{
    /**
     * @var ReviewRepository
     */
    private ReviewRepository $reviewRepository;

    /**
     * @param ReviewRepository $reviewRepository
     */
    public function __construct(ReviewRepository $reviewRepository)
    {
        $this->reviewRepository = $reviewRepository;
    }

    /**
     * @return Collection
     */
    public function index(): Collection
    {
        return $this->reviewRepository->index();
    }

    /**
     * @param Review $review
     * @return Review
     */
    public function show(Review $review): Review
    {
        return $this->reviewRepository->show($review);
    }

    /**
     * @param ReviewPopo $reviewPopo
     * @param Review $review
     * @return Review
     */
    public function update(ReviewPopo $reviewPopo, Review $review): Review
    {
        return $this->reviewRepository->update($reviewPopo, $review);
    }

    /**
     * @param Review $review
     * @return bool
     */
    public function delete(Review $review): bool
    {
        return $this->reviewRepository->delete($review);
    }

    /**
     * @param ReviewPopo $popo
     * @return Review
     */
    public function store(ReviewPopo $popo): Review
    {
        return $this->reviewRepository->store($popo);
    }
}
