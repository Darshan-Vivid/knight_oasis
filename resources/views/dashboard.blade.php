<x-header :title="'Dashboard'" />

<div class="container mt-5">
    <h2>Dashboard</h2>

    @if(session('message'))
        <div class="alert alert-info" role="alert">
            {{ session('message') }}
        </div>
    @endif
</div>

<x-footer />
