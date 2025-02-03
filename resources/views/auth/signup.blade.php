<x-header :title="'Signup'" />
<div class="container mt-5">
    <h2 class="mb-4">Signup</h2>
    <form action="{{ route('auth.signup') }}" method="POST">
        @csrf

        @if (session('message'))
            <div class="alert alert-success" role="alert">
                {{ session('message') }}
            </div>
        @endif

        <!-- Name Field -->
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"
                value="{{ old('name', 'admin') }}" required>
            @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Email Field -->
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                name="email" value="{{ old('email', 'admin@gmail.com') }}" required>
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
                    name="country_code" value="{{ old('country_code', '+91') }}" required>
                <!-- Phone Number Input -->
                <input type="tel" class="form-control phone-number @error('mobile') is-invalid @enderror"
                    id="mobile" name="mobile" value="{{ old('mobile', '9632145780') }}" required>
            </div>
            @error('mobile')
                <div class="invalid-feedback">Invalid mobile number</div>
            @enderror
        </div>

        <!-- State Field -->
        <div class="form-group">
            <label for="state">State:</label>
            <input type="text" class="form-control @error('state') is-invalid @enderror" id="state"
                name="state" value="{{ old('state', 'gujrat') }}" required>
            @error('state')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Country Field -->
        <div class="form-group">
            <label for="country">Country:</label>
            <input type="text" class="form-control @error('country') is-invalid @enderror" id="country"
                name="country" value="{{ old('country', 'india') }}" required>
            @error('country')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Password Field -->
        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" class="form-control @error('password') is-invalid @enderror" id="password"
                name="password" value="{{ old('password', '123456') }}" required>
            @error('password')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Confirm Password Field -->
        <div class="form-group">
            <label for="password_confirmation">Confirm Password:</label>
            <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror"
                id="password_confirmation" name="password_confirmation"
                value="{{ old('password_confirmation', '123456') }}" required>
            @error('password_confirmation')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Submit Button -->
        <button type="submit" class="btn btn-primary">Signup</button>
    </form>
</div>
<x-footer />
