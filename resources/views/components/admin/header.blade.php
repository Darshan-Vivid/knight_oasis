<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-layout="vertical" data-sidebar="dark"
    data-sidebar-size="lg" data-preloader="disable" data-theme="default" data-bs-theme="light" data-topbar="light">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $title }}</title>
    {{-- favicon icon --}}
    <link rel="shortcut icon" href="{{ getSetting("site_icon") }}">
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <link rel="stylesheet" href="{{ publicPath('admin/css/bootstrap.min.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ publicPath('admin/css/icons.min.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ publicPath('admin/css/app.min.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ publicPath('admin/css/custom.min.css') }}?version={{ rand(10,99) }}.{{ rand(10,99) }}.{{ rand(100,999) }}" type="text/css" />
    <link rel="stylesheet" href="{{ publicPath('assets/css/admin-style.css') }}?version={{ rand(10,99) }}.{{ rand(10,99) }}.{{ rand(100,999) }}" type="text/css" />
    <script src="{{ publicPath('admin/js/layout.js') }}"></script>
    <script src="{{ publicPath('admin/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ publicPath('admin/libs/simplebar/simplebar.min.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/tinymce@5/tinymce.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
</head>

<body>
    <header id="page-topbar" id="fontsLink">
        <div class="layout-width">
            <div class="navbar-header">
                <div class="d-flex">
                    <button type="button"
                        class="px-3 shadow-none btn btn-sm fs-16 header-item vertical-menu-btn topnav-hamburger"
                        id="topnav-hamburger-icon">
                        <span class="hamburger-icon">
                            <span></span>
                            <span></span>
                            <span></span>
                        </span>
                    </button>
                </div>
                <div class="d-flex align-items-center">
                    <div class="ms-1 header-item d-none d-sm-flex">
                        <button type="button" class="btn btn-icon btn-topbar btn-ghost-dark rounded-circle"
                            data-toggle="fullscreen">
                            <i class='bi bi-arrows-fullscreen fs-lg'></i>
                        </button>
                    </div>
                    <div class="dropdown topbar-head-dropdown ms-1 header-item">
                        <button type="button"
                            class="btn btn-icon btn-topbar btn-ghost-dark rounded-circle mode-layout"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="align-middle bi bi-sun fs-3xl"></i>
                        </button>
                        <div class="p-2 dropdown-menu dropdown-menu-end" id="light-dark-mode">
                            <a href="#!" class="dropdown-item" data-mode="light"><i
                                    class="align-middle bi bi-sun me-2"></i> Default (light mode)</a>
                            <a href="#!" class="dropdown-item" data-mode="dark"><i
                                    class="align-middle bi bi-moon me-2"></i> Dark</a>
                            <a href="#!" class="dropdown-item" data-mode="auto"><i
                                    class="align-middle bi bi-moon-stars me-2"></i> Auto (system default)</a>
                        </div>
                    </div>
                    <div class="dropdown ms-sm-3 header-item topbar-user">
                        <button type="button" class="shadow-none btn" id="page-header-user-dropdown"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="d-flex align-items-center">
                                <img class="rounded-circle header-profile-user"
                                    src="{{ publicPath('admin/images/users/32/avatar-1.jpg') }}" alt="Header Avatar">
                                <span class="text-start ms-xl-2">
                                    <span class="d-none d-xl-block ms-1 fs-sm user-name-sub-text">Admin</span>
                                </span>
                            </span>
                        </button>
                        <div class="dropdown-menu dropdown-menu-end">
                            <h6 class="dropdown-header">Welcome {{ auth()->user()->name }}!</h6>
                            <a class="dropdown-item" href="{{ route('view.home') }}">
                                <i class="align-middle ri-pages-line text-muted fs-lg me-1"></i> 
                                <span class="align-middle" data-key="t-logout">Home</span>
                            </a>
                            <a class="dropdown-item" href="{{ route('auth.logout') }}">
                                <i class="align-middle mdi mdi-logout text-muted fs-lg me-1"></i> 
                                <span class="align-middle" data-key="t-logout">Logout</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <x-admin.sidebar />
    <button class="btn btn-dark btn-icon" id="back-to-top">
        <i class="bi bi-caret-up fs-3xl"></i>
    </button>
    <div class="main-content">
        <div class="page-content">
