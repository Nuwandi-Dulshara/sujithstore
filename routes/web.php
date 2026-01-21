<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application.
|
*/

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/

use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\AdminUserController;
use App\Http\Controllers\Admin\AdminCategoryController;
use App\Http\Controllers\Admin\AdminProductController;
use App\Http\Controllers\Admin\AdminSettingsController;

Route::prefix('admin')->name('admin.')->group(function () {

    /*
    |--------------------------------------------------------------------------
    | Admin Authentication Routes (Guest Only)
    |--------------------------------------------------------------------------
    */
    Route::middleware('guest:admin')->group(function () {

        // Admin Register
        Route::get('/register', [AdminAuthController::class, 'showRegisterForm'])
            ->name('register');
        Route::post('/register', [AdminAuthController::class, 'register']);

        // Admin Login
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

        // Logout
        Route::post('/logout', [AdminAuthController::class, 'logout'])
            ->name('logout');

        // Dashboard
        Route::get('/dashboard', [AdminDashboardController::class, 'index'])
            ->name('dashboard');

        /*
        |--------------------------------------------------------------------------
        | USERS CRUD (ONLY name, email, password)
        |--------------------------------------------------------------------------
        */
        Route::resource('users', AdminUserController::class);

        /*
        |--------------------------------------------------------------------------
        | Categories CRUD
        |--------------------------------------------------------------------------
        */
        Route::resource('categories', AdminCategoryController::class);

        /*
        |--------------------------------------------------------------------------
        | Products CRUD
        |--------------------------------------------------------------------------
        */
        Route::resource('products', AdminProductController::class);

        /*
        |--------------------------------------------------------------------------
        | Settings
        |--------------------------------------------------------------------------
        */
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
| Default Redirect
|--------------------------------------------------------------------------
|
| Redirect root URL to admin login
|
*/

Route::get('/', function () {
    return redirect()->route('admin.login');
});
