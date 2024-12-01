<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Product\ProductController;
use Illuminate\Support\Facades\Route;

Route::prefix('products')->group(function () {
    Route::get('/', [DashboardController::class, 'products'])->name('admin.products');
    Route::get('/create', [ProductController::class, 'create'])->name('admin.products.create'); // Show create form
    Route::post('/create', [ProductController::class, 'store'])->name('admin.products.store');  // Store new product
    Route::get('/edit/{id}', [ProductController::class, 'edit'])->name('admin.products.edit');  // Show edit form
    Route::put('/update/{id}', [ProductController::class, 'update'])->name('admin.products.update'); // Update product
    Route::delete('/delete/{id}', [ProductController::class, 'destroy'])->name('admin.products.delete'); // Delete product
});
