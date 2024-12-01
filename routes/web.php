<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;


use Illuminate\Support\Facades\File;

$files = File::allFiles(__DIR__);

foreach ($files as $file) {
    if ($file->getFilename() !== 'web.php') {
        require $file->getPathname();
    }
}

Route::get('', [HomeController::class, 'index'])->name('home');
