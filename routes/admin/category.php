<?php

use App\Http\Controllers\Admin\AdminCategoryController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin/categories')->group(function () {
    Route::get('/', [AdminCategoryController::class, 'index'])->name('admin.categories');
    Route::get('/create', [AdminCategoryController::class, 'create'])->name('admin.categories.create');
    Route::post('/create', [AdminCategoryController::class, 'store'])->name('admin.categories.store');
    Route::get('/show/{category}', [AdminCategoryController::class, 'show'])->name('admin.categories.show');
    Route::put('/update/{category}', [AdminCategoryController::class, 'update'])->name('admin.categories.update');
    Route::delete('/delete/{category}', [AdminCategoryController::class, 'delete'])->name('admin.categories.delete');
});
