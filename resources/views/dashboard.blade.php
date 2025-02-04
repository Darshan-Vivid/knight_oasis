<x-header :title="'Dashboard'" />

<div class="container mt-5">
    <h2>Dashboard</h2>

    @if (session()->has('message'))
        <div class="alert {{ session('success') ? 'alert-success' : 'alert-danger' }}" role="alert">
            {{ session('message') }}
        </div>
    @endif
</div>

<x-footer />
