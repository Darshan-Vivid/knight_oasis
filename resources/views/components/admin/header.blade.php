<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-layout="vertical" data-sidebar="dark"
    data-sidebar-size="lg" data-preloader="disable" data-theme="default" data-bs-theme="light" data-topbar="light">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
    <title>{{ $title }}</title>
    {{-- favicon icon --}}
    <link rel="shortcut icon" href="{{ getSetting("site_logo") }}">
    {{-- favicon icon end --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link id="fontsLink" href="https://fonts.googleapis.com/admin2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
    <script src="{{ URL::asset('admin/js/layout.js') }}"></script>
    <link rel="stylesheet" href="{{ URL::asset('admin/css/bootstrap.min.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ URL::asset('admin/css/icons.min.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ URL::asset('admin/css/app.min.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ URL::asset('admin/css/custom.min.css') }}" type="text/css" />
    <script src="{{ URL::asset('admin/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ URL::asset('admin/libs/simplebar/simplebar.min.js') }}"></script>
    <script src="{{ URL::asset('admin/js/plugins.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/tinymce@5/tinymce.min.js"></script>
</head>

<body>
    <header id="page-topbar">
        <div class="layout-width">
            <div class="navbar-header">
                <div class="d-flex">
                    <div class="navbar-brand-box horizontal-logo">
                        <a href="index" class="logo logo-dark">
                            <span class="logo-sm">
                                <img src="{{ URL::asset('admin/images/logo-sm.png') }}" alt="" height="22">
                            </span>
                            <span class="logo-lg">
                                <img src="{{ URL::asset('admin/images/logo-dark.png') }}" alt=""
                                    height="22">
                            </span>
                        </a>
                        <a href="index" class="logo logo-light">
                            <span class="logo-sm">
                                <img src="{{ URL::asset('admin/images/logo-sm.png') }}" alt="" height="22">
                            </span>
                            <span class="logo-lg">
                                <img src="{{ URL::asset('admin/images/logo-light.png') }}" alt=""
                                    height="22">
                            </span>
                        </a>
                    </div>
                    <button type="button"
                        class="px-3 shadow-none btn btn-sm fs-16 header-item vertical-menu-btn topnav-hamburger"
                        id="topnav-hamburger-icon">
                        <span class="hamburger-icon">
                            <span></span>
                            <span></span>
                            <span></span>
                        </span>
                    </button>
                    <form class="app-search d-none d-md-inline-flex">
                        {{-- <div class="position-relative">
                            <input type="text" class="form-control" placeholder="Search..." autocomplete="off"
                                id="search-options" value="">
                            <span class="mdi mdi-magnify search-widget-icon"></span>
                            <span class="mdi mdi-close-circle search-widget-icon search-widget-icon-close d-none"
                                id="search-close-options"></span>
                        </div> --}}
                        <div class="dropdown-menu dropdown-menu-lg" id="search-dropdown">
                            <div data-simplebar style="max-height: 320px;">
                                <div class="dropdown-header">
                                    <h6 class="mb-0 text-overflow text-muted text-uppercase">Recent Searches</h6>
                                </div>
                                <div class="bg-transparent dropdown-item text-wrap">
                                    <a href="index" class="btn btn-subtle-secondary btn-sm btn-rounded">how to setup
                                        <i class="mdi mdi-magnify ms-1"></i></a>
                                    <a href="index" class="btn btn-subtle-secondary btn-sm btn-rounded">buttons <i
                                            class="mdi mdi-magnify ms-1"></i></a>
                                </div>
                                <div class="mt-2 dropdown-header">
                                    <h6 class="mb-1 text-overflow text-muted text-uppercase">Pages</h6>
                                </div>
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <i class="align-middle ri-bubble-chart-line fs-18 text-muted me-2"></i>
                                    <span>Analytics Dashboard</span>
                                </a>
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <i class="align-middle ri-lifebuoy-line fs-18 text-muted me-2"></i>
                                    <span>Help Center</span>
                                </a>
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <i class="align-middle ri-user-settings-line fs-18 text-muted me-2"></i>
                                    <span>My account settings</span>
                                </a>
                                <div class="mt-2 dropdown-header">
                                    <h6 class="mb-2 text-overflow text-muted text-uppercase">Members</h6>
                                </div>
                                <div class="notification-list">
                                    <a href="javascript:void(0);" class="py-2 dropdown-item notify-item">
                                        <div class="d-flex">
                                            <img src="{{ URL::asset('admin/images/users/avatar-2.jpg') }}"
                                                class="me-3 rounded-circle avatar-xs" alt="user-pic">
                                            <div class="flex-1">
                                                <h6 class="m-0">Angela Bernier</h6>
                                                <span class="mb-0 fs-2xs text-muted">Manager</span>
                                            </div>
                                        </div>
                                    </a>
                                    <a href="javascript:void(0);" class="py-2 dropdown-item notify-item">
                                        <div class="d-flex">
                                            <img src="{{ URL::asset('admin/images/users/avatar-3.jpg') }}"
                                                class="me-3 rounded-circle avatar-xs" alt="user-pic">
                                            <div class="flex-1">
                                                <h6 class="m-0">David Grasso</h6>
                                                <span class="mb-0 fs-2xs text-muted">Web Designer</span>
                                            </div>
                                        </div>
                                    </a>
                                    <a href="javascript:void(0);" class="py-2 dropdown-item notify-item">
                                        <div class="d-flex">
                                            <img src="{{ URL::asset('admin/images/users/avatar-5.jpg') }}"
                                                class="me-3 rounded-circle avatar-xs" alt="user-pic">
                                            <div class="flex-1">
                                                <h6 class="m-0">Mike Bunch</h6>
                                                <span class="mb-0 fs-2xs text-muted">React Developer</span>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="pt-3 pb-1 text-center">
                                <a href="#" class="btn btn-primary btn-sm">View All Results <i
                                        class="ri-arrow-right-line ms-1"></i></a>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="d-flex align-items-center">
                    <div class="dropdown topbar-head-dropdown ms-1 header-item">
                        {{-- <button type="button" class="btn btn-icon btn-topbar btn-ghost-dark rounded-circle"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class='bi bi-grid fs-2xl'></i>
                        </button> --}}
                        <div class="p-0 dropdown-menu dropdown-menu-lg dropdown-menu-end">
                            <div class="p-3 border border-dashed border-top-0 border-start-0 border-end-0">
                                <div class="row align-items-center">
                                    <div class="col">
                                        <h6 class="m-0 fw-semibold fs-base"> Browse by Apps </h6>
                                    </div>
                                    <div class="col-auto">
                                        <a href="#!" class="btn btn-sm btn-subtle-info"> View All Apps
                                            <i class="align-middle ri-arrow-right-s-line"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="p-2">
                                <div class="row g-0">
                                    <div class="col">
                                        <a class="dropdown-icon-item" href="#!">
                                            <img src="{{ URL::asset('admin/images/brands/github.png') }}"
                                                alt="Github">
                                            <span>GitHub</span>
                                        </a>
                                    </div>
                                    <div class="col">
                                        <a class="dropdown-icon-item" href="#!">
                                            <img src="{{ URL::asset('admin/images/brands/bitbucket.png') }}"
                                                alt="bitbucket">
                                            <span>Bitbucket</span>
                                        </a>
                                    </div>
                                    <div class="col">
                                        <a class="dropdown-icon-item" href="#!">
                                            <img src="{{ URL::asset('admin/images/brands/dribbble.png') }}"
                                                alt="dribbble">
                                            <span>Dribbble</span>
                                        </a>
                                    </div>
                                </div>
                                <div class="row g-0">
                                    <div class="col">
                                        <a class="dropdown-icon-item" href="#!">
                                            <img src="{{ URL::asset('admin/images/brands/dropbox.png') }}"
                                                alt="dropbox">
                                            <span>Dropbox</span>
                                        </a>
                                    </div>
                                    <div class="col">
                                        <a class="dropdown-icon-item" href="#!">
                                            <img src="{{ URL::asset('admin/images/brands/mail_chimp.png') }}"
                                                alt="mail_chimp">
                                            <span>Mail Chimp</span>
                                        </a>
                                    </div>
                                    <div class="col">
                                        <a class="dropdown-icon-item" href="#!">
                                            <img src="{{ URL::asset('admin/images/brands/slack.png') }}"
                                                alt="slack">
                                            <span>Slack</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="dropdown ms-1 topbar-head-dropdown header-item">
                        {{-- <button type="button" class="btn btn-icon btn-topbar btn-ghost-secondary rounded-circle"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            @switch(Session::get('lang'))
                                @case('ru')
                                    <img src="{{ URL::asset('admin/images/flags/russia.svg') }}" class="rounded"
                                        alt="Header Language" height="20">
                                @break

                                @case('it')
                                    <img src="{{ URL::asset('admin/images/flags/italy.svg') }}" class="rounded"
                                        alt="Header Language" height="20">
                                @break

                                @case('sp')
                                    <img src="{{ URL::asset('admin/images/flags/spain.svg') }}" class="rounded"
                                        alt="Header Language" height="20">
                                @break

                                @case('ch')
                                    <img src="{{ URL::asset('admin/images/flags/china.svg') }}" class="rounded"
                                        alt="Header Language" height="20">
                                @break

                                @case('fr')
                                    <img src="{{ URL::asset('admin/images/flags/french.svg') }}" class="rounded"
                                        alt="Header Language" height="20">
                                @break

                                @case('gr')
                                    <img src="{{ URL::asset('admin/images/flags/germany.svg') }}" class="rounded"
                                        alt="Header Language" height="20">
                                @break

                                @case('ae')
                                    <img src="{{ URL::asset('admin/images/flags/ae.svg') }}" class="rounded"
                                        alt="Header Language" height="20">
                                @break

                                @default
                                    <img src="{{ URL::asset('admin/images/flags/us.svg') }}" class="rounded"
                                        alt="Header Language" height="20">
                            @endswitch
                        </button> --}}
                        <div class="dropdown-menu dropdown-menu-end">
                            <a href="{{ url('index/en') }}" class="py-2 dropdown-item notify-item language"
                                data-lang="en" title="English">
                                <img src="{{ URL::asset('admin/images/flags/us.svg') }}" alt="user-image"
                                    class="rounded me-2" height="20">
                                <span class="align-middle">English</span>
                            </a>
                            <a href="{{ url('index/sp') }}" class="dropdown-item notify-item language"
                                data-lang="sp" title="Spanish">
                                <img src="{{ URL::asset('admin/images/flags/spain.svg') }}" alt="user-image"
                                    class="rounded me-2" height="20">
                                <span class="align-middle">Española</span>
                            </a>
                            <a href="{{ url('index/gr') }}" class="dropdown-item notify-item language"
                                data-lang="gr" title="German">
                                <img src="{{ URL::asset('admin/images/flags/germany.svg') }}" alt="user-image"
                                    class="rounded me-2" height="20"> <span class="align-middle">Deutsche</span>
                            </a>
                            <a href="{{ url('index/it') }}" class="dropdown-item notify-item language"
                                data-lang="it" title="Italian">
                                <img src="{{ URL::asset('admin/images/flags/italy.svg') }}" alt="user-image"
                                    class="rounded me-2" height="20">
                                <span class="align-middle">Italiana</span>
                            </a>
                            <a href="{{ url('index/ru') }}" class="dropdown-item notify-item language"
                                data-lang="ru" title="Russian">
                                <img src="{{ URL::asset('admin/images/flags/russia.svg') }}" alt="user-image"
                                    class="rounded me-2" height="20">
                                <span class="align-middle">русский</span>
                            </a>
                            <a href="{{ url('index/ch') }}" class="dropdown-item notify-item language"
                                data-lang="ch" title="Chinese">
                                <img src="{{ URL::asset('admin/images/flags/china.svg') }}" alt="user-image"
                                    class="rounded me-2" height="20">
                                <span class="align-middle">中国人</span>
                            </a>
                            <a href="{{ url('index/fr') }}" class="dropdown-item notify-item language"
                                data-lang="fr" title="French">
                                <img src="{{ URL::asset('admin/images/flags/french.svg') }}" alt="user-image"
                                    class="rounded me-2" height="20">
                                <span class="align-middle">français</span>
                            </a>
                            <a href="{{ url('index/ae') }}" class="dropdown-item notify-item language"
                                data-lang="ae" title="Arabic">
                                <img src="{{ URL::asset('admin/images/flags/ae.svg') }}" alt="user-image"
                                    class="rounded me-2" height="18">
                                <span class="align-middle">عربي</span>
                            </a>
                        </div>
                    </div>
                    <div class="dropdown topbar-head-dropdown ms-1 header-item">
                        {{-- <button type="button" class="btn btn-icon btn-topbar btn-ghost-dark rounded-circle"
                            id="page-header-cart-dropdown" data-bs-toggle="dropdown" data-bs-auto-close="outside"
                            aria-haspopup="true" aria-expanded="false">
                            <i class='bi bi-bag fs-2xl'></i>
                            <span
                                class="position-absolute topbar-badge cartitem-badge fs-3xs translate-middle badge rounded-pill bg-info">5</span>
                        </button> --}}
                        <div class="p-0 dropdown-menu dropdown-menu-xl dropdown-menu-end product-list"
                            aria-labelledby="page-header-cart-dropdown">
                            <div class="p-3 border-bottom">
                                <div class="row align-items-center">
                                    <div class="col">
                                        <h6 class="m-0 fs-lg fw-semibold"> My Cart <span
                                                class="badge bg-secondary fs-sm cartitem-badge ms-1">7</span></h6>
                                    </div>
                                    <div class="col-auto">
                                        <a href="#!">View All</a>
                                    </div>
                                </div>
                            </div>
                            <div data-simplebar style="max-height: 300px;">
                                <div class="p-3">
                                    <div class="text-center empty-cart" id="empty-cart">
                                        <div class="mx-auto my-3 avatar-md">
                                            <div class="avatar-title bg-info-subtle text-info fs-2 rounded-circle">
                                                <i class='bx bx-cart'></i>
                                            </div>
                                        </div>
                                        <h5 class="mb-3">Your Cart is Empty!</h5>
                                        <a href="#!" class="mb-3 btn btn-success w-md">Shop Now</a>
                                    </div>
                                    <div class="p-2 d-block dropdown-item product text-wrap">
                                        <div class="d-flex">
                                            <div class="flex-shrink-0 avatar-sm me-3">
                                                <div class="rounded avatar-title bg-light">
                                                    <img src="{{ URL::asset('admin/images/products/32/img-1.png') }}"
                                                        class="avatar-xs" alt="user-pic">
                                                </div>
                                            </div>
                                            <div class="flex-grow-1">
                                                <p class="mb-1 fs-sm text-muted">Fashion</p>
                                                <h6 class="mt-0 mb-3 fs-md">
                                                    <a href="#!" class="text-reset">Blive Printed Men Round
                                                        Neck</a>
                                                </h6>
                                                <div class="text-muted fw-medium d-none">$<span
                                                        class="product-price">327.49</span></div>
                                                <div class="input-step">
                                                    <button type="button" class="minus">–</button>
                                                    <input type="number" class="product-quantity" value="2"
                                                        min="0" max="100" readonly>
                                                    <button type="button" class="plus">+</button>
                                                </div>
                                            </div>
                                            <div
                                                class="ps-2 d-flex flex-column justify-content-between align-items-end">
                                                <button type="button"
                                                    class="btn btn-icon btn-sm btn-ghost-primary remove-cart-btn"
                                                    data-bs-toggle="modal" data-bs-target="#removeCartModal"><i
                                                        class="ri-close-fill fs-lg"></i></button>
                                                <h5 class="mb-0">$ <span class="product-line-price">654.98</span>
                                                </h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="p-2 d-block dropdown-item product text-wrap">
                                        <div class="d-flex">
                                            <div class="flex-shrink-0 avatar-sm me-3">
                                                <div class="rounded avatar-title bg-light">
                                                    <img src="{{ URL::asset('admin/images/products/img-5.png') }}"
                                                        class="avatar-xs" alt="user-pic">
                                                </div>
                                            </div>
                                            <div class="flex-grow-1">
                                                <p class="mb-1 fs-sm text-muted">Sportwear</p>
                                                <h6 class="mt-0 mb-3 fs-md">
                                                    <a href="#!" class="text-reset">Willage Volleyball Ball</a>
                                                </h6>
                                                <div class="text-muted fw-medium d-none">$<span
                                                        class="product-price">49.06</span></div>
                                                <div class="input-step">
                                                    <button type="button" class="minus">–</button>
                                                    <input type="number" class="product-quantity" value="3"
                                                        min="0" max="100" readonly>
                                                    <button type="button" class="plus">+</button>
                                                </div>
                                            </div>
                                            <div
                                                class="ps-2 d-flex flex-column justify-content-between align-items-end">
                                                <button type="button"
                                                    class="btn btn-icon btn-sm btn-ghost-primary remove-cart-btn"
                                                    data-bs-toggle="modal" data-bs-target="#removeCartModal"><i
                                                        class="ri-close-fill fs-lg"></i></button>
                                                <h5 class="mb-0">$ <span class="product-line-price">147.18</span>
                                                </h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="p-2 d-block dropdown-item product text-wrap">
                                        <div class="d-flex">
                                            <div class="flex-shrink-0 avatar-sm me-3">
                                                <div class="rounded avatar-title bg-light">
                                                    <img src="{{ URL::asset('admin/images/products/32/img-10.png') }}"
                                                        class="avatar-xs" alt="user-pic">
                                                </div>
                                            </div>
                                            <div class="flex-grow-1">
                                                <p class="mb-1 fs-sm text-muted">Fashion</p>
                                                <h6 class="mt-0 mb-3 fs-md">
                                                    <a href="#!" class="text-reset">Cotton collar tshirts for
                                                        men</a>
                                                </h6>
                                                <div class="text-muted fw-medium d-none">$<span
                                                        class="product-price">53.33</span></div>
                                                <div class="input-step">
                                                    <button type="button" class="minus">–</button>
                                                    <input type="number" class="product-quantity" value="3"
                                                        min="0" max="100" readonly>
                                                    <button type="button" class="plus">+</button>
                                                </div>
                                            </div>
                                            <div
                                                class="ps-2 d-flex flex-column justify-content-between align-items-end">
                                                <button type="button"
                                                    class="btn btn-icon btn-sm btn-ghost-primary remove-cart-btn"
                                                    data-bs-toggle="modal" data-bs-target="#removeCartModal"><i
                                                        class="ri-close-fill fs-lg"></i></button>
                                                <h5 class="mb-0">$ <span class="product-line-price">159.99</span>
                                                </h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="p-2 d-block dropdown-item product text-wrap">
                                        <div class="d-flex">
                                            <div class="flex-shrink-0 avatar-sm me-3">
                                                <div class="rounded avatar-title bg-light">
                                                    <img src="{{ URL::asset('admin/images/products/32/img-11.png') }}"
                                                        class="avatar-xs" alt="user-pic">
                                                </div>
                                            </div>
                                            <div class="flex-grow-1">
                                                <p class="mb-1 fs-sm text-muted">Fashion</p>
                                                <h6 class="mt-0 mb-3 fs-md">
                                                    <a href="#!" class="text-reset">Jeans blue men boxer</a>
                                                </h6>
                                                <div class="text-muted fw-medium d-none">$<span
                                                        class="product-price">164.37</span></div>
                                                <div class="input-step">
                                                    <button type="button" class="minus">–</button>
                                                    <input type="number" class="product-quantity" value="1"
                                                        min="0" max="100" readonly>
                                                    <button type="button" class="plus">+</button>
                                                </div>
                                            </div>
                                            <div
                                                class="ps-2 d-flex flex-column justify-content-between align-items-end">
                                                <button type="button"
                                                    class="btn btn-icon btn-sm btn-ghost-primary remove-cart-btn"
                                                    data-bs-toggle="modal" data-bs-target="#removeCartModal"><i
                                                        class="ri-close-fill fs-lg"></i></button>
                                                <h5 class="mb-0">$ <span class="product-line-price">164.37</span>
                                                </h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="p-2 d-block dropdown-item product text-wrap">
                                        <div class="d-flex">
                                            <div class="flex-shrink-0 avatar-sm me-3">
                                                <div class="rounded avatar-title bg-light">
                                                    <img src="{{ URL::asset('admin/images/products/32/img-8.png') }}"
                                                        class="avatar-xs" alt="user-pic">
                                                </div>
                                            </div>
                                            <div class="flex-grow-1">
                                                <p class="mb-1 fs-sm text-muted">Fashion</p>
                                                <h6 class="mt-0 mb-3 fs-md">
                                                    <a href="#!" class="text-reset">Full Sleeve Solid Men
                                                        Sweatshirt</a>
                                                </h6>
                                                <div class="text-muted fw-medium d-none">$<span
                                                        class="product-price">180.00</span></div>
                                                <div class="input-step">
                                                    <button type="button" class="minus">–</button>
                                                    <input type="number" class="product-quantity" value="1"
                                                        min="0" max="100" readonly>
                                                    <button type="button" class="plus">+</button>
                                                </div>
                                            </div>
                                            <div
                                                class="ps-2 d-flex flex-column justify-content-between align-items-end">
                                                <button type="button"
                                                    class="btn btn-icon btn-sm btn-ghost-primary remove-cart-btn"
                                                    data-bs-toggle="modal" data-bs-target="#removeCartModal"><i
                                                        class="ri-close-fill fs-lg"></i></button>
                                                <h5 class="mb-0">$ <span class="product-line-price">180.00</span>
                                                </h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="count-table">
                                        <table class="table mb-0 table-borderless fw-semibold">
                                            <tbody>
                                                <tr>
                                                    <td>Sub Total :</td>
                                                    <td class="text-end cart-subtotal">$1306.52</td>
                                                </tr>
                                                <tr>
                                                    <td>Discount <span class="text-muted">(Steex15)</span>:</td>
                                                    <td class="text-end cart-discount">- $195.98</td>
                                                </tr>
                                                <tr>
                                                    <td>Shipping Charge :</td>
                                                    <td class="text-end cart-shipping">$65.00</td>
                                                </tr>
                                                <tr>
                                                    <td>Estimated Tax (12.5%) : </td>
                                                    <td class="text-end cart-tax">$163.31</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="p-3 border border-dashed border-bottom-0 border-start-0 border-end-0"
                                id="checkout-elem">
                                <div class="pb-3 d-flex justify-content-between align-items-center">
                                    <h5 class="m-0 text-muted">Total:</h5>
                                    <div class="px-2">
                                        <h5 class="m-0 cart-total">$1338.86</h5>
                                    </div>
                                </div>
                                <a href="apps-ecommerce-checkout" class="text-center btn btn-info w-100">
                                    Checkout
                                </a>
                            </div>
                        </div>
                    </div>
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
                    <div class="dropdown topbar-head-dropdown ms-1 header-item" id="notificationDropdown">
                        {{-- <button type="button" class="btn btn-icon btn-topbar btn-ghost-dark rounded-circle"
                            id="page-header-notifications-dropdown" data-bs-toggle="dropdown"
                            data-bs-auto-close="outside" aria-haspopup="true" aria-expanded="false">
                            <i class='bi bi-bell fs-2xl'></i>
                            <span
                                class="position-absolute topbar-badge fs-3xs translate-middle badge rounded-pill bg-danger"><span
                                    class="notification-badge">4</span><span class="visually-hidden">unread
                                    messages</span></span>
                        </button> --}}
                        <div class="p-0 dropdown-menu dropdown-menu-lg dropdown-menu-end"
                            aria-labelledby="page-header-notifications-dropdown">

                            <div class="dropdown-head rounded-top">
                                <div class="p-3 border-bottom border-bottom-dashed">
                                    <div class="row align-items-center">
                                        <div class="col">
                                            <h6 class="mb-0 fs-lg fw-semibold"> Notifications <span
                                                    class="badge bg-danger-subtle text-danger fs-sm notification-badge">
                                                    4</span></h6>
                                            <p class="mt-1 mb-0 fs-md text-muted">You have <span
                                                    class="fw-semibold notification-unread">3</span> unread messages
                                            </p>
                                        </div>
                                        <div class="col-auto dropdown">
                                            <a href="javascript:void(0);" data-bs-toggle="dropdown"
                                                class="link-secondary fs-md"><i
                                                    class="bi bi-three-dots-vertical"></i></a>
                                            <ul class="dropdown-menu">
                                                <li><a class="dropdown-item" href="#">All Clear</a></li>
                                                <li><a class="dropdown-item" href="#">Mark all as read</a></li>
                                                <li><a class="dropdown-item" href="#">Archive All</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="py-2 ps-2" id="notificationItemsTabContent">
                                <div data-simplebar style="max-height: 300px;" class="pe-2">
                                    <h6 class="my-2 text-overflow text-muted fs-sm text-uppercase notification-title">
                                        New
                                    </h6>
                                    <div
                                        class="text-reset notification-item d-block dropdown-item position-relative unread-message">
                                        <div class="d-flex">
                                            <div class="flex-shrink-0 avatar-xs me-3">
                                                <span
                                                    class="avatar-title bg-info-subtle text-info rounded-circle fs-lg">
                                                    <i class="bx bx-badge-check"></i>
                                                </span>
                                            </div>
                                            <div class="flex-grow-1">
                                                <a href="#!" class="stretched-link">
                                                    <h6 class="mt-0 mb-2 fs-md lh-base">Your <b>Elite</b> author
                                                        Graphic
                                                        Optimization <span class="text-secondary">reward</span> is
                                                        ready!
                                                    </h6>
                                                </a>
                                                <p class="mb-0 fs-2xs fw-medium text-uppercase text-muted">
                                                    <span><i class="mdi mdi-clock-outline"></i> Just 30 sec ago</span>
                                                </p>
                                            </div>
                                            <div class="px-2 fs-base">
                                                <div class="form-check notification-check">
                                                    <input class="form-check-input" type="checkbox" value=""
                                                        id="all-notification-check01">
                                                    <label class="form-check-label"
                                                        for="all-notification-check01"></label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div
                                        class="text-reset notification-item d-block dropdown-item position-relative unread-message">
                                        <div class="d-flex">
                                            <div class="flex-shrink-0 position-relative me-3">
                                                <img src="{{ URL::asset('admin/images/users/32/avatar-2.jpg') }}"
                                                    class="rounded-circle avatar-xs" alt="user-pic">
                                                <span
                                                    class="p-1 active-badge position-absolute start-100 translate-middle bg-success rounded-circle">
                                                    <span class="visually-hidden">New alerts</span>
                                                </span>
                                            </div>
                                            <div class="flex-grow-1">
                                                <a href="#!" class="stretched-link">
                                                    <h6 class="mt-0 mb-1 fs-md fw-semibold">Angela Bernier</h6>
                                                </a>
                                                <div class="fs-sm text-muted">
                                                    <p class="mb-1">Answered to your comment on the cash flow
                                                        forecast's
                                                        graph 🔔.</p>
                                                </div>
                                                <p class="mb-0 fs-2xs fw-medium text-uppercase text-muted">
                                                    <span><i class="mdi mdi-clock-outline"></i> 48 min ago</span>
                                                </p>
                                            </div>
                                            <div class="px-2 fs-base">
                                                <div class="form-check notification-check">
                                                    <input class="form-check-input" type="checkbox" value=""
                                                        id="all-notification-check02">
                                                    <label class="form-check-label"
                                                        for="all-notification-check02"></label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div
                                        class="text-reset notification-item d-block dropdown-item position-relative unread-message">
                                        <div class="d-flex">
                                            <div class="flex-shrink-0 avatar-xs me-3">
                                                <span
                                                    class="avatar-title bg-danger-subtle text-danger rounded-circle fs-lg">
                                                    <i class='bx bx-message-square-dots'></i>
                                                </span>
                                            </div>
                                            <div class="flex-grow-1">
                                                <a href="#!" class="stretched-link">
                                                    <h6 class="mt-0 mb-2 fs-md lh-base">You have received <b
                                                            class="text-success">20</b> new messages in the
                                                        conversation
                                                    </h6>
                                                </a>
                                                <p class="mb-0 fs-2xs fw-medium text-uppercase text-muted">
                                                    <span><i class="mdi mdi-clock-outline"></i> 2 hrs ago</span>
                                                </p>
                                            </div>
                                            <div class="px-2 fs-base">
                                                <div class="form-check notification-check">
                                                    <input class="form-check-input" type="checkbox" value=""
                                                        id="all-notification-check03">
                                                    <label class="form-check-label"
                                                        for="all-notification-check03"></label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <h6 class="my-2 text-overflow text-muted fs-sm text-uppercase notification-title">
                                        Read
                                        Before</h6>
                                    <div class="text-reset notification-item d-block dropdown-item position-relative">
                                        <div class="d-flex">

                                            <div class="flex-shrink-0 position-relative me-3">
                                                <img src="{{ URL::asset('admin/images/users/32/avatar-8.jpg') }}"
                                                    class="rounded-circle avatar-xs" alt="user-pic">
                                                <span
                                                    class="p-1 active-badge position-absolute start-100 translate-middle bg-warning rounded-circle">
                                                    <span class="visually-hidden">New alerts</span>
                                                </span>
                                            </div>
                                            <div class="flex-grow-1">
                                                <a href="#!" class="stretched-link">
                                                    <h6 class="mt-0 mb-1 fs-md fw-semibold">Maureen Gibson</h6>
                                                </a>
                                                <div class="fs-sm text-muted">
                                                    <p class="mb-1">We talked about a project on linkedin.</p>
                                                </div>
                                                <p class="mb-0 fs-2xs fw-medium text-uppercase text-muted">
                                                    <span><i class="mdi mdi-clock-outline"></i> 4 hrs ago</span>
                                                </p>
                                            </div>
                                            <div class="px-2 fs-base">
                                                <div class="form-check notification-check">
                                                    <input class="form-check-input" type="checkbox" value=""
                                                        id="all-notification-check04">
                                                    <label class="form-check-label"
                                                        for="all-notification-check04"></label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="notification-actions" id="notification-actions">
                                    <div class="d-flex text-muted justify-content-center align-items-center">
                                        Select <div id="select-content" class="px-1 text-body fw-semibold">0</div>
                                        Result
                                        <button type="button" class="p-0 btn btn-link link-danger ms-2"
                                            data-bs-toggle="modal"
                                            data-bs-target="#removeNotificationModal">Remove</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="dropdown ms-sm-3 header-item topbar-user">
                        <button type="button" class="shadow-none btn" id="page-header-user-dropdown"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="d-flex align-items-center">
                                <img class="rounded-circle header-profile-user"
                                    src="{{ URL::asset('admin/images/users/32/avatar-1.jpg') }}" alt="Header Avatar">
                                <span class="text-start ms-xl-2">
                                    {{-- <span class="d-none d-xl-inline-block ms-1 fw-medium user-name-text">Admin</span> --}}
                                    <span class="d-none d-xl-block ms-1 fs-sm user-name-sub-text">Admin</span>
                                </span>
                            </span>
                        </button>
                        <div class="dropdown-menu dropdown-menu-end">
                            <!-- item-->
                            <h6 class="dropdown-header">Welcome Admin!</h6>
                            {{-- <a class="dropdown-item" href="pages-profile"><i
                                    class="align-middle mdi mdi-account-circle text-muted fs-lg me-1"></i> <span
                                    class="align-middle"> @lang('translation.profile')</span></a> --}}
                            {{-- <a class="dropdown-item" href="apps-chat"><i
                                    class="align-middle mdi mdi-message-text-outline text-muted fs-lg me-1"></i> <span
                                    class="align-middle">Messages</span></a>
                            <a class="dropdown-item" href="apps-tickets-overview"><i
                                    class="align-middle mdi mdi-calendar-check-outline text-muted fs-lg me-1"></i>
                                <span class="align-middle">Taskboard</span></a>
                            <a class="dropdown-item" href="pages-faqs"><i
                                    class="align-middle mdi mdi-lifebuoy text-muted fs-lg me-1"></i> <span
                                    class="align-middle">Help</span></a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="pages-profile"><i
                                    class="align-middle mdi mdi-wallet text-muted fs-lg me-1"></i> <span
                                    class="align-middle">Balance : <b>$8451.36</b></span></a>
                            <a class="dropdown-item" href="pages-profile-settings"><span
                                    class="mt-1 badge bg-success-subtle text-success float-end">New</span><i
                                    class="align-middle mdi mdi-cog-outline text-muted fs-lg me-1"></i> <span
                                    class="align-middle">@lang('translation.settings')</span></a> --}}
                            {{-- <a class="dropdown-item" href="{{ route('password.confirm') }}"><i
                                    class="align-middle mdi mdi-lock text-muted fs-lg me-1"></i> <span
                                    class="align-middle"> @lang('translation.lock-screen')</span></a> --}}
                            <a class="dropdown-item" href="{{ route('auth.logout') }}"
                                onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i
                                    class="align-middle mdi mdi-logout text-muted fs-lg me-1"></i> <span
                                    class="align-middle" data-key="t-logout">Logout</span></a>
                            <form id="logout-form" action="{{ route('auth.logout') }}" method="GET" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <x-admin.sidebar />
    <!--start back-to-top-->
    <button class="btn btn-dark btn-icon" id="back-to-top">
        <i class="bi bi-caret-up fs-3xl"></i>
    </button>
    <!--end back-to-top-->
    <div class="main-content">
        <div class="page-content">
