<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product\Product;
use App\Models\Order\Order;
use App\Models\User\Role;
use App\Models\User\User;
use App\Models\Product\Category;
use Illuminate\Routing\Controller;
use Illuminate\View\View;

class AdminDashboardController extends Controller
{
    /**
     * Display the admin dashboard with statistics.
     *
     * @return View
     */
    public function index(): View
    {
        $stats = [
            'users' => User::count(),
            'orders' => Order::count(),
            'products' => Product::count(),
            'revenue' => Order::sum('total'),
        ];

        return view('admin.dashboard', compact('stats'));
    }

    /**
     * Display the products management page with related data.
     *
     * @return View
     */
    public function products(): View
    {
        $products = Product::with('category')->get();
        $categories = Category::all();

        return view('admin.products', compact('products', 'categories'));
    }

    /**
     * Display the orders management page with related data.
     *
     * @return View
     */
    public function orders(): View
    {
        $orders = Order::with('user')->get();
        $statuses = Order::distinct('status')->pluck('status');
        $users = User::all();

        return view('admin.orders.index', compact('orders', 'statuses', 'users'));
    }

    /**
     * Display the categories management page with additional statistics.
     *
     * @return View
     */
    public function categories(): View
    {
        $categories = Category::withCount('products')->get();

        return view('admin.categories', compact('categories'));
    }

    /**
     * Display the users management page with additional statistics.
     *
     * @return View
     */
    public function users(): View
    {
        $users = User::with('roles', 'orders')->get();
        $roles = Role::all(); // Adjust based on your roles setup.

        return view('admin.users', compact('users', 'roles'));
    }
}
