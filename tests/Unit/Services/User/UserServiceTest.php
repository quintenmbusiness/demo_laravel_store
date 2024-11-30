<?php

namespace Services\User;

use App\Models\User\User;
use App\Popo\User\UserPopo;
use App\Repositories\User\UserRepository;
use App\Services\User\UserService;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UserServiceTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @var UserRepository $userRepository
     */
    private UserRepository $userRepository;

    /**
     * @var UserPopo
     */
    private UserPopo $userPopo;

    /**
     * @var User $user
     */
    private User $user;

    /**
     * @var UserService $userService
     */
    private UserService $userService;

    protected function setUp(): void
    {
        parent::setUp();

        $this->userRepository = new UserRepository();
        $this->userService = new UserService($this->userRepository);
        $this->user = User::factory()->create();

        $this->userPopo = new UserPopo($this->user->id);
    }

    public function test_index_method()
    {
        $result = $this->userService->index();

        $this->assertInstanceOf(Collection::class, $result);
        $this->assertCount(1, $result);
    }

    public function test_show_method()
    {
        $result = $this->userService->show($this->user);

        $this->assertSame($this->user->toArray(), $result->toArray());
    }

    public function test_update_method()
    {
        $updatedUser = $this->userService->update($this->userPopo, $this->user);

        $this->assertEquals($this->user->id, $updatedUser->user_id);
    }

    public function testDelete()
    {
        $result = $this->userService->delete($this->user);

        $this->assertTrue($result);
        $this->assertNull(User::find($this->user->id));
    }

    public function testStore()
    {
        $user = $this->userService->store($this->userPopo);

        $this->assertInstanceOf(User::class, $user);
        $this->assertEquals($this->user->id, $user->user_id);
    }
}
