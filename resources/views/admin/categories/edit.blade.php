@extends('admin.layouts.app')
@section('title', 'Edit Category')

@section('content')

<style>
    :root {
        --primary-navy: #1e293b;
        --primary-hover: #334155;
        --accent-blue: #3b82f6;
        --border-color: #e2e8f0;
        --bg-input: #f8fafc;
        --text-muted: #64748b;
        --danger: #ef4444;
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
        <div class="col-lg-10 col-xl-8">

            <form action="{{ route('admin.categories.update', $category) }}"
                  method="POST"
                  enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="admin-card">

                    <!-- Header -->
                    <div class="admin-card-header">
                        <h5>Edit Category</h5>
                        <a href="{{ route('admin.categories.index') }}"
                           class="btn-sm text-decoration-none text-muted">
                            &larr; Back to list
                        </a>
                    </div>

                    <!-- Body -->
                    <div class="admin-card-body">
                        {{-- KEEP FORM EXACTLY AS IS --}}
                        @include('admin.categories._form')
                    </div>

                    <!-- Footer -->
                    <div class="card-footer bg-light px-4 py-3 d-flex justify-content-end border-top">
                        <a href="{{ route('admin.categories.index') }}" class="btn-admin-cancel">
                            Cancel
                        </a>
                        <button type="submit" class="btn-admin-primary">
                            Update Category
                        </button>
                    </div>

                </div>
            </form>

        </div>
    </div>
</div>

@endsection
