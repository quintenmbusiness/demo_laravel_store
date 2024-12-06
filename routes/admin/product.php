<?php

use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\AdminProductController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin/products')->group(function () {
    Route::get('/', [AdminDashboardController::class, 'products'])->name('admin.products');
    Route::get('/create', [AdminProductController::class, 'create'])->name('admin.products.create');
    Route::post('/create', [AdminProductController::class, 'store'])->name('admin.products.store');
    Route::get('/edit/{id}', [AdminProductController::class, 'edit'])->name('admin.products.edit');
    Route::put('/update/{id}', [AdminProductController::class, 'update'])->name('admin.products.update');
    Route::delete('/delete/{id}', [AdminProductController::class, 'destroy'])->name('admin.products.delete');
});
