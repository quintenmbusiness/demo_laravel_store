<?php

namespace Services\Product;

use App\Models\Product\Tag;
use App\Models\User\User;
use App\Popo\Product\TagPopo;
use App\Repositories\Product\TagRepository;
use App\Services\Product\TagService;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TagServiceTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @var TagRepository $tagRepository
     */
    private TagRepository $tagRepository;

    /**
     * @var TagPopo
     */
    private TagPopo $tagPopo;

    /**
     * @var User $user
     */
    private User $user;

    /**
     * @var Tag
     */
    private Tag $tag;

    /**
     * @var TagService $tagService
     */
    private TagService $tagService;

    protected function setUp(): void
    {
        parent::setUp();

        $this->tagRepository = new TagRepository();
        $this->tagService = new TagService($this->tagRepository);
        $this->tag = Tag::factory()->create();

        $this->user = User::factory()->create();
        $this->tagPopo = new TagPopo($this->user->id);
    }

    public function test_index_method()
    {
        $result = $this->tagService->index();

        $this->assertInstanceOf(Collection::class, $result);
        $this->assertCount(1, $result);
    }

    public function test_show_method()
    {
        $result = $this->tagService->show($this->tag);

        $this->assertSame($this->tag->toArray(), $result->toArray());
    }

    public function test_update_method()
    {
        $updatedTag = $this->tagService->update($this->tagPopo, $this->tag);

        $this->assertEquals($this->user->id, $updatedTag->user_id);
    }

    public function testDelete()
    {
        $result = $this->tagService->delete($this->tag);

        $this->assertTrue($result);
        $this->assertNull(Tag::find($this->tag->id));
    }

    public function testStore()
    {
        $tag = $this->tagService->store($this->tagPopo);

        $this->assertInstanceOf(Tag::class, $tag);
        $this->assertEquals($this->user->id, $tag->user_id);
    }
}
