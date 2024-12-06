<?php

namespace App\Http\Controllers\Public;

use App\Models\Order\Order;
use App\Services\Public\CartService;
use App\Services\Public\UserService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class UserController extends Controller
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
     * Show the profile page.
     *
     * @return View
     */
    public function index()
    {
        $user = Auth::user();
        $orders = Order::where('user_id', $user->id)->orderBy('created_at', 'desc')->get();

        return view('user.profile', compact('user', 'orders'));
    }
}
