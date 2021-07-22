@extends("admin.layouts.master")
@section('sidebar')
    <nav id="navbar-main" class="navbar navbar-horizontal navbar-transparent navbar-main navbar-expand-lg navbar-light">
        <div class="container">
            <a class="navbar-brand" href="dashboard.html">
                <img src="{{ dashboard_asset('img/brand/white.png') }}">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-collapse"
                aria-controls="navbar-collapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="navbar-collapse navbar-custom-collapse collapse" id="navbar-collapse">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a href="{{ route('login') }}" class="nav-link">
                            <span class="nav-link-inner--text">Login</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
@endsection
@section('app')
    <div class="header bg-gradient-primary py-6 py-lg-6 pt-lg-6">
        <div class="container">
            <div class="header-body text-center mb-7">
                <div class="row justify-content-center">
                    <div class="col-xl-5 col-lg-6 col-md-8 px-5">
                        <h1 class="text-white">Welcome!</h1>
                    </div>
                </div>
            </div>
        </div>
        <div class="separator separator-bottom separator-skew zindex-100">
            <svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1"
                xmlns="http://www.w3.org/2000/svg">
                <polygon class="fill-default" points="2560 0 2560 100 0 100"></polygon>
            </svg>
        </div>
    </div>
    <!-- Page content -->
    <div class="container mt--8 pb-5">
        <div class="row justify-content-center">
            <div class="col-lg-5 col-md-7">
                <div class="card bg-secondary border-0 mb-0">

                    <div class="card-body px-lg-5 py-lg-5">
                        <div class="text-center text-muted mb-4">
                            <small>{{ __('Verify Your Email Address') }}</small>
                        </div>
                        <form role="form" method="POST" action="{{ route('verification.resend') }}">
                            @csrf
                            <small> {{ __('Before proceeding, please check your email for a verification link.') }}
                                {{ __('If you did not receive the email') }},</small>
                            <div class="text-center">
                                <button type="submit"
                                    class="btn btn-primary my-4">{{ __('click here to request another') }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
