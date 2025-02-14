    <div class="app-menu navbar-menu">
        <!-- LOGO -->
        <div class="navbar-brand-box">
            <a href="index" class="logo logo-light">
                <span class="logo-lg">
                    <img class="mt-3"  src="{{ getSetting("site_logo") }}" alt="" height="80">
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
                                        data-key="t-products-grid">All Blogs</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('blog_categories.index') }}" class="nav-link"
                                        data-key="t-products-grid">Categories</a>
                                </li>
                            </ul>
                        </div>
                    </li>

                    <!-- MEDIA -->
                    {{-- <li class="nav-item">
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
                    </li> --}}

                    <!-- SETTINGS -->
                    <li class="nav-item">
                        <a href="{{ route('view.settings') }}/" class="nav-link menu-link collapsed" >
                            <i class="ri-home-line"></i><span>Settings</span>
                        </a>
                    </li>

                    <!-- SETTINGS -->
                    <li class="nav-item">
                        <a href="{{ route('view.users') }}/" class="nav-link menu-link collapsed" >
                            <i class="ph-user-circle"></i><span>Users</span>
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
