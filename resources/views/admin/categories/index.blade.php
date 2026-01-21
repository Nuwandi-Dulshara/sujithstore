@extends('admin.layouts.app')
@section('title','Categories')

@section('content')

<style>
/* ===== Brand Colors ===== */
:root {
    --navy: #1F2B5B;
    --navy-light: #2e3c7a;
    --danger: #e63946;
    --soft-bg: #f4f6fb;
}

/* ===== Page Wrapper ===== */
.category-page {
    margin-top: 90px;
    padding: 30px;
    background: linear-gradient(135deg, #eef1f8, #f9fbff);
    border-radius: 18px;
    animation: fadeIn .6s ease-in-out;
}

/* ===== Header Card ===== */
.page-header {
    background: linear-gradient(135deg, var(--navy), var(--navy-light));
    color: #fff;
    border-radius: 16px;
    padding: 22px 26px;
    display: flex;
    align-items: center;
    justify-content: space-between;
    box-shadow: 0 12px 30px rgba(31,43,91,.25);
}

.page-header h4 {
    margin: 0;
    font-weight: 600;
}

.page-header .logo {
    display: flex;
    align-items: center;
    gap: 12px;
}

.page-header img {
    width: 42px;
    height: 42px;
    border-radius: 10px;
    background: #fff;
    padding: 5px;
}

/* ===== Buttons ===== */
.btn-brand {
    background: #fff;
    color: var(--navy);
    border-radius: 30px;
    padding: 8px 20px;
    font-weight: 500;
    transition: all .3s ease;
}

.btn-brand:hover {
    background: #e8ebf6;
}

.btn-icon {
    border-radius: 10px;
    padding: 6px 10px;
}

/* ===== Table ===== */
.table-card {
    background: #fff;
    margin-top: 30px;
    border-radius: 16px;
    box-shadow: 0 15px 40px rgba(0,0,0,.08);
    overflow: hidden;
}

.table thead {
    background: #f1f3fa;
}

.table thead th {
    border: none;
    font-weight: 600;
    color: var(--navy);
    padding: 16px;
}

.table tbody td {
    padding: 16px;
    vertical-align: middle;
}

.table tbody tr:hover {
    background: #f8f9ff;
}

/* ===== Status ===== */
.status-pill {
    padding: 6px 14px;
    border-radius: 20px;
    font-size: 12px;
    font-weight: 600;
}

.status-active {
    background: #e6f4ea;
    color: #198754;
}

.status-inactive {
    background: #f1f1f1;
    color: #6c757d;
}

/* ===== Animation ===== */
@keyframes fadeIn {
    from { opacity: 0; transform: translateY(15px); }
    to { opacity: 1; transform: translateY(0); }
}
</style>

<div class="category-page">

    <!-- ===== Header ===== -->
    <div class="page-header">
        <div class="logo">
            <!-- Replace with your real logo -->
            <img src="{{ asset('assets/images/logo.png') }}" alt="Logo">
            <div>
                <h4>Categories</h4>
                <small class="opacity-75">Manage all product categories</small>
            </div>
        </div>

        <a href="{{ route('admin.categories.create') }}" class="btn btn-brand shadow-sm">
            + Add Category
        </a>
    </div>

    <!-- ===== Table ===== -->
    <div class="table-card">
        <table class="table mb-0">
            <thead>
                <tr>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Slug</th>
                    <th>Description</th>
                    <th>Status</th>
                    <th width="180">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($categories as $category)
                <tr>
                    <td style="width:72px;">
                        @if($category->image)
                            <img src="{{ asset('storage/'.$category->image) }}" alt="{{ $category->name }}" 
                                 style="width:56px;height:56px;object-fit:cover;border-radius:8px;border:1px solid #e9ecef;">
                        @else
                            <div style="width:56px;height:56px;border-radius:8px;background:#f1f3fa;display:flex;align-items:center;justify-content:center;color:#6c757d;font-weight:600;">
                                {{ strtoupper(substr($category->name,0,1)) }}
                            </div>
                        @endif
                    </td>
                    <td class="fw-semibold">{{ $category->name }}</td>
                    <td class="text-muted">{{ $category->slug }}</td>
                    <td class="text-muted">{{ \Illuminate\Support\Str::limit($category->description ?? '', 80) }}</td>
                    <td>
                        <span class="status-pill {{ $category->status === 'active' ? 'status-active' : 'status-inactive' }}">
                            {{ ucfirst($category->status) }}
                        </span>
                    </td>
                    <td>
                        <div class="d-flex gap-2">
                            <a href="{{ route('admin.categories.edit',$category) }}" class="btn btn-sm btn-outline-primary btn-icon">Edit</a>

                            <form action="{{ route('admin.categories.destroy',$category) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this category?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-danger btn-icon">Delete</button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="text-center text-muted py-5">No categories found</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

</div>

@endsection
