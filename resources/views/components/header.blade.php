<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>{{ $meta['title'] ?? "Knoght Oasis" }}</title>
    <meta property="og:title" content="{{ $meta['title'] ?? "Knoght Oasis" }}">
    <meta name="twitter:title" content="{{ $meta['title'] ?? "Knoght Oasis" }}">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="{{ $meta['description'] }}">
    <meta property="og:description" content="{{ $meta['description'] }}">
    
    <link rel="shortcut icon" href="{{ publicPath(getSetting("site_icon")) }}">
    <meta property="og:image" content="{{ publicPath(getSetting("site_icon")) }}">
    <meta name="twitter:image" content="{{ publicPath(getSetting("site_icon")) }}">
    <meta name="twitter:card" content="{{ publicPath(getSetting("site_icon")) }}">
    
    @if(isset($meta['sco-allow']) && $meta['sco-allow'] == false)
        <meta name="robots" content="noindex, nofollow">
    @else
        <link rel="canonical" href="{{ url()->current() }}">
        <meta property="og:url" content="{{ url()->current() }}">
        <meta property="og:type" content="website">
        <meta name="robots" content="index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1">
    @endif

    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="renderer" content="webkit">
    {!!getSetting('page_custom_script_header') !!}
    <link rel="stylesheet" href="{{ publicPath('assets/css/custom-style.css') }}?version={{ rand(10,99) }}.{{ rand(10,99) }}.{{ rand(100,999) }} ">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/css/splide.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Jost:ital,wght@0,100..900;1,100..900&family=Marcellus&family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
</head>

<body>
    {!!getSetting('page_custom_script_body') !!}
    <header class="site-header">
        <div class="ko-container">
            <div class="ko-row">
                <div class="ko-header-logo">
                    <a href="{{ route('view.home') }}" id="ko_header_logo_link">
                        <img src="{{ publicPath(getSetting("site_logo_dark")) }}" alt="logo">
                        <img src="{{ publicPath(getSetting("site_logo_light")) }}" style="display:none" alt="logo">
                    @if (Route::is('login') || Route::is('view.signup') || Route::is('') || Route::is('view.forget_password') || Route::is('view.otp_verify') || Route::is('view.new_password') || Route::is('auth.logout') || Route::is('view.home'))
                        <input type="hidden" value="0" id="ko_header_allow_b_w" />
                    @else
                        <input type="hidden" value="1" id="ko_header_allow_b_w" />
                    @endif
                    </a>
                </div>
                <div class="ko-mb-toogle-btn">
                    <button class="ko-toogle-btn">
                        <svg width="20" height="16" viewBox="0 0 20 16" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <rect y="14" width="18" height="2" fill="#000000"></rect>
                            <rect y="7" width="18" height="2" fill="#000000"></rect>
                            <rect width="18" height="2" fill="#000000"></rect>
                        </svg>
                    </button>
                </div>
                <div class="ko-overlay"></div>
                <div class="ko-header-menu">
                    <div class="ko-mb-close-btn">
                        <button class="ko-close-btn">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512">
                                <path
                                    d="M317.7 402.3c3.125 3.125 3.125 8.188 0 11.31c-3.127 3.127-8.186 3.127-11.31 0L160 267.3l-146.3 146.3c-3.127 3.127-8.186 3.127-11.31 0c-3.125-3.125-3.125-8.188 0-11.31L148.7 256L2.344 109.7c-3.125-3.125-3.125-8.188 0-11.31s8.188-3.125 11.31 0L160 244.7l146.3-146.3c3.125-3.125 8.188-3.125 11.31 0s3.125 8.188 0 11.31L171.3 256L317.7 402.3z">
                                </path>
                            </svg>
                        </button>
                    </div>
                    <ul>
                        <li @if (Route::is('view.home')) class="active" @endif >
                            <a href="{{ route("view.home") }}">Home</a>
                        </li>
                        <li @if (Route::is('view.rooms') || Route::is('view.room') || Route::is('view.cart') ) class="active" @endif>
                            <a href="{{ route('view.rooms') }}">Rooms</a>
                        </li>
                        <li @if (Route::is('view.blog') || Route::is('blog.list') ) class="active" @endif>
                            <a href="{{ route("view.blog")}}">Blogs</a>
                        </li>
                        <li @if (Route::is('view.about')) class="active" @endif>
                            <a href="{{ route("view.about" ) }}">About Us</a>
                        </li>
                        <li @if (Route::is('view.contact')) class="active" @endif>
                            <a href="{{ route("view.contact" ) }}">Contact Us</a>
                        </li>
                        <li @if (Route::is('view.faqs')) class="active" @endif>
                            <a href="{{ route("view.faqs" ) }}">FAQs</a>
                        </li>
                        <li>
                            @if(auth()->check())
                                @if(auth()->user()->hasRole('admin'))
                                    <a href="{{ route('view.admin.dashboard') }}" class="ko-btn" >Dashboard</a>
                                @elseif(auth()->user()->hasRole('user'))
                                    <a href="{{ route('view.my_account') }}"  class="ko-btn">My Account</a>
                                @else
                                    <a href="{{ route('login') }}"  class="ko-btn">Login</a>
                                @endif
                            @else
                                <a href="{{ route('login') }}"  class="ko-btn">Login</a>
                            @endif
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </header>
