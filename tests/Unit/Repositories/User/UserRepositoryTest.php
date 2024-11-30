<?php

namespace Repositories\User;

use App\Models\User\User;
use App\Popo\User\UserPopo;
use App\Repositories\User\UserRepository;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UserRepositoryTest extends TestCase
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

    protected function setUp(): void
    {
        parent::setUp();

        $this->userRepository = new UserRepository();
        $this->user = User::factory()->create();

        $this->userPopo = new UserPopo(
            'quinten',
            'quintenmbusiness@gmail.com',
            null
        );
    }

    public function test_index_method()
    {
        $result = $this->userRepository->index();

        $this->assertInstanceOf(Collection::class, $result);
        $this->assertCount(1, $result);
    }

    public function test_show_method()
    {
        $result = $this->userRepository->show($this->user);

        $this->assertSame($this->user->toArray(), $result->toArray());
    }

    public function test_update_method()
    {
        $updatedUser = $this->userRepository->update($this->userPopo, $this->user);

        $this->assertEquals($this->user->name, $updatedUser->name);
        $this->assertEquals($this->user->email, $updatedUser->email);
        $this->assertEquals($this->user->email_verified_at, $updatedUser->email_verified_at);
    }

    public function test_delete_method()
    {
        $result = $this->userRepository->delete($this->user);

        $this->assertTrue($result);
        $this->assertNull(User::find($this->user->id));
    }

    public function test_store_method()
    {
        $user = $this->userRepository->store($this->userPopo);

        $this->assertInstanceOf(User::class, $user);
        $this->assertEquals($this->user->name, $user->name);
        $this->assertEquals($this->user->email, $user->email);
        $this->assertEquals($this->user->email_verified_at, $user->email_verified_at);
    }
}
