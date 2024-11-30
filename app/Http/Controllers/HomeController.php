<?php

namespace App\Http\Controllers;

use App\Models\Product\Product;
use App\Models\Order\Order;
use App\Models\User\User;
use App\Models\Product\Category;
use Illuminate\Routing\Controller;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function index()
    {
        $products = Product::take(6)->get(); // Example: Fetch 6 products
        return view('home', compact('products'));
    }
}
