<!DOCTYPE html>

<head>

    <!-- Basic Page Needs -->
    <title>Knight Oasis | Admin Panel</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @include('admin.layouts.head-css')
</head>

<body>
    <!-- Wrapper -->
    <div id="wrapper">
        {{-- @include('admin.layouts.topbar') --}}
        <!-- Dashboard -->
        <div id="dashboard">
            {{-- @include('admin.layouts.sidebar') --}}

            <!-- Content -->
            <div class="dashboard-content">
                @yield('content')

                {{-- @include('admin.layouts.footer') --}}

            </div>
            <!-- Content / End -->

        </div>
        <!-- Dashboard / End -->
    </div>
    <!-- Wrapper / End -->
    @include('admin.layouts.scripts')
</body>

</html>
