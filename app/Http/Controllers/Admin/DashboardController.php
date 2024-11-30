<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product\Product;
use App\Models\Order\Order;
use App\Models\User\User;
use App\Models\Product\Category;
use Illuminate\Routing\Controller;
use Illuminate\View\View;

class DashboardController extends Controller
{
    /**
     * Display the admin dashboard.
     *
     * @return View
     */
    public function index()
    {
        $stats = [
            'users' => User::count(),       // Total users
            'orders' => Order::count(),    // Total orders
            'products' => Product::count(), // Total products
            'revenue' => Order::sum('total'), // Total revenue from orders
        ];

        return view('admin.dashboard', compact('stats'));
    }

    /**
     * Display the products management page.
     *
     * @return View
     */
    public function products()
    {
        $products = Product::all();
        return view('admin.products', compact('products'));
    }

    /**
     * Display the orders management page.
     *
     * @return View
     */
    public function orders()
    {
        $orders = Order::all();
        return view('admin.orders', compact('orders'));
    }

    /**
     * Display the categories management page.
     *
     * @return View
     */
    public function categories()
    {
        $categories = Category::all();
        return view('admin.categories', compact('categories'));
    }

    /**
     * Display the users management page.
     *
     * @return View
     */
    public function users()
    {
        $users = User::all();
        return view('admin.users', compact('users'));
    }
}
