<?php

namespace App\Repositories\User;

use App\Models\User\Review;
use App\Popo\User\ReviewPopo;
use Illuminate\Database\Eloquent\Collection;

class ReviewRepository
{
    /**
     * @return Collection
     */
    public function index(): Collection
    {
        return Review::all();
    }

    /**
     * @param Review $review
     * @return bool
     */
    public function delete(Review $review): bool
    {
        return $review->delete();
    }

    /**
     * @param Review $review
     * @return Review
     */
    public function show(Review $review): Review
    {
        return $review;
    }

    /**
     * @param ReviewPopo $reviewPopo
     * @param Review $review
     * @return Review
     */
    public function update(ReviewPopo $reviewPopo, Review $review): Review
    {
        $review->update(
            [
                'user_id'        => $reviewPopo->user_id,
                'comment'       => $reviewPopo->comment,
                'product_id'       => $reviewPopo->product_id,
                'rating' => $reviewPopo->rating,
            ]
        );

        return $review->refresh();
    }

    /**
     * @param ReviewPopo $reviewPopo
     * @return Review
     */
    public function store(ReviewPopo $reviewPopo): Review
    {
        return Review::create(
            [
                'user_id'        => $reviewPopo->user_id,
                'comment'       => $reviewPopo->comment,
                'product_id'       => $reviewPopo->product_id,
                'rating' => $reviewPopo->rating,
            ]
        );
    }
}
