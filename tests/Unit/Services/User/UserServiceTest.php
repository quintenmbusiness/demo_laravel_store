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

        $this->userPopo = new UserPopo(
            'quinten',
            'quintenmbusiness@gmail.com',
            'test',
            null
        );
    }
}
