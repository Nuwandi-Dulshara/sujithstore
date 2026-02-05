<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminAuthController extends Controller
{
    /**
     * ------------------------------------------------------------------
     * Show Admin Registration Page
     * ------------------------------------------------------------------
     */
    /**
     * ------------------------------------------------------------------
     * Handle Admin Registration
     * ------------------------------------------------------------------
     */
    /**
     * ------------------------------------------------------------------
     * Show Admin Login Page
     * ------------------------------------------------------------------
     */
    public function showLoginForm()
    {
        return view('admin.auth.login');
    }

    /**
     * ------------------------------------------------------------------
     * Handle Admin Login
     * ------------------------------------------------------------------
     */
    public function login(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::guard('admin')->attempt(
            $request->only('email', 'password'),
            $request->filled('remember')
        )) {
            $request->session()->regenerate();

            return redirect()->route('admin.dashboard');
        }

        return back()->withErrors([
            'email' => 'Invalid email or password.',
        ]);
    }


    /**
     * ------------------------------------------------------------------
     * Logout Admin
     * ------------------------------------------------------------------
     */
    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('admin.login');
    }
}
