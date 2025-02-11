<x-header :title="'Dashboard'" />

<div class="container mt-5">
    <h2>Dashboard</h2>

    @if (session()->has('message'))
        <div class="alert {{ session('success') ? 'alert-success' : 'alert-danger' }}" role="alert">
            {{ session('message') }}
        </div>
    @endif

    <pre>
        {{ $user }}
    </pre>


    <!--Buttons: Login | Signup | Logout -->
    <div class="mt-4">
        <a href="{{ route('login') }}" class="btn btn-primary">Login</a>
        <a href="{{ route('view.signup') }}" class="ml-2 btn btn-success">Signup</a>
        <a href="{{ route('auth.logout') }}" class="ml-2 btn btn-danger">Logout</a>
    </div>
</div>

<x-footer />
