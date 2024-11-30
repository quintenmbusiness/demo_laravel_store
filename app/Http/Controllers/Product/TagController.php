<?php

namespace App\Http\Controllers\Product;

use App\Http\Requests\Product\Tag\DeleteTagRequest;
use App\Http\Requests\Product\Tag\IndexTagRequest;
use App\Http\Requests\Product\Tag\ShowTagRequest;
use App\Http\Requests\Product\Tag\StoreTagRequest;
use App\Http\Requests\Product\Tag\UpdateTagRequest;
use App\Models\Product\Tag;
use App\Services\Product\TagService;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Routing\Controller;

class TagController extends Controller
{
    /**
     * @var TagService
     */
    private TagService $tagService;

    /**
     * @param TagService $tagService
     */
    public function __construct(TagService $tagService)
    {
        $this->tagService = $tagService;
    }

    /**
     * @param IndexTagRequest $request
     * @return Collection
     */
    public function index(IndexTagRequest $request): Collection
    {
        return $this->tagService->index();
    }

    /**
     * @param ShowTagRequest $request
     * @param Tag $tag
     * @return Tag
     */
    public function show(ShowTagRequest $request, Tag $tag): Tag
    {
        return $this->tagService->show($tag);
    }

    /**
     * @param UpdateTagRequest $request
     * @param Tag $tag
     * @return Tag
     */
    public function update(UpdateTagRequest $request, Tag $tag): Tag
    {
        return $this->tagService->update($request->toPopo(), $tag);
    }

    /**
     * @param DeleteTagRequest $request
     * @param Tag $tag
     * @return bool
     */
    public function delete(DeleteTagRequest $request, Tag $tag): bool
    {
        return $this->tagService->delete($tag);
    }

    /**
     * @param  StoreTagRequest $request
     * @return Tag
     */
    public function store(StoreTagRequest $request): Tag
    {
        return $this->tagService->store($request->toPopo());
    }
}
