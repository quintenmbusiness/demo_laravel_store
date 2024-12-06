<?php

use App\Http\Controllers\Public\HomeController;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Route;


$files = File::allFiles(__DIR__);

foreach ($files as $file) {
    if ($file->getFilename() !== 'web.php') {
        require $file->getPathname();
    }
}

Route::get('', [HomeController::class, 'index'])->name('home');
