    <!-- ========== App Menu ========== -->
    <div class="app-menu navbar-menu">
        <!-- LOGO -->
        <div class="navbar-brand-box">
            <a href="index" class="logo logo-dark">
                <span class="logo-sm">
                    <img src="{{ URL::asset('admin/images/logo-sm.png') }}" alt="" height="22">
                </span>
                <span class="logo-lg">
                    <img src="{{ URL::asset('admin/images/logo-dark.png') }}" alt="" height="22">
                </span>
            </a>
            <a href="index" class="logo logo-light">
                <span class="logo-sm">
                    <img src="{{ URL::asset('admin/images/logo-sm.png') }}" alt="" height="22">
                </span>
                <span class="logo-lg">
                    <img src="{{ URL::asset('admin/images/admin.png') }}" alt="" height="100">
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
                    <li class="menu-title"><span>Admin Panel</span></li>
                    <li class="nav-item">
                        <a href="#sidebarEcommerce" class="nav-link menu-link collapsed" data-bs-toggle="collapse"
                            role="button" aria-expanded="false" aria-controls="sidebarEcommerce">
                            <i class="ph-storefront"></i> <span data-key="t-ecommerce">Blogs</span>
                        </a>
                        <div class="collapse menu-dropdown" id="sidebarEcommerce">
                            <ul class="nav nav-sm flex-column">
                                {{-- <li class="nav-item">
                                    <a href="{{ route('blogs.create') }}" class="nav-link"
                                        data-key="t-products">Add Blogs</a>
                                </li> --}}
                                <li class="nav-item">
                                    <a href="{{ route('blogs.index') }}" class="nav-link"
                                        data-key="t-products-grid">Manage Blogs</a>
                                </li>
                            </ul>
                        </div>
                    </li>

                    <li class="nav-item">
                        <a href="#sidebarInvoices" class="nav-link menu-link" data-bs-toggle="collapse"
                            role="button" aria-expanded="false" aria-controls="sidebarInvoices">
                            <i class="ph-file-text"></i> <span data-key="t-invoices">Media</span>
                        </a>
                        <div class="collapse menu-dropdown" id="sidebarInvoices">
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a href="{{ route('media.index') }}" class="nav-link"
                                        data-key="t-list-view">Manage Media</a>
                                </li>
                                {{-- <li class="nav-item">
                                    <a href="{{ route('media.create') }}" class="nav-link"
                                        data-key="t-list-view">Add Media</a>
                                </li> --}}
                            </ul>
                        </div>
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
