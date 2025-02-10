<x-header :title="'Otp Verification'" />
<main>
    <section class="ko-loginRegister-section ko-register-section">
        <div class="ko-container">
            <div class="ko-loginRegister-wrap">
                <h1 class="ko-loginRegister-title">Verify email and OTP</h1>
                <div class="ko-loginRegister-from">
                    <form action="{{ route('auth.otp_verify') }}" method="POST">
                        @csrf
                        @if (isset($message))
                            <div class="alert alert-danger" role="alert">
                                {{ $message }}
                            </div>
                        @endif
                        <div class="ko-row">
                            <div class="ko-col-12">
                                <div class="ko-loginRegister-grp">
                                    <label for="email">Email address <sup>*</sup></label>
                                    <input type="email" class="ko-loginRegister-control" name="email" id="email"
                                        value="{{ $email ?? old('email') }}" required readonly />
                                </div>
                            </div>
                            <div class="ko-col-12">
                                <div class="ko-loginRegister-grp">
                                    <label for="otp">OTP</label>
                                    <input type="text"
                                        class="ko-loginRegister-control @error('otp') is-invalid @enderror"
                                        name="otp" id="otp" required />
                                    @error('otp')
                                    <div class="invalid-response" style="display:flex">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="ko-btn">Verify</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
</main>

{{-- <div class="container" style="margin-top: 100px;">
    <h2 class="mb-4">Verify Email and OTP</h2>
    <form action="{{ route('auth.otp_verify') }}" method="POST">
        @csrf

        @if (isset($message))
            <div class="alert alert-danger" role="alert">
                {{ $message }}
            </div>
        @endif

        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control" id="email" name="email"
                value="{{ $email ?? old('email') }}" required readonly>
        </div>

        <div class="form-group">
            <label for="otp">OTP:</label>
            <input type="text" class="form-control @error('otp') is-invalid @enderror" id="otp" name="otp"
                required>
            @error('otp')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Verify</button>
    </form>
</div> --}}
<x-footer />
