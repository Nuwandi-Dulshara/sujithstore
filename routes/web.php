<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\AdminUserController;
use App\Http\Controllers\Admin\AdminCategoryController;
use App\Http\Controllers\Admin\AdminProductController;
use App\Http\Controllers\Admin\AdminSettingsController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\SearchController;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/

Route::prefix('admin')->name('admin.')->group(function () {

    /*
    |--------------------------------------------------------------------------
    | Admin Authentication Routes (Guests Only)
    |--------------------------------------------------------------------------
    */
    Route::middleware('guest:admin')->group(function () {

        Route::get('/login', [AdminAuthController::class, 'showLoginForm'])
            ->name('login');

        Route::post('/login', [AdminAuthController::class, 'login']);
    });

    /*
    |--------------------------------------------------------------------------
    | Admin Protected Routes (Authenticated Only)
    |--------------------------------------------------------------------------
    */
    Route::middleware('auth:admin')->group(function () {

        Route::post('/logout', [AdminAuthController::class, 'logout'])
            ->name('logout');

        Route::get('/dashboard', [AdminDashboardController::class, 'index'])
            ->name('dashboard');

        Route::resource('users', AdminUserController::class);
        Route::resource('categories', AdminCategoryController::class);
        Route::resource('products', AdminProductController::class);

        Route::get('/settings', [AdminSettingsController::class, 'index'])
            ->name('settings');

        Route::post('/settings/profile', [AdminSettingsController::class, 'updateProfile'])
            ->name('settings.updateProfile');

        Route::post('/settings/password', [AdminSettingsController::class, 'updatePassword'])
            ->name('settings.updatePassword');
    });
});

/*
|--------------------------------------------------------------------------
| Frontend Routes
|--------------------------------------------------------------------------
*/

Route::get('/', [FrontendController::class, 'index'])->name('home');
Route::get('/category/{slug}', [FrontendController::class, 'category'])->name('category.show');
Route::get('/search', [SearchController::class, 'index'])->name('search');

require __DIR__ . '/user.php';
