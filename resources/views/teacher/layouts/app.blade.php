@extends('teacher.layouts.master')
@section('sidebar')
    @include('teacher.layouts.partials.left-sidebar')
@endsection
@section('app')
    @include('teacher.layouts.partials.navbar', ["user" => auth()->user()])
    <div class="header bg-primary pb-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    @yield('breadcrumbs', Breadcrumbs::render('teacher.dashboard'))
                </div>
                <!-- Card stats -->
                @hasSection('header')
                    @yield('header')
                @endif
            </div>
        </div>
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--6">
        @yield('content')

        <!-- Footer -->
        @include('teacher.layouts.partials.footer')
    </div>
@endsection
