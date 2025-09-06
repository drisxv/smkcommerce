<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VendorController;
use App\Http\Controllers\ImageController;
use App\Http\Middleware\CheckFirstAdmin;
use App\Http\Controllers\Auth\RegisteredUserController;

// Homepage (cek user pertama)
Route::get('/', [CustomerController::class, 'index'])->name('welcome');

// Image upload routes
Route::get('/upload-form', [ImageController::class, 'create']);
Route::post('/upload-image', [ImageController::class, 'store']);


// Semua route yang butuh auth
Route::middleware(['auth'])->group(function () {

    // Admin routes
    Route::prefix('admin')->name('admin.')->group(function () {
        Route::get('/', [AdminController::class, 'index'])->name('dashboard');
        Route::get('/partnership', [AdminController::class, 'partnership'])->name('partnership');
        Route::get('/about', [AdminController::class, 'about'])->name('about');

        // User routes
        Route::resource('users', UserController::class);

        // Vendor routes
        Route::resource('vendors', VendorController::class);
    });
});
