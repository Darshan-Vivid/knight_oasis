<x-header :title="'Signup'" />
<div class="container" style="margin-top: 100px;">
    <h2 class="mb-4">Signup</h2>

    @if (session()->has('message'))
        <div class="alert {{ session('success') ? 'alert-success' : 'alert-danger' }}" role="alert">
            {{ session('message') }}
        </div>
    @endif

    <form action="{{ route('auth.signup') }}" method="POST">
        @csrf
        <!-- Name Field -->
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"
                value="{{ old('name') }}" required>
            @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Email Field -->
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email"
                value="{{ old('email') }}" required>
            @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Mobile Field -->
        <div class="form-group">
            <label for="mobile">Phone:</label>
            <div class="phone-input-group">
                <!-- Country Code Dropdown -->
                <input type="text" class="form-control country-code @error('country_code') is-invalid @enderror"
                    name="country_code" value="{{ old('country_code') }}" placeholder="+91" required>
                <!-- Phone Number Input -->
                <input type="tel" class="form-control phone-number @error('mobile') is-invalid @enderror" id="mobile"
                    name="mobile" value="{{ old('mobile') }}" required>
            </div>
            @error('mobile')
                <div class="invalid-feedback">Invalid mobile number</div>
            @enderror
        </div>

        <!-- State Field -->
        <div class="form-group">
            <label for="state">State:</label>
            <input type="text" class="form-control @error('state') is-invalid @enderror" id="state" name="state"
                value="{{ old('state') }}" required>
            @error('state')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>


        <!-- Password Field -->
        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" class="form-control @error('password') is-invalid @enderror" id="password"
                name="password" required>
            @error('password')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Confirm Password Field -->
        <div class="form-group">
            <label for="password_confirmation">Confirm Password:</label>
            <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror"
                id="password_confirmation" name="password_confirmation" required>
            @error('password_confirmation')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Submit Button -->
        <button type="submit" class="btn btn-primary">Signup</button>
    </form>
</div>
<x-footer />
