<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Auth\Middleware\RedirectIfAuthenticated;
use Illuminate\Http\Request;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Ensure admin area uses admin.dashboard when RedirectIfAuthenticated triggers
        // Only redirect to admin dashboard if the request is for admin routes
        // and the 'admin' guard is authenticated. This prevents non-admin
        // authenticated users from being redirected away from admin login.
        RedirectIfAuthenticated::redirectUsing(function (Request $request) {
            if (($request->is('admin') || $request->is('admin/*')) && auth()->guard('admin')->check()) {
                return route('admin.dashboard');
            }

            return '/';
        });
    }
}
