<?php

namespace Repositories\Admin;

use App\Models\User\User;
use App\Popo\User\UserPopo;
use App\Repositories\Admin\AdminUserRepository;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AdminUserRepositoryTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @var AdminUserRepository $repository
     */
    private AdminUserRepository $repository;

    /**
     * @var User $user
     */
    private User $user;

    /**
     * @var UserPopo $userPopo
     */
    private UserPopo $userPopo;

    protected function setUp(): void
    {
        parent::setUp();

        $this->repository = new AdminUserRepository();
        $this->user = User::factory()->create();

        $this->userPopo = new UserPopo(
           'New User',
           'newuser@example.com',
           'password'
        );
    }

    public function test_can_list_all_users(): void
    {
        $currentCount = User::count();
        User::factory()->count(3)->create();

        $users = $this->repository->index();

        $this->assertCount($currentCount + 3, $users);
        $this->assertInstanceOf(User::class, $users->first());
    }

    public function test_can_delete_a_user(): void
    {
        $user = User::factory()->create();

        $result = $this->repository->delete($user);

        $this->assertTrue($result);
        $this->assertDatabaseMissing('users', ['id' => $user->id]);
    }

    public function test_can_show_a_user(): void
    {
        $user = User::factory()->create();

        $foundUser = $this->repository->show($user);

        $this->assertInstanceOf(User::class, $foundUser);
        $this->assertEquals($user->id, $foundUser->id);
    }

    public function test_can_update_a_user(): void
    {
        $user = User::factory()->create(['name' => 'Old User']);

        $userPopo = new UserPopo(
            'Updated User',
            'updateduser@example.com',
            'updatedPassword'
        );

        $updatedUser = $this->repository->update($userPopo, $user);

        $this->assertEquals('Updated User', $updatedUser->name);
        $this->assertDatabaseHas('users', ['id' => $user->id, 'name' => 'Updated User']);
    }

    public function test_can_store_a_new_user(): void
    {
        $userPopo = new UserPopo(
            'New User',
            'newuser@example.com',
            'password'
        );

        $newUser = $this->repository->store($userPopo);

        $this->assertInstanceOf(User::class, $newUser);
        $this->assertDatabaseHas('users', ['id' => $newUser->id, 'name' => 'New User']);
    }
}
