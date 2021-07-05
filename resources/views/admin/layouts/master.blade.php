<!DOCTYPE html>
<html lang="" dir="">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
    <meta name="author" content="Creative Tim">
    <title>@yield('title', env('APP_NAME') ?? 'Laravel')</title>
    <link rel="icon" href="{{dashboard_asset('img/brand/favicon.png')}}" type="image/png">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
    <link rel="stylesheet" href="{{dashboard_asset('vendor/nucleo/css/nucleo.css')}}" type="text/css">
    <link rel="stylesheet" href="{{dashboard_asset('vendor/@fortawesome/fontawesome-free/css/all.min.css')}}"
        type="text/css">
    <link rel="stylesheet" href="{{dashboard_asset('css/argon.css?v=1.2.0')}}" type="text/css">
    @stack('style')
</head>

<body>
    <!-- Sidenav -->
    @include('admin.layouts.partials.left-sidebar')
    <!-- Main content -->
    <div class="main-content" id="panel">
        <!-- Topnav -->
        @include('admin.layouts.partials.navbar')
        <!-- Header -->
        <!-- Header -->
        @yield('app')
    </div>
    <!-- Argon Scripts -->
    <!-- Core -->
    <script src="{{dashboard_asset('vendor/jquery/dist/jquery.min.js')}}"></script>
    <script src="{{dashboard_asset('vendor/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{dashboard_asset('vendor/js-cookie/js.cookie.js')}}"></script>
    <script src="{{dashboard_asset('vendor/jquery.scrollbar/jquery.scrollbar.min.js')}}"></script>
    <script src="{{dashboard_asset('vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js')}}"></script>
    <!-- Optional JS -->
    <script src="{{dashboard_asset('vendor/chart.js/dist/Chart.min.js')}}"></script>
    <script src="{{dashboard_asset('vendor/chart.js/dist/Chart.extension.js')}}"></script>
    <!-- Argon JS -->
    <script src="{{dashboard_asset('js/argon.js?v=1.2.0')}}"></script>
    @stack('scripts')
</body>

</html>
