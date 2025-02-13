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
            <button type="button" class="p-0 btn btn-sm fs-3xl header-item float-end btn-vertical-sm-hover"
                id="vertical-hover">
                <i class="ri-record-circle-line"></i>
            </button>
        </div>

        <!-- ITEMS -->
        <div id="scrollbar">
            <div class="container-fluid">

                <div id="two-column-menu">
                </div>
                <ul class="navbar-nav" id="navbar-nav">
                    <li class="menu-title"><span>Admin Panel</span></li>

                    <!-- DASHBOARD -->
                    <li class="nav-item">
                        <a href="{{ route('view.admin.dashboard') }}/" class="nav-link menu-link collapsed" >
                            <i class="ri-home-line"></i><span>Dashboard</span>
                        </a>
                    </li>

                    <!-- BLOGS -->
                    <li class="nav-item">
                        <a href="#sidebarBlogs" class="nav-link menu-link collapsed" data-bs-toggle="collapse"
                            role="button" aria-expanded="false" aria-controls="sidebarBlogs">
                            <i class="ph-storefront"></i><span>Blogs</span>
                        </a>
                        <div class="collapse menu-dropdown" id="sidebarBlogs">
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a href="{{ route('blogs.create') }}" class="nav-link"
                                        data-key="t-products">Add Blogs</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('blogs.index') }}" class="nav-link"
                                        data-key="t-products-grid">Manage Blogs</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('blogs_categories.create') }}" class="nav-link"
                                        data-key="t-products-grid">Add Blogs Categories</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('blogs_categories.index') }}" class="nav-link"
                                        data-key="t-products-grid">Manage Blogs Categories</a>
                                </li>
                            </ul>
                        </div>
                    </li>

                    <!-- MEDIA -->
                    <li class="nav-item">
                        <a href="#sidebarMedia" class="nav-link menu-link" data-bs-toggle="collapse"
                            role="button" aria-expanded="false" aria-controls="sidebarMedia">
                            <i class="ph-file-text"></i><span>Media</span>
                        </a>
                        <div class="collapse menu-dropdown" id="sidebarMedia">
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a href="{{ route('media.index') }}" class="nav-link"
                                        data-key="t-list-view">Manage Media</a>
                                </li>
                                <!-- <li class="nav-item">
                                    <a href="{{ route('media.create') }}" class="nav-link"
                                        data-key="t-list-view">Add Media</a>
                                </li> -->
                            </ul>
                        </div>
                    </li>

                    <!-- SETTINGS -->
                    <li class="nav-item">
                        <a href="#sidebarSettings" class="nav-link menu-link" data-bs-toggle="collapse"
                            role="button" aria-expanded="false" aria-controls="sidebarSettings">
                            <i class="ph-gear"></i> <span>Settings</span>
                        </a>
                        <div class="collapse menu-dropdown" id="sidebarSettings">
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a href="{{ route('view.settings') }}" class="nav-link">Manage site settings</a>
                                </li>
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
