<x-header :title="'Otp Verification'" />
<div class="container mt-5">
    <h2 class="mb-4">Verify Email and OTP</h2>
    <form action="{{ route('auth.otp_verify') }}" method="POST">
        @csrf

        @if (session('message'))
            <div class="alert alert-success" role="alert">
                {{ session('message') }}
            </div>
        @endif

        <!-- Email Field -->
        <div class="form-group">
            <label for="email">Email:</label>
            <!-- Use readonly instead of disabled -->
            <input type="email" class="form-control" id="email" name="email" value="{{ session('email') ?? old('email') }}" required readonly>
        </div>

        <!-- OTP Field -->
        <div class="form-group">
            <label for="otp">OTP:</label>
            <input type="text" class="form-control @error('otp') is-invalid @enderror" id="otp"
                name="otp" required>
            @error('otp')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Submit Button -->
        <button type="submit" class="btn btn-primary">Verify</button>
    </form>
</div>
<x-footer />
