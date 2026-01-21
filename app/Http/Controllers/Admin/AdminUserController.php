<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class AdminUserController extends Controller
{
    public function index()
    {
        $users = User::latest()->get();
        return view('admin.users.index', compact('users'));
    }

    public function create()
    {
        return view('admin.users.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|email|unique:users,email',
            'password' => 'required|min:6',
        ]);

        User::create($request->only('name','email','password'));

        return redirect()
            ->route('admin.users.index')
            ->with('success','User created successfully');
    }

    public function edit(User $user)
    {
        return view('admin.users.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name'  => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'password' => 'nullable|min:6',
        ]);

        $user->update($request->only('name','email'));

        if ($request->filled('password')) {
            $user->update([
                'password' => $request->password
            ]);
        }

        return redirect()
            ->route('admin.users.index')
            ->with('success','User updated successfully');
    }

    public function destroy(User $user)
    {
        $user->delete();

        return back()->with('success','User deleted successfully');
    }
}
