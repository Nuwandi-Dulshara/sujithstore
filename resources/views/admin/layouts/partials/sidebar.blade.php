<div class="sidebar d-flex flex-column">
    
    <div class="sidebar-header text-center p-3 flex-shrink-0">
        <a href="{{ route('admin.dashboard') }}" class="text-decoration-none brand-container">
            <div class="logo-wrapper">
                <img src="{{ asset('assets/images/logo.png') }}" alt="Sujith Stores" class="brand-logo">
            </div>
            <div class="brand-info mt-2">
                <h5 class="brand-name">Sujith Stores</h5>
                <small class="brand-subtitle">Admin Panel</small>
            </div>
        </a>
    </div>

    <nav class="sidebar-nav d-flex flex-column gap-2 px-3">
        
        <div class="nav-label">Overview</div>

        <a href="{{ route('admin.dashboard') }}" 
           class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
            <i class="bi bi-grid-1x2-fill"></i> 
            <span>Dashboard</span>
        </a>

        <div class="nav-label mt-3">Store Management</div>

        <a href="{{ route('admin.categories.index') }}" 
           class="nav-link {{ request()->routeIs('admin.categories.*') ? 'active' : '' }}">
            <i class="bi bi-tags-fill"></i> 
            <span>Categories</span>
        </a>

        <a href="{{ route('admin.products.index') }}" 
           class="nav-link {{ request()->routeIs('admin.products.*') ? 'active' : '' }}">
            <i class="bi bi-box-seam-fill"></i> 
            <span>Products</span>
        </a>

          <a href="{{ route('admin.users.index') }}" 
              class="nav-link {{ request()->routeIs('admin.users.*') ? 'active' : '' }}">
            <i class="bi bi-people-fill"></i> 
            <span>Customers</span>
        </a>

        <div class="nav-label mt-3">Configuration</div>

        <a href="{{ route('admin.settings') }}" 
           class="nav-link {{ request()->routeIs('admin.settings') ? 'active' : '' }}">
            <i class="bi bi-sliders"></i> 
            <span>Settings</span>
        </a>

        <div style="min-height: 20px;"></div>
    </nav>

    <div class="sidebar-footer p-3 mx-3 mb-3 rounded-3 d-flex align-items-center gap-3 flex-shrink-0">
        <div class="footer-icon">
            <i class="bi bi-shield-check"></i>
        </div>
        <div class="lh-1">
            <small class="d-block text-white-50" style="font-size: 0.7rem;">Powered by</small>
            <span class="text-white fw-bold" style="font-size: 0.85rem;">AitSoft</span>
        </div>
    </div>
</div>

<style>
    /* --- VARIABLES --- */
    :root {
        --ks-navy: #1F2B5B;
        --ks-navy-light: #2a3a75;
        --ks-red: #E63946;
        --ks-white: #ffffff;
        --sidebar-width: 270px;
    }

    /* --- SIDEBAR CONTAINER --- */
    .sidebar {
        width: var(--sidebar-width);
        height: 100vh; /* Takes full viewport height */
        position: fixed;
        top: 0;
        left: 0;
        z-index: 1040;
        background: linear-gradient(170deg, var(--ks-navy) 0%, var(--ks-navy-light) 100%);
        color: var(--ks-white);
        box-shadow: 5px 0 25px rgba(31, 43, 91, 0.15);
        border-right: 1px solid rgba(255,255,255,0.05);
        
        /* Flex Logic */
        display: flex;
        flex-direction: column;
        overflow: hidden; /* Prevents outer scrollbars */
    }

    /* --- SCROLLING AREA --- */
    .sidebar-nav {
        flex-grow: 1;    /* Fills available space */
        min-height: 0;   /* CRITICAL: Allows flex child to shrink & scroll */
        overflow-y: auto; /* Enables vertical scrolling */
        overflow-x: hidden;
        padding-bottom: 10px;
    }

    /* Scrollbar Styling */
    .sidebar-nav::-webkit-scrollbar { width: 4px; }
    .sidebar-nav::-webkit-scrollbar-track { background: transparent; }
    .sidebar-nav::-webkit-scrollbar-thumb { background: rgba(255, 255, 255, 0.2); border-radius: 10px; }
    .sidebar-nav::-webkit-scrollbar-thumb:hover { background: rgba(255, 255, 255, 0.4); }

    /* --- BRANDING --- */
    .logo-wrapper {
        width: 70px; height: 70px; margin: 0 auto;
        background: rgba(255,255,255,0.1); border-radius: 50%; padding: 5px;
        box-shadow: 0 0 15px rgba(230, 57, 70, 0.3);
        transition: transform 0.3s ease;
    }
    .brand-container:hover .logo-wrapper { transform: scale(1.05) rotate(-3deg); }
    .brand-logo { width: 100%; height: 100%; object-fit: contain; border-radius: 50%; }
    .brand-name { font-weight: 700; color: var(--ks-white); margin-bottom: 0; }
    .brand-subtitle { color: rgba(255,255,255,0.5); text-transform: uppercase; font-size: 0.7rem; letter-spacing: 2px; }

    /* --- LINKS --- */
    .nav-label {
        color: var(--ks-red); font-size: 0.7rem; text-transform: uppercase;
        font-weight: 800; letter-spacing: 1px; padding-left: 15px; margin-bottom: 5px; opacity: 0.9;
    }
    .nav-link {
        color: rgba(255, 255, 255, 0.75); padding: 12px 18px; border-radius: 12px;
        transition: all 0.3s; font-weight: 500; display: flex; align-items: center; gap: 12px;
        border-left: 3px solid transparent; flex-shrink: 0; /* Prevents links from squishing */
    }
    .nav-link i { font-size: 1.1rem; transition: 0.3s; color: rgba(255,255,255,0.6); }
    
    .nav-link:hover { background: rgba(255, 255, 255, 0.05); color: var(--ks-white); transform: translateX(3px); }
    .nav-link:hover i { color: var(--ks-red); }
    
    .nav-link.active {
        background: rgba(230, 57, 70, 0.1); color: var(--ks-white); font-weight: 600;
        border-left: 3px solid var(--ks-red);
    }
    .nav-link.active i { color: var(--ks-red); filter: drop-shadow(0 0 5px rgba(230, 57, 70, 0.5)); }

    /* --- FOOTER --- */
    .sidebar-footer { background: rgba(0,0,0,0.2); }
    .footer-icon {
        width: 32px; height: 32px; background: var(--ks-red); border-radius: 8px;
        display: flex; align-items: center; justify-content: center; color: white;
    }
</style>