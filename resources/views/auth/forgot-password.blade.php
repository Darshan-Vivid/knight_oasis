<x-header :title="'Forgot Password'" />
<div class="container" style="margin-top: 100px;">
    <h2 class="mb-4">Forgot Password</h2>

    @if (session()->has('message'))
        <div class="alert {{ session('success') ? 'alert-success' : 'alert-danger' }}" role="alert">
            {{ session('message') }}
        </div>
    @endif

    <form action="{{ route('auth.password.otp') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email"
                value="{{ old('email') }}" required>
            @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Get OTP</button>
    </form>

</div>
<x-footer />
