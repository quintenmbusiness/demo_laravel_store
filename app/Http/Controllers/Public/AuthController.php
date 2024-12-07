<?php

namespace App\Http\Controllers\Public;

use App\Models\User\Role;
use App\Models\User\User;
use App\Services\Public\CartService;
use App\Services\Public\UserService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class AuthController extends Controller
{
    /**
     * @var UserService $userService
     */
    private UserService $userService;

    /**
     * @param UserService $userService
     */
    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    /**
     * Handle login request.
     *
     * @param Request $request
     *
     * @return bool
     */
    public function login(Request $request): bool
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            return $request->session()->regenerate();
        }

        return false;
    }

    /**
     * Handle registration request.
     *
     * @param Request $request
     *
     * @return bool
     */
    public function register(Request $request)
    {
        $credentials = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
        ]);

        User::create([
            'name' => $credentials['name'],
            'email' => $credentials['email'],
            'password' => Hash::make($credentials['password']),
        ]);

        if (Auth::attempt($credentials)) {
            return $request->session()->regenerate();
        }

        return false;
    }
}
