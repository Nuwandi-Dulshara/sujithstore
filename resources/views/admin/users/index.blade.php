@extends('admin.layouts.app')
@section('title','Users')

@section('content')

<style>
:root {
    --navy: #1F2B5B;
    --navy-light: #2e3c7a;
    --danger: #e63946;
    --soft-bg: #f4f6fb;
}

.user-page {
    margin-top: 90px;
    padding: 30px;
    background: linear-gradient(135deg, #eef1f8, #f9fbff);
    border-radius: 18px;
}

.page-header {
    background: linear-gradient(135deg, var(--navy), var(--navy-light));
    color: #fff;
    border-radius: 16px;
    padding: 22px 26px;
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.table-card {
    background: #fff;
    margin-top: 30px;
    border-radius: 16px;
    box-shadow: 0 15px 40px rgba(0,0,0,.08);
    overflow: hidden;
}

.user-avatar {
    width: 48px;
    height: 48px;
    border-radius: 50%;
    background: #f1f3fa;
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: 600;
    color: var(--navy);
}
</style>

<div class="user-page">

    <!-- Header -->
    <div class="page-header">
        <h4>Users</h4>
        <a href="{{ route('admin.users.create') }}" class="btn btn-light">
            + Add User
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success mt-4">
            {{ session('success') }}
        </div>
    @endif

    <!-- Table -->
    <div class="table-card">
        <table class="table mb-0 align-middle">
            <thead>
                <tr>
                    <th>#</th>
                    <th>User</th>
                    <th>Email</th>
                    <th width="180">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($users as $user)
                <tr>
                    <td>{{ $loop->iteration }}</td>

                    <td class="d-flex align-items-center gap-3">
                        <div class="user-avatar">
                            {{ strtoupper(substr($user->name,0,1)) }}
                        </div>
                        <span>{{ $user->name }}</span>
                    </td>

                    <td>{{ $user->email }}</td>

                    <td class="d-flex gap-2">
                        <a href="{{ route('admin.users.edit',$user) }}"
                           class="btn btn-sm btn-outline-primary">
                            Edit
                        </a>

                        <form action="{{ route('admin.users.destroy',$user) }}"
                              method="POST"
                              onsubmit="return confirm('Delete user?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-outline-danger">
                                Delete
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="text-center py-5 text-muted">
                        No users found
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

</div>

@endsection
