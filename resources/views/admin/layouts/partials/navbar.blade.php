<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

<nav class="navbar topbar fixed-top d-flex justify-content-between align-items-center px-4 py-3">

    <div class="d-flex align-items-center gap-3">
        <div class="d-flex flex-column">
            <h5 class="mb-0 fw-bold text-navy">Dashboard</h5>
            <small class="text-muted">Welcome back, Admin</small>
        </div>
    </div>

    <div class="d-flex align-items-center gap-4">

        <!-- Notification -->
        <a href="#" class="position-relative text-decoration-none icon-btn">
            <i class="bi bi-bell" style="font-size: 1.5rem; color: #64748b;"></i>
            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger border border-white">
                3
            </span>
        </a>

        <!-- User Dropdown -->
        <div class="dropdown">
            <a class="user-pill d-flex align-items-center gap-3 text-decoration-none dropdown-toggle dropdown-toggle-custom"
               href="#"
               role="button"
               data-bs-toggle="dropdown"
               aria-expanded="false">

                <div class="text-end d-none d-md-block lh-1">
                    @auth('admin')
                        <span class="d-block fw-bold text-navy" style="font-size: 0.9rem;">
                            {{ auth('admin')->user()->name ?? 'Admin' }}
                        </span>
                        <small class="text-muted" style="font-size: 0.75rem;">
                            {{ auth('admin')->user()->email ?? '' }}
                        </small>
                    @else
                        <span class="d-block fw-bold text-navy" style="font-size: 0.9rem;">Guest</span>
                        <small class="text-muted" style="font-size: 0.75rem;">Not signed in</small>
                    @endauth
                </div>

                <div class="avatar-container">
                    @php $admin = auth('admin')->user(); @endphp
                    @if(isset($admin) && !empty($admin->profile_image))
                        <img src="{{ asset('storage/' . $admin->profile_image) }}"
                             class="avatar-img"
                             alt="{{ $admin->name }}">
                    @else
                        <img src="{{ asset('assets/images/logo.png') }}"
                             class="avatar-img"
                             alt="User">
                    @endif
                </div>
            </a>

            <!-- Dropdown Menu -->
            <ul class="dropdown-menu dropdown-menu-end custom-dropdown shadow-sm border-0 mt-3 p-2">

                <li>
                    <a class="dropdown-item rounded-2 mb-1"
                       href="{{ route('admin.settings') }}">
                        <i class="bi bi-gear me-2 text-secondary"></i>
                        Settings
                    </a>
                </li>

                <li>
                    <hr class="dropdown-divider my-2">
                </li>

                <li>
                    <form method="POST" action="{{ route('admin.logout') }}">
                        @csrf
                        <button type="submit"
                                class="dropdown-item rounded-2 text-danger logout-item"
                                style="border:0;background:none;">
                            <i class="bi bi-box-arrow-right me-2"></i>
                            Logout
                        </button>
                    </form>
                </li>

            </ul>
        </div>
    </div>
</nav>

<style>
    :root {
        --ks-navy: #1F2B5B;
        --ks-red: #E63946;
        --sidebar-width: 270px;
        --nav-height: 80px;
    }

    .topbar {
        background: rgba(255, 255, 255, 0.9);
        backdrop-filter: blur(10px);
        height: var(--nav-height);
        box-shadow: 0 4px 20px rgba(0,0,0,0.03);
        border-bottom: 1px solid rgba(0,0,0,0.05);
        margin-left: var(--sidebar-width);
        transition: margin-left 0.3s ease;
        z-index: 1030;
    }

    .text-navy { color: var(--ks-navy); }

    .icon-btn {
        width: 45px;
        height: 45px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 50%;
        transition: background 0.2s;
    }

    .icon-btn:hover { background: #f1f5f9; }

    .user-pill {
        padding: 6px 6px 6px 16px;
        background: #fff;
        border: 1px solid #e2e8f0;
        border-radius: 50px;
        transition: all 0.3s ease;
    }

    .user-pill:hover {
        background: #f8fafc;
        box-shadow: 0 4px 12px rgba(0,0,0,0.05);
    }

    .avatar-container {
        width: 42px;
        height: 42px;
        padding: 2px;
        background: #fff;
        border: 2px solid var(--ks-red);
        border-radius: 50%;
        overflow: hidden;
    }

    .avatar-img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        border-radius: 50%;
    }

    .dropdown-toggle-custom::after { display: none; }

    .custom-dropdown {
        border-radius: 12px;
        animation: slideDown 0.2s ease-out;
    }

    @keyframes slideDown {
        from { opacity: 0; transform: translateY(10px); }
        to { opacity: 1; transform: translateY(0); }
    }

    .dropdown-item {
        padding: 8px 16px;
        font-weight: 500;
        color: #64748b;
    }

    .dropdown-item:hover {
        background-color: #f1f5f9;
        color: var(--ks-navy);
    }

    .logout-item:hover {
        background-color: #fee2e2;
        color: var(--ks-red) !important;
    }
</style>
