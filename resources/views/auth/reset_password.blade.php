<x-header :title="'New Password'" />
<div class="container" style="margin-top: 100px;">
    <h2 class="mb-4">New Password</h2>

    @if (session()->has('message'))
        <div class="alert {{ session('success') ? 'alert-success' : 'alert-danger' }}" role="alert">
            {{ session('message') }}
        </div>
    @endif

    <form action="{{ route('auth.password') }}" method="POST">
        @csrf
        <input type="hidden" name="token" value="{{ $token }}">
        <div class="form-group">
            <label for="password">New Password:</label>
            <input type="password" class="form-control @error('password') is-invalid @enderror" id="password"
                name="password" required>
            @error('password')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="password_confirmation">Confirm Password:</label>
            <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" id="password_confirmation"
                name="password_confirmation" required>
            @error('password_confirmation')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

</div>
<x-footer />
