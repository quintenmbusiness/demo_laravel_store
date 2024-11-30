<?php

namespace App\Services\Product;

use App\Models\Tag;
use App\Popo\TagPopo;
use App\Repositories\Tag\TagRepository;
use Illuminate\Database\Eloquent\Collection;

class TagService
{
    /**
     * @var TagRepository
     */
    private TagRepository $tagRepository;

    /**
     * @param TagRepository $tagRepository
     */
    public function __construct(TagRepository $tagRepository)
    {
        $this->tagRepository = $tagRepository;
    }

    /**
     * @return Collection
     */
    public function index(): Collection
    {
        return $this->tagRepository->index();
    }

    /**
     * @param Tag $tag
     * @return Tag
     */
    public function show(Tag $tag): Tag
    {
        return $this->tagRepository->show($tag);
    }

    /**
     * @param TagPopo $tagPopo
     * @param Tag $tag
     * @return Tag
     */
    public function update(TagPopo $tagPopo, Tag $tag): Tag
    {
        return $this->tagRepository->update($tagPopo, $tag);
    }

    /**
     * @param Tag $tag
     * @return bool
     */
    public function delete(Tag $tag): bool
    {
        return $this->tagRepository->delete($tag);
    }

    /**
     * @param TagPopo $popo
     * @return Tag
     */
    public function store(TagPopo $popo): Tag
    {
        return $this->tagRepository->store($popo);
    }
}
