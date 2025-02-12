<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel</title>
    <!-- font -->
    <link href="https://fonts.googleapis.com/css2?family=Jost:ital,wght@0,100..900;1,100..900&family=Marcellus&family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <!-- splide slider css -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/css/splide.min.css" />
    <!-- custom css -->
    <link rel="stylesheet" href="assets/css/custom-style.css" type="text/css" />
</head>
<body>

    <header class="site-header">
        <div class="ko-container">
            <div class="ko-row">
                <div class="ko-header-logo">
                    <a href="index.html">
                        <img src="assets/images/main-logo.webp" alt="logo">
                    </a>
                </div>
                <div class="ko-mb-toogle-btn">
                    <button class="ko-toogle-btn">
                        <svg width="20" height="16" viewBox="0 0 20 16" fill="none" xmlns="http://www.w3.org/2000/svg">
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
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"><path d="M317.7 402.3c3.125 3.125 3.125 8.188 0 11.31c-3.127 3.127-8.186 3.127-11.31 0L160 267.3l-146.3 146.3c-3.127 3.127-8.186 3.127-11.31 0c-3.125-3.125-3.125-8.188 0-11.31L148.7 256L2.344 109.7c-3.125-3.125-3.125-8.188 0-11.31s8.188-3.125 11.31 0L160 244.7l146.3-146.3c3.125-3.125 8.188-3.125 11.31 0s3.125 8.188 0 11.31L171.3 256L317.7 402.3z"></path></svg>
                        </button>
                    </div>
                    <ul>
                        <li>
                            <a href="index.html">Home</a>
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
                                                                <img src="assets/images/room-demo2.webp" alt="Room" />
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
                                                                <img src="assets/images/room-demo2.webp" alt="Room" />
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
                                                                <img src="assets/images/room-demo2.webp" alt="Room" />
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
                            <a href="{{ route('view.blog') }}">Blog</a>
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

    <main>
        <!-- ------------Hero section start------------ -->
        <section class="ko-hero-section">
            <div class="ko-hero-img">
                <img src="assets/images/hero-img.webp" alt="hero-img" />
            </div>
            <div class="ko-container">

                <div class="ko-hero-ctn">
                    <h1>Luxury Hotel</h1>
                    <p>Immerse yourself in the epitome of luxury at Almaris, your premier destination in New York. Our hotel redefines elegance and comfort, offering an exquisite escape for discerning travelers.</p>
                    <a href="#" class="ko-btn">Book Your Stay</a>
                    <div class="ko-hero-counter">
                        <ul>
                            <li>
                                <h3><span id="customers">18000</span><span>+</span></h3>
                                <span>Happy Customers</span>
                            </li>
                            <li>
                                <h3><span id="reviews">99</span><span>+</span></h3>
                                <span>Positive Reviews</span>
                            </li>
                            <li>
                                <h3><span id="experiences">25</span><span>+</span></h3>
                                <span>Year of Experiences</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
        <!-- ------------Hero section end------------ -->

        <!-- ------------Reservation block start------------- -->
        <section class="ko-reservation-section">
            <div class="ko-container">
                <div class="ko-reservation-form">
                    <div class="ko-reservation-title">
                        <h3>Reservation</h3>
                    </div>
                    <div class="ko-reservation-inner">
                        <form action="">
                            <div class="ko-reservation-wrap">
                                <div class="ko-reservation-group">
                                    <h6>Check In</h6>
                                    <input type="text" class="ko-reservation-date" name="start_date" value="2025-02-04" />
                                </div>
                                <div class="ko-reservation-group">
                                    <h6>Check In</h6>
                                    <input type="text" class="ko-reservation-date" name="start_date" value="2025-02-05" />
                                </div>
                             </div>
                             <div class="ko-reservation-wrap">
                                <div class="ko-reservation-group">
                                    <h6>Adult</h6>
                                    <div class="ko-number">
                                        <span class="ko-minus">-</span>
                                        <input class="ko-num-input" type="text" value="1" name="adult_quantity">
                                        <span class="ko-plus">+</span>
                                    </div>
                                </div>
                                <div class="ko-reservation-group">
                                    <h6>Children</h6>
                                    <div class="ko-number">
                                        <span class="ko-minus">-</span>
                                        <input class="ko-num-input" type="text" value="1" name="adult_quantity">
                                        <span class="ko-plus">+</span>
                                    </div>
                                </div>
                             </div>
                             <div class="">
                                <button type="button" class="ko-btn">Check Availability</button>
                             </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
        <!-- ------------Reservation block end------------- -->

        <!-- -----------about section start----------------  -->
        <section class="ko-about-section">
            <div class="ko-container">
                <div class="ko-about-row">
                    <div class="ko-about-col">
                        <div class="ko-about-main-img-inner">
                            <div class="ko-about-main-img">
                                <img src="assets/images/7.webp" alt="img-main" class="ko-about-img-1" />
                            </div>
                            <div class="ko-about-main-img-2">
                                <img src="assets/images/g_4.webp" alt="img-2" class="ko-about-img-2" />
                            </div>
                        </div>

                    </div>
                    <div class="ko-about-col">
                        <div class="ko-about-content">
                            <span>Welcome To Hotel</span>
                            <h3>Your Comfort, Our Commitment</h3>
                            <p>
                                Non anim in pariatur in ex excepteur commodo do officia amet incididunt ullamco nostrud aliquip minim magna esse dolore ea quis laborum eiusmod dolore ex pariatur ut cillum non excepteur irure dolore reprehenderit dolor id ut ut in ut occaecat culpa minim dolore elit non ut tempor ut in ex ut tempor eiusmod sunt sunt ut duis aute in occaecat incididunt reprehenderit sit quis incididunt.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- -----------about section end---------------- -->

        <!-- --------------testimonials section start---------------- -->
        <section class="ko-testimonials-section" role="group" aria-label="Splide Basic HTML Example">
            <div class="ko-splide-testimonials splide">
                <div class="splide__track">
                    <ul class="splide__list">
                        <li class="splide__slide">
                            <div class="ko-testimonials">
                                <ul class="ko-testimonials-list">
                                    <li class="full"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" baseProfile="tiny" height="24px" id="Layer_1" version="1.2" viewBox="0 0 24 24" width="24px" xml:space="preserve"><g><path d="M9.362,9.158c0,0-3.16,0.35-5.268,0.584c-0.19,0.023-0.358,0.15-0.421,0.343s0,0.394,0.14,0.521    c1.566,1.429,3.919,3.569,3.919,3.569c-0.002,0-0.646,3.113-1.074,5.19c-0.036,0.188,0.032,0.387,0.196,0.506    c0.163,0.119,0.373,0.121,0.538,0.028c1.844-1.048,4.606-2.624,4.606-2.624s2.763,1.576,4.604,2.625    c0.168,0.092,0.378,0.09,0.541-0.029c0.164-0.119,0.232-0.318,0.195-0.505c-0.428-2.078-1.071-5.191-1.071-5.191    s2.353-2.14,3.919-3.566c0.14-0.131,0.202-0.332,0.14-0.524s-0.23-0.319-0.42-0.341c-2.108-0.236-5.269-0.586-5.269-0.586    s-1.31-2.898-2.183-4.83c-0.082-0.173-0.254-0.294-0.456-0.294s-0.375,0.122-0.453,0.294C10.671,6.26,9.362,9.158,9.362,9.158z"/></g></svg></li>
                                    <li class="full"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" baseProfile="tiny" height="24px" id="Layer_1" version="1.2" viewBox="0 0 24 24" width="24px" xml:space="preserve"><g><path d="M9.362,9.158c0,0-3.16,0.35-5.268,0.584c-0.19,0.023-0.358,0.15-0.421,0.343s0,0.394,0.14,0.521    c1.566,1.429,3.919,3.569,3.919,3.569c-0.002,0-0.646,3.113-1.074,5.19c-0.036,0.188,0.032,0.387,0.196,0.506    c0.163,0.119,0.373,0.121,0.538,0.028c1.844-1.048,4.606-2.624,4.606-2.624s2.763,1.576,4.604,2.625    c0.168,0.092,0.378,0.09,0.541-0.029c0.164-0.119,0.232-0.318,0.195-0.505c-0.428-2.078-1.071-5.191-1.071-5.191    s2.353-2.14,3.919-3.566c0.14-0.131,0.202-0.332,0.14-0.524s-0.23-0.319-0.42-0.341c-2.108-0.236-5.269-0.586-5.269-0.586    s-1.31-2.898-2.183-4.83c-0.082-0.173-0.254-0.294-0.456-0.294s-0.375,0.122-0.453,0.294C10.671,6.26,9.362,9.158,9.362,9.158z"/></g></svg></li>
                                    <li class="full"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" baseProfile="tiny" height="24px" id="Layer_1" version="1.2" viewBox="0 0 24 24" width="24px" xml:space="preserve"><g><path d="M9.362,9.158c0,0-3.16,0.35-5.268,0.584c-0.19,0.023-0.358,0.15-0.421,0.343s0,0.394,0.14,0.521    c1.566,1.429,3.919,3.569,3.919,3.569c-0.002,0-0.646,3.113-1.074,5.19c-0.036,0.188,0.032,0.387,0.196,0.506    c0.163,0.119,0.373,0.121,0.538,0.028c1.844-1.048,4.606-2.624,4.606-2.624s2.763,1.576,4.604,2.625    c0.168,0.092,0.378,0.09,0.541-0.029c0.164-0.119,0.232-0.318,0.195-0.505c-0.428-2.078-1.071-5.191-1.071-5.191    s2.353-2.14,3.919-3.566c0.14-0.131,0.202-0.332,0.14-0.524s-0.23-0.319-0.42-0.341c-2.108-0.236-5.269-0.586-5.269-0.586    s-1.31-2.898-2.183-4.83c-0.082-0.173-0.254-0.294-0.456-0.294s-0.375,0.122-0.453,0.294C10.671,6.26,9.362,9.158,9.362,9.158z"/></g></svg></li>
                                    <li class="empty"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" baseProfile="tiny" height="24px" id="Layer_1" version="1.2" viewBox="0 0 24 24" width="24px" xml:space="preserve"><g><path d="M9.362,9.158c0,0-3.16,0.35-5.268,0.584c-0.19,0.023-0.358,0.15-0.421,0.343s0,0.394,0.14,0.521    c1.566,1.429,3.919,3.569,3.919,3.569c-0.002,0-0.646,3.113-1.074,5.19c-0.036,0.188,0.032,0.387,0.196,0.506    c0.163,0.119,0.373,0.121,0.538,0.028c1.844-1.048,4.606-2.624,4.606-2.624s2.763,1.576,4.604,2.625    c0.168,0.092,0.378,0.09,0.541-0.029c0.164-0.119,0.232-0.318,0.195-0.505c-0.428-2.078-1.071-5.191-1.071-5.191    s2.353-2.14,3.919-3.566c0.14-0.131,0.202-0.332,0.14-0.524s-0.23-0.319-0.42-0.341c-2.108-0.236-5.269-0.586-5.269-0.586    s-1.31-2.898-2.183-4.83c-0.082-0.173-0.254-0.294-0.456-0.294s-0.375,0.122-0.453,0.294C10.671,6.26,9.362,9.158,9.362,9.158z"/></g></svg></li>
                                    <li class="empty"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" baseProfile="tiny" height="24px" id="Layer_1" version="1.2" viewBox="0 0 24 24" width="24px" xml:space="preserve"><g><path d="M9.362,9.158c0,0-3.16,0.35-5.268,0.584c-0.19,0.023-0.358,0.15-0.421,0.343s0,0.394,0.14,0.521    c1.566,1.429,3.919,3.569,3.919,3.569c-0.002,0-0.646,3.113-1.074,5.19c-0.036,0.188,0.032,0.387,0.196,0.506    c0.163,0.119,0.373,0.121,0.538,0.028c1.844-1.048,4.606-2.624,4.606-2.624s2.763,1.576,4.604,2.625    c0.168,0.092,0.378,0.09,0.541-0.029c0.164-0.119,0.232-0.318,0.195-0.505c-0.428-2.078-1.071-5.191-1.071-5.191    s2.353-2.14,3.919-3.566c0.14-0.131,0.202-0.332,0.14-0.524s-0.23-0.319-0.42-0.341c-2.108-0.236-5.269-0.586-5.269-0.586    s-1.31-2.898-2.183-4.83c-0.082-0.173-0.254-0.294-0.456-0.294s-0.375,0.122-0.453,0.294C10.671,6.26,9.362,9.158,9.362,9.158z"/></g></svg></li>
                                </ul>
                                <h2>Experience unparalleled luxury and personalized service at Almaris Hotel, where every stay is a journey into sophistication, comfort, and unforgettable memories.</h2>
                                <p>Donette Fondren</p>
                            </div>
                        </li>
                        <li class="splide__slide">
                            <div class="ko-testimonials">
                                <ul class="ko-testimonials-list">
                                    <li class="full"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" baseProfile="tiny" height="24px" id="Layer_1" version="1.2" viewBox="0 0 24 24" width="24px" xml:space="preserve"><g><path d="M9.362,9.158c0,0-3.16,0.35-5.268,0.584c-0.19,0.023-0.358,0.15-0.421,0.343s0,0.394,0.14,0.521    c1.566,1.429,3.919,3.569,3.919,3.569c-0.002,0-0.646,3.113-1.074,5.19c-0.036,0.188,0.032,0.387,0.196,0.506    c0.163,0.119,0.373,0.121,0.538,0.028c1.844-1.048,4.606-2.624,4.606-2.624s2.763,1.576,4.604,2.625    c0.168,0.092,0.378,0.09,0.541-0.029c0.164-0.119,0.232-0.318,0.195-0.505c-0.428-2.078-1.071-5.191-1.071-5.191    s2.353-2.14,3.919-3.566c0.14-0.131,0.202-0.332,0.14-0.524s-0.23-0.319-0.42-0.341c-2.108-0.236-5.269-0.586-5.269-0.586    s-1.31-2.898-2.183-4.83c-0.082-0.173-0.254-0.294-0.456-0.294s-0.375,0.122-0.453,0.294C10.671,6.26,9.362,9.158,9.362,9.158z"/></g></svg></li>
                                    <li class="full"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" baseProfile="tiny" height="24px" id="Layer_1" version="1.2" viewBox="0 0 24 24" width="24px" xml:space="preserve"><g><path d="M9.362,9.158c0,0-3.16,0.35-5.268,0.584c-0.19,0.023-0.358,0.15-0.421,0.343s0,0.394,0.14,0.521    c1.566,1.429,3.919,3.569,3.919,3.569c-0.002,0-0.646,3.113-1.074,5.19c-0.036,0.188,0.032,0.387,0.196,0.506    c0.163,0.119,0.373,0.121,0.538,0.028c1.844-1.048,4.606-2.624,4.606-2.624s2.763,1.576,4.604,2.625    c0.168,0.092,0.378,0.09,0.541-0.029c0.164-0.119,0.232-0.318,0.195-0.505c-0.428-2.078-1.071-5.191-1.071-5.191    s2.353-2.14,3.919-3.566c0.14-0.131,0.202-0.332,0.14-0.524s-0.23-0.319-0.42-0.341c-2.108-0.236-5.269-0.586-5.269-0.586    s-1.31-2.898-2.183-4.83c-0.082-0.173-0.254-0.294-0.456-0.294s-0.375,0.122-0.453,0.294C10.671,6.26,9.362,9.158,9.362,9.158z"/></g></svg></li>
                                    <li class="full"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" baseProfile="tiny" height="24px" id="Layer_1" version="1.2" viewBox="0 0 24 24" width="24px" xml:space="preserve"><g><path d="M9.362,9.158c0,0-3.16,0.35-5.268,0.584c-0.19,0.023-0.358,0.15-0.421,0.343s0,0.394,0.14,0.521    c1.566,1.429,3.919,3.569,3.919,3.569c-0.002,0-0.646,3.113-1.074,5.19c-0.036,0.188,0.032,0.387,0.196,0.506    c0.163,0.119,0.373,0.121,0.538,0.028c1.844-1.048,4.606-2.624,4.606-2.624s2.763,1.576,4.604,2.625    c0.168,0.092,0.378,0.09,0.541-0.029c0.164-0.119,0.232-0.318,0.195-0.505c-0.428-2.078-1.071-5.191-1.071-5.191    s2.353-2.14,3.919-3.566c0.14-0.131,0.202-0.332,0.14-0.524s-0.23-0.319-0.42-0.341c-2.108-0.236-5.269-0.586-5.269-0.586    s-1.31-2.898-2.183-4.83c-0.082-0.173-0.254-0.294-0.456-0.294s-0.375,0.122-0.453,0.294C10.671,6.26,9.362,9.158,9.362,9.158z"/></g></svg></li>
                                    <li class="full"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" baseProfile="tiny" height="24px" id="Layer_1" version="1.2" viewBox="0 0 24 24" width="24px" xml:space="preserve"><g><path d="M9.362,9.158c0,0-3.16,0.35-5.268,0.584c-0.19,0.023-0.358,0.15-0.421,0.343s0,0.394,0.14,0.521    c1.566,1.429,3.919,3.569,3.919,3.569c-0.002,0-0.646,3.113-1.074,5.19c-0.036,0.188,0.032,0.387,0.196,0.506    c0.163,0.119,0.373,0.121,0.538,0.028c1.844-1.048,4.606-2.624,4.606-2.624s2.763,1.576,4.604,2.625    c0.168,0.092,0.378,0.09,0.541-0.029c0.164-0.119,0.232-0.318,0.195-0.505c-0.428-2.078-1.071-5.191-1.071-5.191    s2.353-2.14,3.919-3.566c0.14-0.131,0.202-0.332,0.14-0.524s-0.23-0.319-0.42-0.341c-2.108-0.236-5.269-0.586-5.269-0.586    s-1.31-2.898-2.183-4.83c-0.082-0.173-0.254-0.294-0.456-0.294s-0.375,0.122-0.453,0.294C10.671,6.26,9.362,9.158,9.362,9.158z"/></g></svg></li>
                                    <li class="empty"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" baseProfile="tiny" height="24px" id="Layer_1" version="1.2" viewBox="0 0 24 24" width="24px" xml:space="preserve"><g><path d="M9.362,9.158c0,0-3.16,0.35-5.268,0.584c-0.19,0.023-0.358,0.15-0.421,0.343s0,0.394,0.14,0.521    c1.566,1.429,3.919,3.569,3.919,3.569c-0.002,0-0.646,3.113-1.074,5.19c-0.036,0.188,0.032,0.387,0.196,0.506    c0.163,0.119,0.373,0.121,0.538,0.028c1.844-1.048,4.606-2.624,4.606-2.624s2.763,1.576,4.604,2.625    c0.168,0.092,0.378,0.09,0.541-0.029c0.164-0.119,0.232-0.318,0.195-0.505c-0.428-2.078-1.071-5.191-1.071-5.191    s2.353-2.14,3.919-3.566c0.14-0.131,0.202-0.332,0.14-0.524s-0.23-0.319-0.42-0.341c-2.108-0.236-5.269-0.586-5.269-0.586    s-1.31-2.898-2.183-4.83c-0.082-0.173-0.254-0.294-0.456-0.294s-0.375,0.122-0.453,0.294C10.671,6.26,9.362,9.158,9.362,9.158z"/></g></svg></li>
                                </ul>
                                <h2>Experience unparalleled luxury and personalized service at Almaris Hotel, where every stay is a journey into sophistication, comfort, and unforgettable memories.</h2>
                                <p>Donette Fondren</p>
                            </div>
                        </li>
                        <li class="splide__slide">
                            <div class="ko-testimonials">
                                <ul class="ko-testimonials-list">
                                    <li class="full"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" baseProfile="tiny" height="24px" id="Layer_1" version="1.2" viewBox="0 0 24 24" width="24px" xml:space="preserve"><g><path d="M9.362,9.158c0,0-3.16,0.35-5.268,0.584c-0.19,0.023-0.358,0.15-0.421,0.343s0,0.394,0.14,0.521    c1.566,1.429,3.919,3.569,3.919,3.569c-0.002,0-0.646,3.113-1.074,5.19c-0.036,0.188,0.032,0.387,0.196,0.506    c0.163,0.119,0.373,0.121,0.538,0.028c1.844-1.048,4.606-2.624,4.606-2.624s2.763,1.576,4.604,2.625    c0.168,0.092,0.378,0.09,0.541-0.029c0.164-0.119,0.232-0.318,0.195-0.505c-0.428-2.078-1.071-5.191-1.071-5.191    s2.353-2.14,3.919-3.566c0.14-0.131,0.202-0.332,0.14-0.524s-0.23-0.319-0.42-0.341c-2.108-0.236-5.269-0.586-5.269-0.586    s-1.31-2.898-2.183-4.83c-0.082-0.173-0.254-0.294-0.456-0.294s-0.375,0.122-0.453,0.294C10.671,6.26,9.362,9.158,9.362,9.158z"/></g></svg></li>
                                    <li class="full"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" baseProfile="tiny" height="24px" id="Layer_1" version="1.2" viewBox="0 0 24 24" width="24px" xml:space="preserve"><g><path d="M9.362,9.158c0,0-3.16,0.35-5.268,0.584c-0.19,0.023-0.358,0.15-0.421,0.343s0,0.394,0.14,0.521    c1.566,1.429,3.919,3.569,3.919,3.569c-0.002,0-0.646,3.113-1.074,5.19c-0.036,0.188,0.032,0.387,0.196,0.506    c0.163,0.119,0.373,0.121,0.538,0.028c1.844-1.048,4.606-2.624,4.606-2.624s2.763,1.576,4.604,2.625    c0.168,0.092,0.378,0.09,0.541-0.029c0.164-0.119,0.232-0.318,0.195-0.505c-0.428-2.078-1.071-5.191-1.071-5.191    s2.353-2.14,3.919-3.566c0.14-0.131,0.202-0.332,0.14-0.524s-0.23-0.319-0.42-0.341c-2.108-0.236-5.269-0.586-5.269-0.586    s-1.31-2.898-2.183-4.83c-0.082-0.173-0.254-0.294-0.456-0.294s-0.375,0.122-0.453,0.294C10.671,6.26,9.362,9.158,9.362,9.158z"/></g></svg></li>
                                    <li class="full"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" baseProfile="tiny" height="24px" id="Layer_1" version="1.2" viewBox="0 0 24 24" width="24px" xml:space="preserve"><g><path d="M9.362,9.158c0,0-3.16,0.35-5.268,0.584c-0.19,0.023-0.358,0.15-0.421,0.343s0,0.394,0.14,0.521    c1.566,1.429,3.919,3.569,3.919,3.569c-0.002,0-0.646,3.113-1.074,5.19c-0.036,0.188,0.032,0.387,0.196,0.506    c0.163,0.119,0.373,0.121,0.538,0.028c1.844-1.048,4.606-2.624,4.606-2.624s2.763,1.576,4.604,2.625    c0.168,0.092,0.378,0.09,0.541-0.029c0.164-0.119,0.232-0.318,0.195-0.505c-0.428-2.078-1.071-5.191-1.071-5.191    s2.353-2.14,3.919-3.566c0.14-0.131,0.202-0.332,0.14-0.524s-0.23-0.319-0.42-0.341c-2.108-0.236-5.269-0.586-5.269-0.586    s-1.31-2.898-2.183-4.83c-0.082-0.173-0.254-0.294-0.456-0.294s-0.375,0.122-0.453,0.294C10.671,6.26,9.362,9.158,9.362,9.158z"/></g></svg></li>
                                    <li class="full"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" baseProfile="tiny" height="24px" id="Layer_1" version="1.2" viewBox="0 0 24 24" width="24px" xml:space="preserve"><g><path d="M9.362,9.158c0,0-3.16,0.35-5.268,0.584c-0.19,0.023-0.358,0.15-0.421,0.343s0,0.394,0.14,0.521    c1.566,1.429,3.919,3.569,3.919,3.569c-0.002,0-0.646,3.113-1.074,5.19c-0.036,0.188,0.032,0.387,0.196,0.506    c0.163,0.119,0.373,0.121,0.538,0.028c1.844-1.048,4.606-2.624,4.606-2.624s2.763,1.576,4.604,2.625    c0.168,0.092,0.378,0.09,0.541-0.029c0.164-0.119,0.232-0.318,0.195-0.505c-0.428-2.078-1.071-5.191-1.071-5.191    s2.353-2.14,3.919-3.566c0.14-0.131,0.202-0.332,0.14-0.524s-0.23-0.319-0.42-0.341c-2.108-0.236-5.269-0.586-5.269-0.586    s-1.31-2.898-2.183-4.83c-0.082-0.173-0.254-0.294-0.456-0.294s-0.375,0.122-0.453,0.294C10.671,6.26,9.362,9.158,9.362,9.158z"/></g></svg></li>
                                    <li class="empty"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" baseProfile="tiny" height="24px" id="Layer_1" version="1.2" viewBox="0 0 24 24" width="24px" xml:space="preserve"><g><path d="M9.362,9.158c0,0-3.16,0.35-5.268,0.584c-0.19,0.023-0.358,0.15-0.421,0.343s0,0.394,0.14,0.521    c1.566,1.429,3.919,3.569,3.919,3.569c-0.002,0-0.646,3.113-1.074,5.19c-0.036,0.188,0.032,0.387,0.196,0.506    c0.163,0.119,0.373,0.121,0.538,0.028c1.844-1.048,4.606-2.624,4.606-2.624s2.763,1.576,4.604,2.625    c0.168,0.092,0.378,0.09,0.541-0.029c0.164-0.119,0.232-0.318,0.195-0.505c-0.428-2.078-1.071-5.191-1.071-5.191    s2.353-2.14,3.919-3.566c0.14-0.131,0.202-0.332,0.14-0.524s-0.23-0.319-0.42-0.341c-2.108-0.236-5.269-0.586-5.269-0.586    s-1.31-2.898-2.183-4.83c-0.082-0.173-0.254-0.294-0.456-0.294s-0.375,0.122-0.453,0.294C10.671,6.26,9.362,9.158,9.362,9.158z"/></g></svg></li>
                                </ul>
                                <h2>Experience unparalleled luxury and personalized service at Almaris Hotel, where every stay is a journey into sophistication, comfort, and unforgettable memories.</h2>
                                <p>Donette Fondren</p>
                            </div>
                        </li>
                        <li class="splide__slide">
                            <div class="ko-testimonials">
                                <ul class="ko-testimonials-list">
                                    <li class="full"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" baseProfile="tiny" height="24px" id="Layer_1" version="1.2" viewBox="0 0 24 24" width="24px" xml:space="preserve"><g><path d="M9.362,9.158c0,0-3.16,0.35-5.268,0.584c-0.19,0.023-0.358,0.15-0.421,0.343s0,0.394,0.14,0.521    c1.566,1.429,3.919,3.569,3.919,3.569c-0.002,0-0.646,3.113-1.074,5.19c-0.036,0.188,0.032,0.387,0.196,0.506    c0.163,0.119,0.373,0.121,0.538,0.028c1.844-1.048,4.606-2.624,4.606-2.624s2.763,1.576,4.604,2.625    c0.168,0.092,0.378,0.09,0.541-0.029c0.164-0.119,0.232-0.318,0.195-0.505c-0.428-2.078-1.071-5.191-1.071-5.191    s2.353-2.14,3.919-3.566c0.14-0.131,0.202-0.332,0.14-0.524s-0.23-0.319-0.42-0.341c-2.108-0.236-5.269-0.586-5.269-0.586    s-1.31-2.898-2.183-4.83c-0.082-0.173-0.254-0.294-0.456-0.294s-0.375,0.122-0.453,0.294C10.671,6.26,9.362,9.158,9.362,9.158z"/></g></svg></li>
                                    <li class="full"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" baseProfile="tiny" height="24px" id="Layer_1" version="1.2" viewBox="0 0 24 24" width="24px" xml:space="preserve"><g><path d="M9.362,9.158c0,0-3.16,0.35-5.268,0.584c-0.19,0.023-0.358,0.15-0.421,0.343s0,0.394,0.14,0.521    c1.566,1.429,3.919,3.569,3.919,3.569c-0.002,0-0.646,3.113-1.074,5.19c-0.036,0.188,0.032,0.387,0.196,0.506    c0.163,0.119,0.373,0.121,0.538,0.028c1.844-1.048,4.606-2.624,4.606-2.624s2.763,1.576,4.604,2.625    c0.168,0.092,0.378,0.09,0.541-0.029c0.164-0.119,0.232-0.318,0.195-0.505c-0.428-2.078-1.071-5.191-1.071-5.191    s2.353-2.14,3.919-3.566c0.14-0.131,0.202-0.332,0.14-0.524s-0.23-0.319-0.42-0.341c-2.108-0.236-5.269-0.586-5.269-0.586    s-1.31-2.898-2.183-4.83c-0.082-0.173-0.254-0.294-0.456-0.294s-0.375,0.122-0.453,0.294C10.671,6.26,9.362,9.158,9.362,9.158z"/></g></svg></li>
                                    <li class="full"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" baseProfile="tiny" height="24px" id="Layer_1" version="1.2" viewBox="0 0 24 24" width="24px" xml:space="preserve"><g><path d="M9.362,9.158c0,0-3.16,0.35-5.268,0.584c-0.19,0.023-0.358,0.15-0.421,0.343s0,0.394,0.14,0.521    c1.566,1.429,3.919,3.569,3.919,3.569c-0.002,0-0.646,3.113-1.074,5.19c-0.036,0.188,0.032,0.387,0.196,0.506    c0.163,0.119,0.373,0.121,0.538,0.028c1.844-1.048,4.606-2.624,4.606-2.624s2.763,1.576,4.604,2.625    c0.168,0.092,0.378,0.09,0.541-0.029c0.164-0.119,0.232-0.318,0.195-0.505c-0.428-2.078-1.071-5.191-1.071-5.191    s2.353-2.14,3.919-3.566c0.14-0.131,0.202-0.332,0.14-0.524s-0.23-0.319-0.42-0.341c-2.108-0.236-5.269-0.586-5.269-0.586    s-1.31-2.898-2.183-4.83c-0.082-0.173-0.254-0.294-0.456-0.294s-0.375,0.122-0.453,0.294C10.671,6.26,9.362,9.158,9.362,9.158z"/></g></svg></li>
                                    <li class="full"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" baseProfile="tiny" height="24px" id="Layer_1" version="1.2" viewBox="0 0 24 24" width="24px" xml:space="preserve"><g><path d="M9.362,9.158c0,0-3.16,0.35-5.268,0.584c-0.19,0.023-0.358,0.15-0.421,0.343s0,0.394,0.14,0.521    c1.566,1.429,3.919,3.569,3.919,3.569c-0.002,0-0.646,3.113-1.074,5.19c-0.036,0.188,0.032,0.387,0.196,0.506    c0.163,0.119,0.373,0.121,0.538,0.028c1.844-1.048,4.606-2.624,4.606-2.624s2.763,1.576,4.604,2.625    c0.168,0.092,0.378,0.09,0.541-0.029c0.164-0.119,0.232-0.318,0.195-0.505c-0.428-2.078-1.071-5.191-1.071-5.191    s2.353-2.14,3.919-3.566c0.14-0.131,0.202-0.332,0.14-0.524s-0.23-0.319-0.42-0.341c-2.108-0.236-5.269-0.586-5.269-0.586    s-1.31-2.898-2.183-4.83c-0.082-0.173-0.254-0.294-0.456-0.294s-0.375,0.122-0.453,0.294C10.671,6.26,9.362,9.158,9.362,9.158z"/></g></svg></li>
                                    <li class="empty"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" baseProfile="tiny" height="24px" id="Layer_1" version="1.2" viewBox="0 0 24 24" width="24px" xml:space="preserve"><g><path d="M9.362,9.158c0,0-3.16,0.35-5.268,0.584c-0.19,0.023-0.358,0.15-0.421,0.343s0,0.394,0.14,0.521    c1.566,1.429,3.919,3.569,3.919,3.569c-0.002,0-0.646,3.113-1.074,5.19c-0.036,0.188,0.032,0.387,0.196,0.506    c0.163,0.119,0.373,0.121,0.538,0.028c1.844-1.048,4.606-2.624,4.606-2.624s2.763,1.576,4.604,2.625    c0.168,0.092,0.378,0.09,0.541-0.029c0.164-0.119,0.232-0.318,0.195-0.505c-0.428-2.078-1.071-5.191-1.071-5.191    s2.353-2.14,3.919-3.566c0.14-0.131,0.202-0.332,0.14-0.524s-0.23-0.319-0.42-0.341c-2.108-0.236-5.269-0.586-5.269-0.586    s-1.31-2.898-2.183-4.83c-0.082-0.173-0.254-0.294-0.456-0.294s-0.375,0.122-0.453,0.294C10.671,6.26,9.362,9.158,9.362,9.158z"/></g></svg></li>
                                </ul>
                                <h2>Experience unparalleled luxury and personalized service at Almaris Hotel, where every stay is a journey into sophistication, comfort, and unforgettable memories.</h2>
                                <p>Donette Fondren</p>
                            </div>
                        </li>
                        <li class="splide__slide">
                            <div class="ko-testimonials">
                                <ul class="ko-testimonials-list">
                                    <li class="full"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" baseProfile="tiny" height="24px" id="Layer_1" version="1.2" viewBox="0 0 24 24" width="24px" xml:space="preserve"><g><path d="M9.362,9.158c0,0-3.16,0.35-5.268,0.584c-0.19,0.023-0.358,0.15-0.421,0.343s0,0.394,0.14,0.521    c1.566,1.429,3.919,3.569,3.919,3.569c-0.002,0-0.646,3.113-1.074,5.19c-0.036,0.188,0.032,0.387,0.196,0.506    c0.163,0.119,0.373,0.121,0.538,0.028c1.844-1.048,4.606-2.624,4.606-2.624s2.763,1.576,4.604,2.625    c0.168,0.092,0.378,0.09,0.541-0.029c0.164-0.119,0.232-0.318,0.195-0.505c-0.428-2.078-1.071-5.191-1.071-5.191    s2.353-2.14,3.919-3.566c0.14-0.131,0.202-0.332,0.14-0.524s-0.23-0.319-0.42-0.341c-2.108-0.236-5.269-0.586-5.269-0.586    s-1.31-2.898-2.183-4.83c-0.082-0.173-0.254-0.294-0.456-0.294s-0.375,0.122-0.453,0.294C10.671,6.26,9.362,9.158,9.362,9.158z"/></g></svg></li>
                                    <li class="full"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" baseProfile="tiny" height="24px" id="Layer_1" version="1.2" viewBox="0 0 24 24" width="24px" xml:space="preserve"><g><path d="M9.362,9.158c0,0-3.16,0.35-5.268,0.584c-0.19,0.023-0.358,0.15-0.421,0.343s0,0.394,0.14,0.521    c1.566,1.429,3.919,3.569,3.919,3.569c-0.002,0-0.646,3.113-1.074,5.19c-0.036,0.188,0.032,0.387,0.196,0.506    c0.163,0.119,0.373,0.121,0.538,0.028c1.844-1.048,4.606-2.624,4.606-2.624s2.763,1.576,4.604,2.625    c0.168,0.092,0.378,0.09,0.541-0.029c0.164-0.119,0.232-0.318,0.195-0.505c-0.428-2.078-1.071-5.191-1.071-5.191    s2.353-2.14,3.919-3.566c0.14-0.131,0.202-0.332,0.14-0.524s-0.23-0.319-0.42-0.341c-2.108-0.236-5.269-0.586-5.269-0.586    s-1.31-2.898-2.183-4.83c-0.082-0.173-0.254-0.294-0.456-0.294s-0.375,0.122-0.453,0.294C10.671,6.26,9.362,9.158,9.362,9.158z"/></g></svg></li>
                                    <li class="full"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" baseProfile="tiny" height="24px" id="Layer_1" version="1.2" viewBox="0 0 24 24" width="24px" xml:space="preserve"><g><path d="M9.362,9.158c0,0-3.16,0.35-5.268,0.584c-0.19,0.023-0.358,0.15-0.421,0.343s0,0.394,0.14,0.521    c1.566,1.429,3.919,3.569,3.919,3.569c-0.002,0-0.646,3.113-1.074,5.19c-0.036,0.188,0.032,0.387,0.196,0.506    c0.163,0.119,0.373,0.121,0.538,0.028c1.844-1.048,4.606-2.624,4.606-2.624s2.763,1.576,4.604,2.625    c0.168,0.092,0.378,0.09,0.541-0.029c0.164-0.119,0.232-0.318,0.195-0.505c-0.428-2.078-1.071-5.191-1.071-5.191    s2.353-2.14,3.919-3.566c0.14-0.131,0.202-0.332,0.14-0.524s-0.23-0.319-0.42-0.341c-2.108-0.236-5.269-0.586-5.269-0.586    s-1.31-2.898-2.183-4.83c-0.082-0.173-0.254-0.294-0.456-0.294s-0.375,0.122-0.453,0.294C10.671,6.26,9.362,9.158,9.362,9.158z"/></g></svg></li>
                                    <li class="full"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" baseProfile="tiny" height="24px" id="Layer_1" version="1.2" viewBox="0 0 24 24" width="24px" xml:space="preserve"><g><path d="M9.362,9.158c0,0-3.16,0.35-5.268,0.584c-0.19,0.023-0.358,0.15-0.421,0.343s0,0.394,0.14,0.521    c1.566,1.429,3.919,3.569,3.919,3.569c-0.002,0-0.646,3.113-1.074,5.19c-0.036,0.188,0.032,0.387,0.196,0.506    c0.163,0.119,0.373,0.121,0.538,0.028c1.844-1.048,4.606-2.624,4.606-2.624s2.763,1.576,4.604,2.625    c0.168,0.092,0.378,0.09,0.541-0.029c0.164-0.119,0.232-0.318,0.195-0.505c-0.428-2.078-1.071-5.191-1.071-5.191    s2.353-2.14,3.919-3.566c0.14-0.131,0.202-0.332,0.14-0.524s-0.23-0.319-0.42-0.341c-2.108-0.236-5.269-0.586-5.269-0.586    s-1.31-2.898-2.183-4.83c-0.082-0.173-0.254-0.294-0.456-0.294s-0.375,0.122-0.453,0.294C10.671,6.26,9.362,9.158,9.362,9.158z"/></g></svg></li>
                                    <li class="full"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" baseProfile="tiny" height="24px" id="Layer_1" version="1.2" viewBox="0 0 24 24" width="24px" xml:space="preserve"><g><path d="M9.362,9.158c0,0-3.16,0.35-5.268,0.584c-0.19,0.023-0.358,0.15-0.421,0.343s0,0.394,0.14,0.521    c1.566,1.429,3.919,3.569,3.919,3.569c-0.002,0-0.646,3.113-1.074,5.19c-0.036,0.188,0.032,0.387,0.196,0.506    c0.163,0.119,0.373,0.121,0.538,0.028c1.844-1.048,4.606-2.624,4.606-2.624s2.763,1.576,4.604,2.625    c0.168,0.092,0.378,0.09,0.541-0.029c0.164-0.119,0.232-0.318,0.195-0.505c-0.428-2.078-1.071-5.191-1.071-5.191    s2.353-2.14,3.919-3.566c0.14-0.131,0.202-0.332,0.14-0.524s-0.23-0.319-0.42-0.341c-2.108-0.236-5.269-0.586-5.269-0.586    s-1.31-2.898-2.183-4.83c-0.082-0.173-0.254-0.294-0.456-0.294s-0.375,0.122-0.453,0.294C10.671,6.26,9.362,9.158,9.362,9.158z"/></g></svg></li>
                                </ul>
                                <h2>Experience unparalleled luxury and personalized service at Almaris Hotel, where every stay is a journey into sophistication, comfort, and unforgettable memories.</h2>
                                <p>Donette Fondren</p>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </section>
        <!-- --------------testimonials section end---------------- -->

        <!-- ----------accomodation section start----------- -->
        <section class="ko-accomodation">
            <div class="ko-container">
                <h3 class="ko-subtitle">Our Rooms</h3>
                <h2 class="ko-title">Accomodation</h2>
                <div class="ko-accomodation-cards-wrap">
                    <div class="ko-accomodation-card">
                        <div class="ko-accomodation-inner-card">
                            <div class="ko-accomodation-graphic">
                                <img src="/assets/images/room-img.webp" alt="room-img" />
                            </div>
                            <div class="ko-accomodation-card-content">
                                <h2>Presidential Suite</h2>
                                <ul class="ko-accomodation-list">
                                    <li>2 Guests</li>
                                    <li>35 Feets Size</li>
                                    <li>$199</li>
                                </ul>
                            </div>
                            <a class="ko-accomodation-btn" href="#">Book Now</a>
                        </div>
                    </div>
                    <div class="ko-accomodation-card">
                        <div class="ko-accomodation-inner-card">
                            <div class="ko-accomodation-graphic">
                                <img src="/assets/images/room2-img.webp" alt="room-img" />
                            </div>
                            <div class="ko-accomodation-card-content">
                                <h2>Presidential Suite</h2>
                                <ul class="ko-accomodation-list">
                                    <li>2 Guests</li>
                                    <li>35 Feets Size</li>
                                    <li>$199</li>
                                </ul>
                            </div>
                            <a class="ko-accomodation-btn" href="#">Book Now</a>
                        </div>
                    </div>
                    <div class="ko-accomodation-card">
                        <div class="ko-accomodation-inner-card">
                            <div class="ko-accomodation-graphic">
                                <img src="/assets/images/room-img.webp" alt="room-img" />
                            </div>
                            <div class="ko-accomodation-card-content">
                                <h2>Presidential Suite</h2>
                                <ul class="ko-accomodation-list">
                                    <li>2 Guests</li>
                                    <li>35 Feets Size</li>
                                    <li>$199</li>
                                </ul>
                            </div>
                            <a class="ko-accomodation-btn" href="#">Book Now</a>
                        </div>
                    </div>
                    <div class="ko-accomodation-card">
                        <div class="ko-accomodation-inner-card">
                            <div class="ko-accomodation-graphic">
                                <img src="/assets/images/room2-img.webp" alt="room-img" />
                            </div>
                            <div class="ko-accomodation-card-content">
                                <h2>Presidential Suite</h2>
                                <ul class="ko-accomodation-list">
                                    <li>2 Guests</li>
                                    <li>35 Feets Size</li>
                                    <li>$199</li>
                                </ul>
                            </div>
                            <a class="ko-accomodation-btn" href="#">Book Now</a>
                        </div>
                    </div>
                    <div class="ko-accomodation-card">
                        <div class="ko-accomodation-inner-card">
                            <div class="ko-accomodation-graphic">
                                <img src="/assets/images/room-img.webp" alt="room-img" />
                            </div>
                            <div class="ko-accomodation-card-content">
                                <h2>Presidential Suite</h2>
                                <ul class="ko-accomodation-list">
                                    <li>2 Guests</li>
                                    <li>35 Feets Size</li>
                                    <li>$199</li>
                                </ul>
                            </div>
                            <a class="ko-accomodation-btn" href="#">Book Now</a>
                        </div>
                    </div>
                    <div class="ko-accomodation-card">
                        <div class="ko-accomodation-inner-card">
                            <div class="ko-accomodation-graphic">
                                <img src="/assets/images/room2-img.webp" alt="room-img" />
                            </div>
                            <div class="ko-accomodation-card-content">
                                <h2>Presidential Suite</h2>
                                <ul class="ko-accomodation-list">
                                    <li>2 Guests</li>
                                    <li>35 Feets Size</li>
                                    <li>$199</li>
                                </ul>
                            </div>
                            <a class="ko-accomodation-btn" href="#">Book Now</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- ----------accomodation section end----------- -->

        <!-- --------------------facilities section start------------------- -->
        <section class="ko-facilities-section">
            <div class="ko-facilities-row">
                <div class="ko-facilities-col">
                    <div class="ko-facilities-imgblock">
                        <img src="assets/images/4-5.webp" alt="facilities" />
                        <h4>Stay</h4>
                    </div>
                    <div class="ko-facilities-content">
                        <h3>Stay</h3>
                        <p>Non ullamco magna qui non dolore sit ut proident quis ad ex nisi in esse sed occaecat dolore consectetur tempor nostrud sit laboris in nostrud sed cillum mollit irure excepteur nulla magna cupidatat magna officia eiusmod dolore.</p>
                        <a href="#" class="ko-btn">Read More</a>
                    </div>
                </div>
                <div class="ko-facilities-col">
                    <div class="ko-facilities-imgblock">
                        <img src="assets/images/4-5.webp" alt="facilities" />
                        <h4>Dine</h4>
                    </div>
                    <div class="ko-facilities-content">
                        <h3>Dine</h3>
                        <p>Non ullamco magna qui non dolore sit ut proident quis ad ex nisi in esse sed occaecat dolore consectetur tempor nostrud sit laboris in nostrud sed cillum mollit irure excepteur nulla magna cupidatat magna officia eiusmod dolore.</p>
                        <a href="#" class="ko-btn">Read More</a>
                    </div>
                </div>
                <div class="ko-facilities-col">
                    <div class="ko-facilities-imgblock">
                        <img src="assets/images/4-5.webp" alt="facilities" />
                        <h4>Offers</h4>
                    </div>
                    <div class="ko-facilities-content">
                        <h3>Offers</h3>
                        <p>Non ullamco magna qui non dolore sit ut proident quis ad ex nisi in esse sed occaecat dolore consectetur tempor nostrud sit laboris in nostrud sed cillum mollit irure excepteur nulla magna cupidatat magna officia eiusmod dolore.</p>
                        <a href="#" class="ko-btn">Read More</a>
                    </div>
                </div>
            </div>
        </section>
        <!-- --------------------facilities section end--------------------- -->

    </main>

    <!-- footer start -->
    <footer class="site-footer">
        <div class="ko-footer-top">
            <div class="ko-container">
                <div class="ko-footer-row">
                    <div class="ko-footer-wiget">
                        <div class="ko-inner-footer-content">
                            <h4>Address</h4>
                            <p>742 Evergreen Terrace Brooklyn, NY 11201</p>
                        </div>
                    </div>
                    <div class="ko-footer-wiget">
                        <div class="ko-inner-footer-content">
                            <div class="ko-footer-logo">
                                <img src="/assets/images/footer-logo.webp" alt="footer logo" />
                            </div>
                            <ul class="ko-footer-social">
                                <li>
                                    <a href="#" target="_blank">
                                        <svg class="ko-facebook-f" viewBox="0 0 320 512" xmlns="http://www.w3.org/2000/svg"><path d="M279.14 288l14.22-92.66h-88.91v-60.13c0-25.35 12.42-50.06 52.24-50.06h40.42V6.26S260.43 0 225.36 0c-73.22 0-121.08 44.38-121.08 124.72v70.62H22.89V288h81.39v224h100.17V288z"></path></svg>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" target="_blank">
                                        <svg class="ko-instagram" viewBox="0 0 448 512" xmlns="http://www.w3.org/2000/svg"><path d="M224.1 141c-63.6 0-114.9 51.3-114.9 114.9s51.3 114.9 114.9 114.9S339 319.5 339 255.9 287.7 141 224.1 141zm0 189.6c-41.1 0-74.7-33.5-74.7-74.7s33.5-74.7 74.7-74.7 74.7 33.5 74.7 74.7-33.6 74.7-74.7 74.7zm146.4-194.3c0 14.9-12 26.8-26.8 26.8-14.9 0-26.8-12-26.8-26.8s12-26.8 26.8-26.8 26.8 12 26.8 26.8zm76.1 27.2c-1.7-35.9-9.9-67.7-36.2-93.9-26.2-26.2-58-34.4-93.9-36.2-37-2.1-147.9-2.1-184.9 0-35.8 1.7-67.6 9.9-93.9 36.1s-34.4 58-36.2 93.9c-2.1 37-2.1 147.9 0 184.9 1.7 35.9 9.9 67.7 36.2 93.9s58 34.4 93.9 36.2c37 2.1 147.9 2.1 184.9 0 35.9-1.7 67.7-9.9 93.9-36.2 26.2-26.2 34.4-58 36.2-93.9 2.1-37 2.1-147.8 0-184.8zM398.8 388c-7.8 19.6-22.9 34.7-42.6 42.6-29.5 11.7-99.5 9-132.1 9s-102.7 2.6-132.1-9c-19.6-7.8-34.7-22.9-42.6-42.6-11.7-29.5-9-99.5-9-132.1s-2.6-102.7 9-132.1c7.8-19.6 22.9-34.7 42.6-42.6 29.5-11.7 99.5-9 132.1-9s102.7-2.6 132.1 9c19.6 7.8 34.7 22.9 42.6 42.6 11.7 29.5 9 99.5 9 132.1s2.7 102.7-9 132.1z"></path></svg>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" target="_blank">
                                        <svg class="ko-twitter" viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg"><path d="M459.37 151.716c.325 4.548.325 9.097.325 13.645 0 138.72-105.583 298.558-298.558 298.558-59.452 0-114.68-17.219-161.137-47.106 8.447.974 16.568 1.299 25.34 1.299 49.055 0 94.213-16.568 130.274-44.832-46.132-.975-84.792-31.188-98.112-72.772 6.498.974 12.995 1.624 19.818 1.624 9.421 0 18.843-1.3 27.614-3.573-48.081-9.747-84.143-51.98-84.143-102.985v-1.299c13.969 7.797 30.214 12.67 47.431 13.319-28.264-18.843-46.781-51.005-46.781-87.391 0-19.492 5.197-37.36 14.294-52.954 51.655 63.675 129.3 105.258 216.365 109.807-1.624-7.797-2.599-15.918-2.599-24.04 0-57.828 46.782-104.934 104.934-104.934 30.213 0 57.502 12.67 76.67 33.137 23.715-4.548 46.456-13.32 66.599-25.34-7.798 24.366-24.366 44.833-46.132 57.827 21.117-2.273 41.584-8.122 60.426-16.243-14.292 20.791-32.161 39.308-52.628 54.253z"></path></svg>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" target="_blank">
                                        <svg class="ko-youtube" viewBox="0 0 576 512" xmlns="http://www.w3.org/2000/svg"><path d="M549.655 124.083c-6.281-23.65-24.787-42.276-48.284-48.597C458.781 64 288 64 288 64S117.22 64 74.629 75.486c-23.497 6.322-42.003 24.947-48.284 48.597-11.412 42.867-11.412 132.305-11.412 132.305s0 89.438 11.412 132.305c6.281 23.65 24.787 41.5 48.284 47.821C117.22 448 288 448 288 448s170.78 0 213.371-11.486c23.497-6.321 42.003-24.171 48.284-47.821 11.412-42.867 11.412-132.305 11.412-132.305s0-89.438-11.412-132.305zm-317.51 213.508V175.185l142.739 81.205-142.739 81.201z"></path></svg>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="ko-footer-wiget">
                        <div class="ko-inner-footer-content">
                            <h4>Contact Us</h4>
                            <a href="tel:9876543210">T. +987 654 3210</a>
                            <a href="mailto:info@gmail.com">M. info@gmail.com</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="ko-copyright">
                <p>Copyright 2024 - Almaris by Reacthemes</p>
            </div>
        </div>
    </footer>
    <!-- footer end -->

    <!-- Page Loader start -->
    <div class="loader-wrap">
        <span class="loader"></span>
    </div>
    <!-- Page Loader end -->

    <!-- splide slider js -->
    <script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/js/splide.min.js"></script>
    <script src="assets/js/custom-script.js"></script>
</body>
</html>
