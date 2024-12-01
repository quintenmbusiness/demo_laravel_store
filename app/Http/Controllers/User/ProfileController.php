<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Order\Order;
use Illuminate\View\View;

class ProfileController extends Controller
{
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

    /**
     * Update the user's profile.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . Auth::id(),
            'invoice_address' => 'nullable|string|max:255',
            'shipping_address' => 'nullable|string|max:255',
        ]);


        $user->update($request->only('name', 'email', 'invoice_address', 'shipping_address'));

        return redirect()->route('profile')->with('success', 'Profile updated successfully.');
    }

    public function settings(Request $request) {
        $user = Auth::user();

        return view('user.profile.settings', compact('user'));
    }
}
