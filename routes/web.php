<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Order\OrderController;
use App\Http\Controllers\Product\CategoryController;
use App\Http\Controllers\Product\ProductController;
use App\Http\Controllers\User\CartController;
use App\Http\Controllers\User\UserController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\DashboardController;

Route::prefix('/cart/')->group(function () {
    Route::get('', [CartController::class, 'viewCartItems'])->name('cart.view');
    Route::get('clear', [CartController::class, 'clearCart'])->name('cart.clear');
    Route::post('add', [CartController::class, 'addCartItem'])->name('cart.add');
    Route::delete('remove', [CartController::class, 'removeCartItem'])->name('cart.remove');
});


Route::get('', [HomeController::class, 'index'])->name('home');
Route::get('/products', [ProductController::class, 'index'])->name('products');
Route::get('/products/{id}', [ProductController::class, 'show'])->name('product.details');
Route::get('/checkout', [OrderController::class, 'checkout'])->name('checkout');
Route::post('/checkout', [OrderController::class, 'process'])->name('checkout.process');
Route::get('/profile', [UserController::class, 'index'])->name('profile');
Route::get('/profile/orders', [OrderController::class, 'index'])->name('profile.orders');
Route::get('/settings', [UserController::class, 'settings'])->name('settings');

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
    Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
});

Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

Route::prefix('admin')->group(function () {
    // Dashboard
    Route::get('/', [DashboardController::class, 'index'])->name('admin.dashboard');

    // Products
    Route::prefix('products')->group(function () {
        Route::get('/', [DashboardController::class, 'products'])->name('admin.products');
        Route::get('/create', [ProductController::class, 'create'])->name('admin.products.create'); // Show create form
        Route::post('/create', [ProductController::class, 'store'])->name('admin.products.store');  // Store new product
        Route::get('/edit/{id}', [ProductController::class, 'edit'])->name('admin.products.edit');  // Show edit form
        Route::put('/update/{id}', [ProductController::class, 'update'])->name('admin.products.update'); // Update product
        Route::delete('/delete/{id}', [ProductController::class, 'destroy'])->name('admin.products.delete'); // Delete product
    });

    // Orders
    Route::prefix('orders')->group(function () {
        Route::get('/', [DashboardController::class, 'orders'])->name('admin.orders');
        Route::get('/create', [OrderController::class, 'create'])->name('admin.orders.create'); // Show create form
        Route::post('/create', [OrderController::class, 'store'])->name('admin.orders.store');  // Store new product
        Route::get('/edit/{id}', [OrderController::class, 'edit'])->name('admin.orders.edit'); // Show edit form
        Route::put('/update/{id}', [OrderController::class, 'update'])->name('admin.orders.update'); // Update order
        Route::delete('/delete/{id}', [OrderController::class, 'destroy'])->name('admin.orders.delete'); // Delete order
    });

    // Users
    Route::prefix('users')->group(function () {
        Route::get('/', [DashboardController::class, 'users'])->name('admin.users');
        Route::get('/create', [UserController::class, 'create'])->name('admin.users.create'); // Show create form
        Route::post('/create', [UserController::class, 'store'])->name('admin.users.store');  // Store new user
        Route::get('/edit/{id}', [UserController::class, 'edit'])->name('admin.users.edit');  // Show edit form
        Route::put('/update/{id}', [UserController::class, 'update'])->name('admin.users.update'); // Update user
        Route::delete('/delete/{id}', [UserController::class, 'destroy'])->name('admin.users.delete'); // Delete user
    });

    // Categories
    Route::prefix('categories')->group(function () {
        Route::get('/', [DashboardController::class, 'categories'])->name('admin.categories');
        Route::get('/create', [CategoryController::class, 'create'])->name('admin.categories.create'); // Show create form
        Route::post('/create', [CategoryController::class, 'store'])->name('admin.categories.store');  // Store new category
        Route::get('/edit/{id}', [CategoryController::class, 'edit'])->name('admin.categories.edit');  // Show edit form
        Route::put('/update/{id}', [CategoryController::class, 'update'])->name('admin.categories.update'); // Update category
        Route::delete('/delete/{id}', [CategoryController::class, 'destroy'])->name('admin.categories.delete'); // Delete category
    });
});
