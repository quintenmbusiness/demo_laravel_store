<?php

use App\Http\Controllers\Admin\AdminCategoryController;
use App\Http\Controllers\Admin\AdminDashboardController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin/categories')->group(function () {
    Route::get('/', [AdminDashboardController::class, 'categories'])->name('admin.categories');
    Route::get('/create', [AdminCategoryController::class, 'create'])->name('admin.categories.create');
    Route::post('/create', [AdminCategoryController::class, 'store'])->name('admin.categories.store');
    Route::get('/edit/{id}', [AdminCategoryController::class, 'edit'])->name('admin.categories.edit');
    Route::put('/update/{id}', [AdminCategoryController::class, 'update'])->name('admin.categories.update');
    Route::delete('/delete/{id}', [AdminCategoryController::class, 'destroy'])->name('admin.categories.delete');
});
