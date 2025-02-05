<x-header :title="'Otp Verification'" />

<div class="container mt-5">
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
            <input type="email" class="form-control" id="email" name="email" value="{{ $email ?? old('email') }}"
                required readonly>
        </div>

        <div class="form-group">
            <label for="otp">OTP:</label>
            <input type="text" class="form-control @error('otp') is-invalid @enderror" id="otp" name="otp" required>
            @error('otp')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Verify</button>
    </form>
</div>
<x-footer />
