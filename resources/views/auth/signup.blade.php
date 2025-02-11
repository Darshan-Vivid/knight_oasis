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
                                    <select name="country_code" id="country_code" class="ko-loginRegister-control">
                                        <option value="Please select country code" disabled selected>Please select
                                            country code</option>
                                        @foreach ($countries as $country)
                                            <option value="{{ $country->c_code }}"
                                                data-country-name="{{ $country->c_name }}">
                                                {{ $country->c_code }} - {{ $country->c_name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('country_code')
                                        <div class="invalid-response" style="display:flex">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="ko-col-6">
                                <div class="ko-loginRegister-grp">
                                    <label for="email">Phone Number<sup>*</sup></label>
                                    <span class="ko-tel-code"></span>
                                    <input type="tel"
                                        class="ko-loginRegister-control @error('mobile') is-invalid @enderror"
                                        name="mobile" id="mobile" value="{{ old('mobile') }}" required />
                                    @error('mobile')
                                        <div class="invalid-response" style="display:flex">Invalid mobile number</div>
                                    @enderror
                                </div>
                            </div>

                            {{-- <div class="ko-col-6">
                                <div class="ko-loginRegister-grp">
                                    <label for="mobile">Phone Number <sup>*</sup></label>
                                    <div class="ko-loginRegister-phone">
                                        <select name="country_code" id="country_code" class="ko-loginRegister-control">
                                            <option value="" disabled selected>Please select country code</option>
                                            @foreach ($countries as $country)
                                                <option value="{{ $country->c_code }}" 
                                                        data-country-name="{{ $country->c_name }}">
                                                    {{ $country->c_code }} - {{ $country->c_name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <input type="tel"
                                            class="ko-loginRegister-control @error('mobile') is-invalid @enderror"
                                            name="mobile" id="mobile" value="{{ old('mobile') }}" required />
                                    </div>
                                    @error('mobile')
                                        <div class="invalid-response" style="display:flex">Invalid mobile number</div>
                                    @enderror
                                </div>
                            </div> --}}
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
                        <p>A link to set a new password will be sent to your email address.</p>
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
        // let allCodes = @json($countries); // Fetch all country codes from PHP

       /*  $("#mobile").on("input", function() {
            let inputVal = $(this).val(); // Get user input
            if (inputVal.startsWith("+")) {
                let matchedCodes = allCodes.filter(code => code.startsWith(inputVal)); // Match codes
                $("#country_code").empty(); // Clear previous options

                if (matchedCodes.length > 0) {
                    matchedCodes.forEach(code => {
                        $("#country_code").append(
                            `<option value="${code}">${code}</option>`); // Add matched codes
                    });
                } else {
                    allCodes.forEach(code => {
                        $("#country_code").append(
                            `<option value="${code}">${code}</option>`); // Restore all codes
                    });
                }
            }
        }); */
    });
    $(document).ready(function() {
        $('#country_code').select2({
            placeholder: "Search country code...",
            allowClear: true,
            width: '100%'
        });
    });

    $(document).ready(function() {
        $('#country_code').change(function() {
            var countryCode = $(this).val();
            var countryName = $("#country_code option:selected").data(
                "country-name"); // Get country name
            $('#state').empty();
            $('#state').append('<option value="" disabled selected>Please select state</option>');

            if (countryCode && countryName) {
                $.ajax({
                    url: '/states',
                    type: 'GET',
                    data: {
                        country_code: countryCode,
                        country_name: countryName
                    }, // Send both code and name
                    dataType: 'json',
                    success: function(data) {
                        $.each(data, function(key, value) {
                            $('#state').append('<option value="' + key + '">' +
                                value + '</option>');
                        });
                    },
                    error: function() {
                        console.log('Error fetching states');
                    }
                });
            }
        });
    });

    $(document).ready(function() {
        $("#country_code").change(function() {
            var countryCode = $(this).val();
            var currentValue = $("#mobile").val();

            currentValue = currentValue.replace(/^\+\d+\s*/, "");
            $("#mobile").parent().find('.ko-tel-code').text(countryCode);
            // $("#mobile").val("" + countryCode + " " + currentValue);
        });
    });
</script>
<x-footer />
