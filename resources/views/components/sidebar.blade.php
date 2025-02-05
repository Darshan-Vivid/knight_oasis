    <!-- ========== App Menu ========== -->
    <div class="app-menu navbar-menu">
        <!-- LOGO -->
        <div class="navbar-brand-box">
            <a href="index" class="logo logo-dark">
                <span class="logo-sm">
                    {{-- <img src="{{ URL::asset('build/images/logo-sm.png') }}" alt="" height="22"> --}}
                </span>
                <span class="logo-lg">
                    {{-- <img src="{{ URL::asset('build/images/logo-dark.png') }}" alt="" height="22"> --}}
                </span>
            </a>
            <a href="index" class="logo logo-light">
                <span class="logo-sm">
                    {{-- <img src="{{ URL::asset('build/images/logo-sm.png') }}" alt="" height="22"> --}}
                </span>
                <span class="logo-lg">
                    {{-- <img src="{{ URL::asset('build/images/logo-light.png') }}" alt="" height="22"> --}}
                </span>
            </a>
            <button type="button" class="btn btn-sm p-0 fs-3xl header-item float-end btn-vertical-sm-hover"
                id="vertical-hover">
                <i class="ri-record-circle-line"></i>
            </button>
        </div>
        <div id="scrollbar">
            <div class="container-fluid">

                <div id="two-column-menu">
                </div>
                <ul class="navbar-nav" id="navbar-nav">
                    <li class="menu-title"><span>Menu</span></li>
                    <li class="nav-item">
                        <a class="nav-link menu-link collapsed" href="#sidebarDashboards" data-bs-toggle="collapse"
                            role="button" aria-expanded="false" aria-controls="sidebarDashboards">
                            <i class="ph-gauge"></i> <span>Dashboard</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('blogs.index') }}" class="nav-link menu-link collapsed"
                            data-bs-toggle="collapse" role="button" aria-expanded="false"
                            aria-controls="sidebarEcommerce">
                            <i class="ph-storefront"></i> <span data-key="t-ecommerce">Blogs</span>
                        </a>
                    </li>
                </ul>
            </div>
            <!-- Sidebar -->
        </div>
        <div class="sidebar-background"></div>
    </div>
    <!-- Left Sidebar End -->
    <!-- Vertical Overlay-->
    <div class="vertical-overlay"></div>
