<x-header :title="'Login'" />
<div class="container" style="margin-top: 100px;">
    <h2 class="mb-4">Login</h2>

    @if (session()->has('message'))
        <div class="alert {{ session('success') ? 'alert-success' : 'alert-danger' }}" role="alert">
            {{ session('message') }}
        </div>
    @endif

    <form action="{{ route('auth.login') }}" method="POST">
        @csrf

        <!-- Email Field -->
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email"
                value="{{ old('email') }}" required>
            @error('email')
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

        <!-- Remember Me Checkbox -->
        <div class="form-group form-check">
            <input type="checkbox" class="form-check-input" id="remember" name="remember">
            <label class="form-check-label" for="remember">Remember Me</label>
        </div>

        <!-- Submit Button -->
        <button type="submit" class="btn btn-primary">Signup</button>

        <!-- Forgot Password Link -->
        <div class="form-group">
            <a href="">Forgot Password?</a>
        </div>
    </form>
</div>
<x-footer />
