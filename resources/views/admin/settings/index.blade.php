@extends('admin.layouts.app')

@section('title', 'Admin Profile Settings')

@section('content')
<style>
    :root {
        --ks-blue: #1f2a6d;
        --ks-red: #e11d2a;
    }

    .profile-wrapper {
        animation: fadeSlide 0.8s ease-in-out;
    }

    @keyframes fadeSlide {
        from {
            opacity: 0;
            transform: translateY(25px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .profile-card {
        background: linear-gradient(135deg, #ffffff, #f4f6ff);
        border-radius: 18px;
        box-shadow: 0 20px 40px rgba(31,42,109,0.15);
        border: none;
        transition: transform 0.3s ease;
    }

    .profile-card:hover {
        transform: translateY(-4px);
    }

    .avatar-wrapper {
        width: 130px;
        height: 130px;
        border-radius: 50%;
        background: linear-gradient(135deg, var(--ks-blue), var(--ks-red));
        padding: 4px;
        margin: auto;
        transition: transform 0.4s ease;
    }

    .avatar-wrapper:hover {
        transform: scale(1.05) rotate(1deg);
    }

    .avatar-wrapper img {
        width: 100%;
        height: 100%;
        border-radius: 50%;
        object-fit: cover;
        background: #fff;
    }

    .section-title {
        color: var(--ks-blue);
        font-weight: 600;
        letter-spacing: .5px;
    }

    .form-control {
        border-radius: 12px;
        padding: 12px 14px;
    }

    .form-control:focus {
        box-shadow: 0 0 0 3px rgba(31,42,109,0.15);
        border-color: var(--ks-blue);
    }

    .btn-ks {
        background: linear-gradient(135deg, var(--ks-blue), var(--ks-red));
        border: none;
        color: #fff;
        padding: 10px 24px;
        border-radius: 30px;
        transition: all 0.3s ease;
    }

    .btn-ks:hover {
        opacity: 0.9;
        transform: translateY(-1px);
    }

    .divider {
        height: 1px;
        background: linear-gradient(to right, transparent, #ddd, transparent);
        margin: 35px 0;
    }

    .toggle-password {
        cursor: pointer;
    }
</style>

<div class="container-fluid profile-wrapper" style="margin-top:100px;">
    <div class="row justify-content-center">
        <div class="col-xl-8 col-lg-9">

            <div class="card profile-card p-4">
                <div class="text-center mb-4">
                    <div class="avatar-wrapper mb-3">
                        <img src="{{ auth('admin')->user()->profile_image
                            ? asset('storage/' . auth('admin')->user()->profile_image)
                            : asset('images/default-avatar.png') }}">
                    </div>

                    <h5 class="mb-1">{{ auth('admin')->user()->name }}</h5>
                    <small class="text-muted">{{ auth('admin')->user()->email }}</small>
                </div>

                {{-- Alerts --}}
                @if ($errors->any())
                    <div class="alert alert-danger alert-dismissible fade show">
                        <strong>Validation Error!</strong>
                        <ul class="mb-0 mt-2">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif

                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif

                {{-- Profile Update --}}
                <h6 class="section-title mb-3">
                    <i class="bi bi-person-gear me-2"></i>Profile Information
                </h6>

                <form method="POST" action="{{ route('admin.settings.updateProfile') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Admin Name</label>
                            <input type="text" class="form-control" name="name"
                                   value="{{ old('name', auth('admin')->user()->name) }}">
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label">Email Address</label>
                            <input type="email" class="form-control" name="email"
                                   value="{{ old('email', auth('admin')->user()->email) }}">
                        </div>

                        <div class="col-md-12 mb-3">
                            <label class="form-label">Profile Image</label>
                            <input type="file" class="form-control" name="profile_image">
                        </div>
                    </div>

                    <div class="text-end">
                        <button class="btn btn-ks">
                            <i class="bi bi-save me-1"></i> Update Profile
                        </button>
                    </div>
                </form>

                <div class="divider"></div>

                {{-- Password Update --}}
                <h6 class="section-title mb-3">
                    <i class="bi bi-shield-lock me-2"></i>Change Password
                </h6>

                <form method="POST" action="{{ route('admin.settings.updatePassword') }}">
                    @csrf
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label class="form-label">Current Password</label>
                            <div class="input-group">
                                <input type="password" class="form-control password-field" name="current_password">
                                <span class="input-group-text toggle-password">
                                    <i class="bi bi-eye"></i>
                                </span>
                            </div>
                        </div>

                        <div class="col-md-4 mb-3">
                            <label class="form-label">New Password</label>
                            <div class="input-group">
                                <input type="password" class="form-control password-field" name="password">
                                <span class="input-group-text toggle-password">
                                    <i class="bi bi-eye"></i>
                                </span>
                            </div>
                        </div>

                        <div class="col-md-4 mb-3">
                            <label class="form-label">Confirm Password</label>
                            <div class="input-group">
                                <input type="password" class="form-control password-field" name="password_confirmation">
                                <span class="input-group-text toggle-password">
                                    <i class="bi bi-eye"></i>
                                </span>
                            </div>
                        </div>
                    </div>

                    <div class="text-end">
                        <button class="btn btn-ks">
                            <i class="bi bi-key me-1"></i> Change Password
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>

<script>
    document.querySelectorAll('.toggle-password').forEach(toggle => {
        toggle.addEventListener('click', function () {
            const input = this.closest('.input-group').querySelector('.password-field');
            const icon = this.querySelector('i');

            if (input.type === 'password') {
                input.type = 'text';
                icon.classList.replace('bi-eye', 'bi-eye-slash');
            } else {
                input.type = 'password';
                icon.classList.replace('bi-eye-slash', 'bi-eye');
            }
        });
    });
</script>
@endsection
