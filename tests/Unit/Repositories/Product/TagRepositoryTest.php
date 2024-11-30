<?php

namespace Repositories\Product;

use App\Models\Product\Tag;
use App\Models\User\User;
use App\Popo\Product\TagPopo;
use App\Repositories\Product\TagRepository;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TagRepositoryTest extends TestCase
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
     * @var Tag
     */
    private Tag $tag;

    protected function setUp(): void
    {
        parent::setUp();

        $this->tagRepository = new TagRepository();
        $this->tag = Tag::factory()->create();

        $this->user = User::factory()->create();
        $this->tagPopo = new TagPopo('test');
    }

    public function test_index_method()
    {
        $result = $this->tagRepository->index();

        $this->assertInstanceOf(Collection::class, $result);
        $this->assertCount(1, $result);
    }

    public function test_show_method()
    {
        $result = $this->tagRepository->show($this->tag);

        $this->assertSame($this->tag->toArray(), $result->toArray());
    }

    public function test_update_method()
    {
        $updatedTag = $this->tagRepository->update($this->tagPopo, $this->tag);

        $this->assertEquals($this->tagPopo->name, $updatedTag->name);
    }

    public function test_delete_method()
    {
        $result = $this->tagRepository->delete($this->tag);

        $this->assertTrue($result);
        $this->assertNull(Tag::find($this->tag->id));
    }

    public function test_store_method()
    {
        $tag = $this->tagRepository->store($this->tagPopo);

        $this->assertInstanceOf(Tag::class, $tag);
        $this->assertEquals($this->tagPopo->name, $tag->name);
    }
}
