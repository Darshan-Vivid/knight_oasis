<x-header :title="'Signup'" />
<main>
    <section class="ko-loginRegister-section ko-register-section">
        <div class="ko-container">
            <div class="ko-loginRegister-wrap">
                <h1 class="ko-loginRegister-title">Register</h1>
                <div class="ko-loginRegister-from">
                    @if (session()->has('message'))
                        <div class="alert {{ session('success') ? 'alert-success' : 'alert-danger' }}" role="alert">
                            {{ session('message') }}
                        </div>
                    @endif
                    <form action="{{ route('auth.signup') }}" method="POST">
                        @csrf
                        <div class="ko-row">
                            <div class="ko-col-6">
                                <div class="ko-loginRegister-grp">
                                    <label for="name">Name <sup>*</sup></label>
                                    <input type="text"
                                        class="ko-loginRegister-control @error('name') is-invalid @enderror"
                                        name="name" id="name" value="{{ old('name') }}" required />
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
                                        name="email" id="email" value="{{ old('email') }}" required />
                                    @error('email')
                                        <div class="invalid-response" style="display:flex">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="ko-col-6">
                                <div class="ko-loginRegister-grp">
                                    <label for="mobile">Country Code <sup>*</sup></label>
                                    <select name="country" id="country_code" class="ko-loginRegister-control">
                                        <option value="Please select country code" disabled selected>Please select country code</option>
                                        @foreach ($countries as $country)
                                            <option
                                                value="{{ $country->c_name }}"
                                                data-country-code="{{ $country->c_code }}"
                                                {{ $country->c_name == old('country') ? 'selected' : '' }}>
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
                                    <label for="email">Phone Number<sup>*</sup></label>
                                    <input type="tel"
                                        class="ko-loginRegister-control @error('mobile') is-invalid @enderror"
                                        name="mobile" id="ko-register-mobile" value="{{ old('mobile') }}" required />
                                    @error('mobile')
                                        <div class="invalid-response" style="display:flex">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="ko-col-12">
                                <div class="ko-loginRegister-grp">
                                    <label for="state">State <sup>*</sup></label>
                                    <select name="state" id="state" class="ko-loginRegister-control">
                                        <option value="" disabled selected>Please select state</option>
                                        <!-- States will be populated here -->
                                    </select>
                                    @error('state')
                                        <div class="invalid-response" style="display:flex">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="ko-col-12">
                                <div class="ko-loginRegister-grp">
                                    <label for="password">Password <sup>*</sup></label>
                                    <input type="password"
                                        class="ko-loginRegister-control @error('password') is-invalid @enderror"
                                        name="password" id="password" required />
                                    @error('password')
                                        <div class="invalid-response" style="display:flex">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="ko-col-12">
                                <div class="ko-loginRegister-grp">
                                    <label for="password_confirmation">Confirm Password <sup>*</sup></label>
                                    <input type="password"
                                        class="ko-loginRegister-control @error('password_confirmation') is-invalid @enderror"
                                        name="password_confirmation" id="password_confirmation" required />
                                    @error('password_confirmation')
                                        <div class="invalid-response" style="display:flex">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <p>An on time password for verify you email will be sent to your email address.</p>
                        <p>Your personal data will be used to support your experience throughout this website, to manage
                            access to your account, and for other purposes described in our <a href="#">Privacy
                                policy</a>.</p>
                        <button type="submit" class="ko-btn">Register</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
</main>
<script>

    $(document).ready(function() {
        $('#country_code').select2({
            placeholder: "Search country code...",
            allowClear: true,
            width: '100%'
        });

        $('#country_code').change(function() {
            get_states();
            var countryCode = $("#country_code option:selected").data("country-code");
            $('#ko-register-mobile').val(countryCode);
        });

        function get_states(){
            var countryName = $("#country_code").val();
            var countryCode = $("#country_code option:selected").data("country-code");
            $('#state').empty();
            $('#state').append('<option value="" disabled selected>Please select state</option>');


            if (countryCode && countryName) {
                $.ajax({
                    url: '{{ route(name: "get.states") }}',
                    type: 'post',
                    data: {
                        country_code: countryCode,
                        country_name: countryName,
                        _token: '{{ csrf_token() }}'
                    },
                    dataType: 'json',
                    success: function(data) {
                        var oldState = "{{ old('state') }}";

                        $.each(data, function(key, value) {
                            var selected = (key == oldState) ? 'selected' : '';
                            $('#state').append('<option value="' + key + '" ' + selected + '>' + value + '</option>');
                        });
                    },
                    error: function() {
                        console.log('Error fetching states');
                    }
                });
            }
        }

        get_states();
    });
</script>
<x-footer />
