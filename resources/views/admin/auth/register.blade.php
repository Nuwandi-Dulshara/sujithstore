@extends('admin.layouts.auth')
@section('title', 'Create Account')

@section('content')
<div class="text-center mb-4">
    <h4 class="fw-bold" style="color:var(--ks-blue)">Create Account</h4>
    <p class="text-muted small">Enter your details to join the admin panel</p>
</div>

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

<form action="{{ route('admin.register') }}" method="POST">
    @csrf
    
    <div class="form-floating mb-3">
        <input type="text" class="form-control" id="floatingName"
               name="name" value="{{ old('name') }}" required>
        <label for="floatingName">
            <i class="bi bi-person me-2"></i>Full Name
        </label>
    </div>

    <div class="form-floating mb-3">
        <input type="email" class="form-control" id="floatingEmail"
               name="email" value="{{ old('email') }}" required>
        <label for="floatingEmail">
            <i class="bi bi-envelope me-2"></i>Official Email
        </label>
    </div>

    <div class="form-floating mb-3">
        <input type="password" class="form-control" id="floatingPassword"
               name="password" required>
        <label for="floatingPassword">
            <i class="bi bi-lock me-2"></i>Password
        </label>
    </div>

    <div class="form-floating mb-4">
        <input type="password" class="form-control" id="floatingConfirm"
               name="password_confirmation" required>
        <label for="floatingConfirm">
            <i class="bi bi-shield-check me-2"></i>Confirm Password
        </label>
    </div>

    <button type="submit" class="btn btn-main w-100 mb-3">
        Sign Up <i class="bi bi-arrow-right-short ms-1"></i>
    </button>

    <div class="text-center">
        <p class="text-muted mb-0 small">
            Already have an account?
            <a href="{{ route('admin.login') }}" class="brand-link">Sign In</a>
        </p>
    </div>
</form>
@endsection
