@extends('admin.layouts.master')
@section('sidebar')
    @include('admin.layouts.partials.left-sidebar')
@endsection
@section('app')
    @include('admin.layouts.partials.navbar')
    <div class="header bg-primary pb-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    @include('admin.layouts.partials.breadcrumb')
                    <div class="col-lg-6 col-5 text-right">
                        <a href="#" class="btn btn-sm btn-neutral">New</a>
                        <a href="#" class="btn btn-sm btn-neutral">Filters</a>
                    </div>
                </div>
                <!-- Card stats -->
                @include('admin.layouts.partials.header')
            </div>
        </div>
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--6">
        @yield('content')

        <!-- Footer -->
        @include('admin.layouts.partials.footer')
    </div>
@endsection
