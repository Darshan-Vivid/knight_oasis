<!DOCTYPE html>
<html lang="en">

<head>
    <title>{{ $title }}</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="{{ getSetting("site_icon") }}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('assets/css/custom-style.css') }}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Jost:ital,wght@0,100..900;1,100..900&family=Marcellus&family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/css/splide.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    
    @if(Route::is('view.room'))
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    @endif
</head>

<body>
    <header class="site-header">
        <div class="ko-container">
            <div class="ko-row">
                <div class="ko-header-logo">
                    <a href="{{ route('view.home') }}">
                        <img src="{{ getSetting("site_logo_dark") }}" alt="logo">
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
                        <li>
                            <a href="{{ route("view.home") }}">Home</a>
                        </li>
                        <li>
                            <a href="{{ route('view.rooms') }}">Rooms</a>
                        </li>
                        <li>
                            <a href="{{ route("view.blog")}}">Blog</a>
                        </li>
                        <li>
                            <a href="{{ route("view.about" ) }}">About</a>
                        </li>
                        <li>
                            <a href="{{ route("view.contact" ) }}">Contact</a>
                        </li>
                        <li>
                            @if(auth()->check())
                                @if(auth()->user()->hasRole('admin'))
                                    <a href="{{ route('view.admin.dashboard') }}">Dashboard</a>
                                @elseif(auth()->user()->hasRole('user'))
                                    <a href="/">My Account</a>
                                @else
                                    <a href="{{ route('login') }}">Login</a>
                                @endif
                            @else
                                <a href="{{ route('login') }}">Login</a>
                            @endif
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </header>
