@extends('admin.layouts.auth')
@section('title', 'Login')

@section('content')
<div class="text-center mb-4">
    <h4 class="fw-bold" style="color:var(--ks-blue)">Welcome Back!</h4>
    <p class="text-muted small">Please sign in to your admin account</p>
</div>

{{-- Success Message --}}
@if (session('success'))
    <div class="alert alert-success small">
        {{ session('success') }}
    </div>
@endif

{{-- Validation Errors --}}
@if ($errors->any())
    <div class="alert alert-danger small">
        <ul class="mb-0 ps-3">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('admin.login') }}" method="POST">
    @csrf

    <div class="form-floating mb-3">
        <input 
            type="email" 
            class="form-control" 
            id="floatingEmail" 
            placeholder="name@example.com" 
            name="email" 
            value="{{ old('email') }}" 
            required
        >
        <label for="floatingEmail">
            <i class="bi bi-envelope me-2"></i>Email Address
        </label>
    </div>

    <div class="form-floating mb-3">
        <input 
            type="password" 
            class="form-control" 
            id="floatingPassword" 
            placeholder="Password" 
            name="password" 
            required
        >
        <label for="floatingPassword">
            <i class="bi bi-lock me-2"></i>Password
        </label>
    </div>

    <div class="d-flex justify-content-between align-items-center mb-4">
        <div class="form-check">
            <input 
                class="form-check-input" 
                type="checkbox" 
                name="remember" 
                id="rememberCheck"
            >
            <label class="form-check-label text-muted small" for="rememberCheck">
                Remember Me
            </label>
        </div>
    </div>

    <button type="submit" class="btn btn-main w-100 mb-3">
        Sign In <i class="bi bi-box-arrow-in-right ms-1"></i>
    </button>

    <div class="text-center">
        <p class="text-muted mb-0 small">
            Don't have an account?
            <a href="{{ route('admin.register') }}" class="brand-link">
                Create Account
            </a>
        </p>
    </div>
</form>
@endsection
