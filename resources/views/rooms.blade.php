<x-header :title="'Rooms'" />

    <main>
        <!-- banner section -->
        <section class="ko-banner" style="background-image: url('assets/images/cart-banner.webp');">
            <div class="ko-container">
                <div class="ko-banner-content">
                    <h2>Our Rooms</h2>
                    <p>Indulge in the ultimate blend of elegance and comfort in our meticulously designed rooms. Choose your room today.</p>
                    <nav>
                        <ol class="ko-banner-list">
                            <li><a href="{{ route('view.home') }}">Home</a></li>
                            <li><a>Rooms</a></li>
                        </ol>
                    </nav>
                </div>
            </div>
        </section>

        <section class="ko-roomlist-section">
            <div class="ko-container">
                <div class="ko-row">

                    @if(count($rooms)> 0)
                        @foreach ($rooms as $room)
                            <div class="ko-col-4">
                                <div class="ko-roomitem-inner">
                                    <img src="{{ asset($room->feature_img) }}" alt="Thumbnail" class="thumbnail">
                                    <div class="ko-roompricing-info">
                                        <div class="ko-roompricing-infoinner">
                                            <div class="label">From</div>
                                            <h3 class="price"><del>₹{{ $room->price }}</del></h3>
                                            <h3 class="price">₹{{ $room->offer_price }}</h3>
                                            <a class="details-btn" href="{{ route('view.room', $room->slug ) }}">View Details</a>
                                        </div>
                                    </div>

                                    <div class="ko-roomdetails-info">
                                        <div class="ko-roomdetails-infoinner">
                                            <h3 class="title">{{ $room->name }}</h3>
                                            <div class="ko-roomcapacities">
                                                <span class="capacity">{{ $room->allowd_guests }} Guests</span>
                                                <span class="capacity">{{ $room->size }} Feets Size</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif

                </div>
            </div>
        </section>
    </main>

    <!-- footer start -->

    <x-footer />