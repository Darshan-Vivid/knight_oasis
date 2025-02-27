<x-header :title="'My Account'" />

<main>
    <!-- banner section start-->
    <section class="ko-banner" style="background-image: url('assets/images/cart-banner.webp');">
        <div class="ko-container">
            <div class="ko-banner-content">
                <h2>My Account</h2>
                <p>Stay updated with the latest happenings at our hotel! From exciting events and special offers to
                    exclusive insights and behind-the-scenes stories.</p>
                <nav>
                    <ol class="ko-banner-list">
                        <li><a href="{{ route('view.home') }}">Home</a></li>
                        <li class="active">My Account</li>
                    </ol>
                </nav>
            </div>
        </div>
    </section>
    <!-- banner section end-->

    <!-- booking section start -->
    <section class="ko-booking-section">
        <div class="ko-container">
            <div class="ko-row">
                <div class="ko-col-3">
                    <div class="ko-myacc-tab-wrap">
                        <button class="ko-tablinks active" onclick="handleClick(event, 'tab1')"><span>My
                                account</span></button>
                        <button class="ko-tablinks" onclick="handleClick(event, 'tab2')"><span>Bookings</span></button>
                        <button class="ko-tablinks"
                            onclick="handleClick(event, 'tab3')"><span>Transations</span></button>
                    </div>
                </div>
                <div class="ko-col-9">
                    <div id="tab1" class="ko-tabcontent">
                        <h3>My account</h3>
                        <form action="{{ route('profile.update') }}" method="POST">
                            @csrf
                            <div class="ko-row">
                                <div class="ko-col-6">
                                    <div class="ko-loginRegister-grp">
                                        <label for="name">Name <sup>*</sup></label>
                                        <input type="text"
                                            class="ko-loginRegister-control @error('name') is-invalid @enderror"
                                            name="name" id="name" value="{{ old('name' , $user->name) }}" required />
                                        @error('name')
                                            <div class="invalid-response" style="display:flex">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="ko-col-6">
                                    <div class="ko-loginRegister-grp">
                                        <label for="email">Email address <sup>*</sup></label>
                                        <input type="email"
                                            class="ko-loginRegister-control @error('email') is-invalid @enderror"
                                            name="email" id="email" value="{{ old('email', $user->email) }}" required />
                                        @error('email')
                                            <div class="invalid-response" style="display:flex">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="ko-col-6">
                                    <div class="ko-loginRegister-grp">
                                        <label for="country">Country Code <sup>*</sup></label>
                                        <select name="country" id="country_code"
                                            data-url="{{ route(name: 'get.states') }}" class="ko-loginRegister-control">
                                            <option value="Please select country code" disabled selected>Please select
                                                country code</option>
                                            @foreach ($countries as $country)
                                                <option value="{{ $country->c_name }}"
                                                    data-country-code="{{ $country->c_code }}"
                                                    {{ $country->c_name == old('country',$user->country) ? 'selected' : '' }}>
                                                    {{ $country->c_code }} - {{ $country->c_name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('country')
                                            <div class="invalid-response" style="display:flex">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="ko-col-6">
                                    <div class="ko-loginRegister-grp">
                                        <label for="mobile">Phone Number<sup>*</sup></label>
                                        <input type="tel"
                                            class="ko-loginRegister-control @error('mobile') is-invalid @enderror"
                                            name="mobile" id="ko-register-mobile" value="{{ old('mobile',$user->mobile) }}"
                                            required />
                                        @error('mobile')
                                            <div class="invalid-response" style="display:flex">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="ko-col-12">
                                    <div class="ko-loginRegister-grp">
                                        <label for="state">State <sup>*</sup></label>
                                        <select name="state" data-value="{{ old('state', isset($sid->id) ? $sid->id:0 ) }}" id="state"
                                            class="ko-loginRegister-control">
                                            <option value="" disabled selected>Please select state</option>
                                            <!-- States will be populated here -->
                                        </select>
                                        @error('state')
                                            <div class="invalid-response" style="display:flex">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="ko-btn">Update</button>
                        </form>
                    </div>

                    <div id="tab2" class="ko-tabcontent">
                        <div class="ko-cart-table-wrap">
                            @if (count($bookings) > 0)
                                <table>
                                    <thead>
                                        <tr>
                                            <th>Rooms</th>
                                            <th></th>
                                            <th>Total cost</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($bookings as $booking)
                                            @php
                                                $room = \App\Models\Room::find($booking->room_id);
                                                if (isset($room->id)) {
                                                    $room_name = $room->name;
                                                    $room_profile = $room->feature_img;
                                                    $room_url = route('view.room', $room->slug);
                                                } else {
                                                    $room_name = 'Room Not Found';
                                                    $room_profile = '';
                                                    $room_url = '';
                                                }

                                                $services = json_decode($booking->services);

                                            @endphp
                                            <tr>
                                                <td>
                                                    <div class="ko-cart-room-img">
                                                        <a href="{{ $room_url }}" target="_blank">
                                                            <img src="{{ $room_profile }}" alt="room img">
                                                        </a>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="ko-room-details">
                                                        <h4>{{ $room_name }}</h4>
                                                        <ul>
                                                            <li>
                                                                <span><strong>Transection Id:
                                                                    </strong>{{ $booking->transaction_id }}</span>
                                                            </li>
                                                            <li>
                                                                <span><strong>Booking Date: </strong>
                                                                    {{ \Carbon\Carbon::parse($booking->created_at)->format('Y-m-d') }}</span>
                                                            </li>
                                                            <li>
                                                                <span>
                                                                    <strong>Check-In: </strong>
                                                                    {{ \Carbon\Carbon::parse($booking->check_in)->format('Y-m-d') }}
                                                                    <strong>Check-Out: </strong>
                                                                    {{ \Carbon\Carbon::parse($booking->check_out)->format('Y-m-d') }}
                                                                </span>
                                                            </li>
                                                            <li>
                                                                <span>
                                                                    <strong>Details: </strong>
                                                                    Room:<small>{{ $booking->room_count }}</small>,
                                                                    Extra Bed: <small>{{ $booking->adults }}</small>,
                                                                    Adult:<small>{{ $booking->adults }}</small>,
                                                                    Children:<small>{{ $booking->children }}</small>
                                                                </span>
                                                            </li>
                                                            @if (count($services) > 0)
                                                                <li class="ko-services-ty">
                                                                    <strong>seervices: </strong>
                                                                    <ul>
                                                                        @foreach ($services as $sid)
                                                                            @php
                                                                                $service = \App\Models\Service::find(
                                                                                    $sid,
                                                                                )->name;
                                                                            @endphp
                                                                            <li><span>{{ $service }}</span></li>
                                                                        @endforeach
                                                                    </ul>
                                                                </li>
                                                            @endif
                                                        </ul>

                                                    </div>
                                                </td>
                                                <td>₹<span id="ko_cart_cost_total">{{ $booking->total_cost }}</span>
                                                </td>
                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            @else
                                <div class="text-center">No Bookings Found</div>
                            @endif
                        </div>
                    </div>

                    <div id="tab3" class="ko-tabcontent">
                        @if (count($transactions) > 0)
                            <table class="ko-transation-content">
                                <thead>
                                    <tr>
                                        <th>transaction id</th>
                                        <th>method</th>
                                        <th>amount</th>
                                        <th>status</th>
                                        <th>date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($transactions as $transaction)
                                        <tr>
                                            <td>{{ $transaction->transaction_id }}</td>
                                            <td>{{ $transaction->method }}</td>
                                            <td>{{ $transaction->amount }}</td>
                                            <td>{{ $transaction->status == 1 ? 'PAID' : 'CANCELED' }}</td>
                                            <td>{{ $transaction->created_at }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @else
                            <div class="text-center">No Transactions Found</div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- booking section end -->

</main>

<script>
    $(document).ready(function() {
        get_states();
    });
</script>

<x-footer />
