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
    public function showRegisterForm()
    {
        return view('admin.auth.register');
    }

    /**
     * ------------------------------------------------------------------
     * Handle Admin Registration
     * ------------------------------------------------------------------
     */
    public function register(Request $request)
    {
        $request->validate(
            [
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'email', 'unique:admins,email'],
                'password' => [
                    'required',
                    'confirmed',
                    'min:8',
                    'regex:/[A-Z]/',   // At least one uppercase letter
                    'regex:/[a-z]/',   // At least one lowercase letter
                    'regex:/[0-9]/',   // At least one number
                ],
            ],
            [
                'password.regex' =>
                    'Password must contain at least one uppercase letter, one lowercase letter, and one number.',
            ]
        );

        Admin::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password, // Auto-hashed via Admin model
            'role' => 'admin',
            'status' => 'active',
        ]);

        return redirect()
            ->route('admin.login')
            ->with('success', 'Admin account created successfully. Please login.');
    }

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

        $credentials = $request->only('email', 'password');

        if (
            Auth::guard('admin')->attempt(
                $credentials,
                $request->filled('remember')
            )
        ) {
            $request->session()->regenerate();

            // Redirect to the intended URL (if present) or the admin dashboard.
            return redirect()->intended(route('admin.dashboard'));
        }

        return back()
            ->withErrors([
                'email' => 'Invalid email or password.',
            ])
            ->withInput();
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
