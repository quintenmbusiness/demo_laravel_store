<?php

namespace App\Repositories\Product;

use App\Models\Tag;
use App\Popo\TagPopo;
use Illuminate\Database\Eloquent\Collection;

class TagRepository
{
    /**
     * @return Collection
     */
    public function index(): Collection
    {
        return Tag::all();
    }

    /**
     * @param Tag $tag
     * @return bool
     */
    public function delete(Tag $tag): bool
    {
        return $tag->delete();
    }

    /**
     * @param Tag $tag
     * @return Tag
     */
    public function show(Tag $tag): Tag
    {
        return $tag;
    }

    /**
     * @param TagPopo $tagPopo
     * @param Tag $tag
     * @return Tag
     */
    public function update(TagPopo $tagPopo, Tag $tag): Tag
    {
        $tag->update(
            [
                'name'        => $tagPopo->name,
                'price'       => $tagPopo->price,
                'stock'       => $tagPopo->stock,
                'category_id' => $tagPopo->category_id,
            ]
        );

        return $tag->refresh();
    }

    /**
     * @param TagPopo $tagPopo
     * @return Tag
     */
    public function store(TagPopo $tagPopo): Tag
    {
        return Tag::create(
            [
                'name'        => $tagPopo->name,
                'price'       => $tagPopo->price,
                'stock'       => $tagPopo->stock,
                'category_id' => $tagPopo->category_id,
            ]
        );
    }
}
