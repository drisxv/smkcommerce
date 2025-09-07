<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\InformationController;
use App\Http\Controllers\SettingController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VendorController;
use App\Http\Controllers\PartnershipController;
use App\Http\Controllers\ImageController;
use App\Http\Middleware\CheckFirstAdmin;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\ContactController;

// Homepage (cek user pertama)
Route::get('/', [CustomerController::class, 'index'])->name('welcome');
Route::get('/infromations/{id}', [CustomerController::class, 'show'])->name('informations.show');

// Image upload routes
Route::get('/upload-form', [ImageController::class, 'create']);
Route::post('/upload-image', [ImageController::class, 'store']);


// Semua route yang butuh auth
Route::middleware(['auth'])->group(function () {

    // Admin routes
    Route::prefix('admin')->name('admin.')->group(function () {
        Route::get('/', [SettingController::class, 'index'])->name('dashboard');

        // User routes
        Route::resource('users', UserController::class);

        // Vendor routes
        Route::resource('vendors', VendorController::class);
        Route::resource('partnerships', PartnershipController::class);
        Route::resource('informations', InformationController::class);
        Route::resource('contacts', ContactController::class);
        Route::resource('settings', SettingController::class);
        Route::resource('abouts', AboutController::class);
    });
});
