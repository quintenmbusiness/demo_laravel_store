<?php

use App\Http\Controllers\Admin\AdminDashboardController;
use Illuminate\Support\Facades\Route;

Route::get('/admin', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
