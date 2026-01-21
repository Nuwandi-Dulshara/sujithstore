@extends('admin.layouts.app')
@section('title', 'Create User')

@section('content')

<style>
    :root {
        --primary-navy: #1e293b;
        --primary-hover: #334155;
        --accent-blue: #3b82f6;
        --border-color: #e2e8f0;
        --bg-input: #f8fafc;
        --text-muted: #64748b;
    }

    .admin-card {
        background: #ffffff;
        border-radius: 12px;
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05);
        border: 1px solid var(--border-color);
    }

    .admin-card-header {
        padding: 20px 24px;
        border-bottom: 1px solid var(--border-color);
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .admin-card-header h5 {
        margin: 0;
        font-weight: 700;
        color: var(--primary-navy);
    }

    .admin-card-body {
        padding: 24px;
    }

    .form-label {
        font-size: 12px;
        text-transform: uppercase;
        font-weight: 600;
        color: var(--text-muted);
        margin-bottom: 6px;
    }

    .form-control {
        font-size: 14px;
        background-color: var(--bg-input);
        border: 1px solid var(--border-color);
        border-radius: 8px;
        padding: 10px 14px;
        color: var(--primary-navy);
    }

    .form-control:focus {
        border-color: var(--accent-blue);
        box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
        outline: none;
    }

    .btn-admin-primary {
        background-color: var(--primary-navy);
        color: white;
        padding: 10px 24px;
        border-radius: 8px;
        border: none;
    }

    .btn-admin-cancel {
        background-color: white;
        color: var(--text-muted);
        border: 1px solid var(--border-color);
        padding: 10px 24px;
        border-radius: 8px;
        margin-right: 10px;
        text-decoration: none;
    }
</style>

<div class="container-fluid py-4" style="margin-top:100px;">
    <div class="row justify-content-center">
        <div class="col-lg-8 col-xl-6">

            <form method="POST" action="{{ route('admin.users.store') }}">
                @csrf

                <div class="admin-card">

                    <!-- Header -->
                    <div class="admin-card-header">
                        <h5>Create New User</h5>
                        <a href="{{ route('admin.users.index') }}"
                           class="btn-sm text-decoration-none text-muted">
                            &larr; Back to list
                        </a>
                    </div>

                    <!-- Body -->
                    <div class="admin-card-body">

                        <div class="mb-4">
                            <label class="form-label">Name *</label>
                            <input name="name" class="form-control" required>
                        </div>

                        <div class="mb-4">
                            <label class="form-label">Email *</label>
                            <input name="email" type="email" class="form-control" required>
                        </div>

                        <div class="mb-4">
                            <label class="form-label">Password *</label>
                            <input name="password" type="password" class="form-control" required>
                        </div>

                    </div>

                    <!-- Footer -->
                    <div class="card-footer bg-light px-4 py-3 d-flex justify-content-end border-top">
                        <a href="{{ route('admin.users.index') }}" class="btn-admin-cancel">
                            Cancel
                        </a>
                        <button type="submit" class="btn-admin-primary">
                            Save User
                        </button>
                    </div>

                </div>
            </form>

        </div>
    </div>
</div>

@endsection
