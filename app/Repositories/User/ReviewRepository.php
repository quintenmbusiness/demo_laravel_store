<?php

namespace App\Repositories\User;

use App\Models\Review;
use App\Popo\ReviewPopo;
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
                'name'        => $reviewPopo->name,
                'price'       => $reviewPopo->price,
                'stock'       => $reviewPopo->stock,
                'category_id' => $reviewPopo->category_id,
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
                'name'        => $reviewPopo->name,
                'price'       => $reviewPopo->price,
                'stock'       => $reviewPopo->stock,
                'category_id' => $reviewPopo->category_id,
            ]
        );
    }
}
