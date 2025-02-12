<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <!-- custom css -->
    <link rel="stylesheet" href="{{ asset('assets/css/custom-style.css') }}">
    <title>{{ $title }}</title>
    <!-- font -->
    <link href="https://fonts.googleapis.com/css2?family=Jost:ital,wght@0,100..900;1,100..900&family=Marcellus&family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <!-- splide slider css -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/css/splide.min.css" />
    <!-- Include Select2 CSS & JS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>


</head>

<body>
    <header class="site-header">
        <div class="ko-container">
            <div class="ko-row">
                <div class="ko-header-logo">
                    <a href="index.html">
                        <img src="{{ asset('assets/images/main-logo.webp') }}" alt="logo">
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
                            <a href="{{ route("view.dashboard") }}">Home</a>
                        </li>
                        <li>
                            <a href="#">About</a>
                        </li>
                        <li class="ko-has-dropdown">
                            <a href="javascript:void(0);">Rooms</a>
                            <div class="ko-dropdown">
                                <div class="ko-container">
                                    <div class="ko-row">
                                        <div class="ko-col-3">
                                            <h3>Rooms</h3>
                                            <ul class="ko-dropdown-list">
                                                <li>
                                                    <a href="#">All Rooms Default</a>
                                                </li>
                                                <li>
                                                    <a href="#">All Rooms Style Two</a>
                                                </li>
                                                <li>
                                                    <a href="#">All Rooms Style Three</a>
                                                </li>
                                                <li>
                                                    <a href="#">Room Single Style One</a>
                                                </li>
                                                <li>
                                                    <a href="#">Room Single Style Two</a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="ko-col-9">
                                            <div class="ko-rooms-wrap">
                                                <div class="ko-col-4">
                                                    <div class="ko-room-box">
                                                        <a href="#" class="">
                                                            <div class="ko-room-img">
                                                                <img src="assets/images/room-demo2.webp"
                                                                    alt="Room" />
                                                                <span>Best seller</span>
                                                            </div>
                                                            <h3>Deluxe Room</h3>
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="ko-col-4">
                                                    <div class="ko-room-box">
                                                        <a href="#" class="">
                                                            <div class="ko-room-img">
                                                                <img src="assets/images/room-demo2.webp"
                                                                    alt="Room" />
                                                                <span>Best seller</span>
                                                            </div>
                                                            <h3>Deluxe Room</h3>
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="ko-col-4">
                                                    <div class="ko-room-box">
                                                        <a href="#" class="">
                                                            <div class="ko-room-img">
                                                                <img src="assets/images/room-demo2.webp"
                                                                    alt="Room" />
                                                                <span>Best seller</span>
                                                            </div>
                                                            <h3>Deluxe Room</h3>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <a href="{{ route("view.blog");}}">Blog</a>
                        </li>
                        <li>
                            <a href="#">Contact</a>
                        </li>
                        <li>
                            <a href="#">RESERVATION</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </header>
