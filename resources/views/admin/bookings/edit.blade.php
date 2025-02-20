<x-admin.header :title="'Edit Booking'" />


<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header d-flex align-items-center">
                <div class="flex-grow-1">
                    <h5 class="mb-4 card-title">Edit Booking</h5>
                </div>
            </div>
        </div>
    </div>
</div>

@php

    $g = json_decode($booking->customer_details);

    $guest['name'] = '--';  
    $guest['email'] = '--';
    $guest['phone'] = '--';
    $guest['address'] = '--';

    $is_user = false;

    if (isset($booking->user_id)) {
        $g = App\Models\User::find($booking->user_id);
        $guest['name'] = $g->name;  
        $guest['email'] = $g->email;
        $guest['phone'] = $g->mobile;
        $guest['address'] = $g->state.", ".$g->country;
        $is_user = true;
    } elseif (strlen($g->name > 0)) {
        $guest['name'] = $g->name;  
        $guest['email'] = $g->email;
        $guest['phone'] = $g->phone;
        $guest['address'] = $g->address;
    }

@endphp

<form class="store-blogs" action="" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-xxl-4">
                            <h5 class="mb-3 card-title">Guest Information</h5>
                            <p class="text-muted">Guest Information refers to the data related to guest wants to book the room.</p>
                        </div>
                        <div class="col-xxl-8">

                            <div class="mb-3">
                                <label for="guest_full_name" class="form-label">Full Name <span class="text-danger">*</span></label>
                                <input type="text" name="guest_full_name" id="guest_full_name" class="form-control @error('guest_full_name') is-invalid @enderror" placeholder="Enter full name of guest" value="{{ old('guest_full_name',$guest['name']) }}" required {{ $is_user ? "disabled":''}}>
                                @error('guest_full_name')
                                    <span class="form-error-message text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="guest_email" class="form-label">Email <span class="text-danger">*</span></label>
                                <input type="email" name="guest_email" id="guest_email" class="form-control @error('guest_email') is-invalid @enderror" placeholder="Enter email address of guest" value="{{ old('guest_email', $guest['email']) }}" required {{ $is_user ? "disabled":''}}>
                                @error('guest_email')
                                    <span class="form-error-message text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="guest_phone" class="form-label">Contact No. <span class="text-danger">*</span></label>
                                <input type="tel" name="guest_phone" id="guest_phone" class="form-control @error('guest_phone') is-invalid @enderror" placeholder="Enter phone number of guest" value="{{ old('guest_phone', $guest['phone']) }}" required {{ $is_user ? "disabled":''}}>
                                @error('guest_phone')
                                    <span class="form-error-message text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="guest_address" class="form-label">Address</label>
                                <input type="text" name="guest_address" id="guest_address" class="form-control @error('guest_address') is-invalid @enderror" placeholder="Enter address of guest" value="{{ old('guest_address',$guest['address']) }}" {{ $is_user ? "disabled":''}}>
                                @error('guest_address')
                                    <span class="form-error-message text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



</form>






<x-admin.footer />