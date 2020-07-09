@extends('layouts.layout')
@section('titile') Welcome @endsection
@section('navbar')
    <div class="tm-col-right">
        <nav class="navbar navbar-expand-lg" id="tm-main-nav">
            <button class="navbar-toggler toggler-example mr-0 ml-auto" type="button"
                    data-toggle="collapse" data-target="#navbar-nav"
                    aria-controls="navbar-nav" aria-expanded="false" aria-label="Toggle navigation">
                <span><i class="fas fa-bars"></i></span>
            </button>
            <div class="collapse navbar-collapse tm-nav" id="navbar-nav">
                <ul class="navbar-nav text-uppercase">
                    <li class="nav-item active">
                        <a class="nav-link tm-nav-link" href={{__('home')}}>Home <span class="sr-only">(current)</span></a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link tm-nav-link" href="#">Services</a>
                    </li>

                    <!-- Authentication Links -->
                    @guest
                        <li class="nav-item">
                            <a class="nav-link tm-nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link tm-nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link tm-nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                            @endif
                        </li>
                </ul>
            </div>
        </nav>
    </div>
@endsection
@section('content')
    <div>
        <div class="tm-row">
            <div class="tm-col-left"></div>
            <main class="tm-col-right">
                <section class="tm-content">
                    <h2 class="mb-5 tm-content-title">Welcome in Advertisement management system</h2>
                    <p class="mb-5">Device management, User management, Upload and control advertisement </p>
                    <hr class="mb-5">
                    <p class="mb-5">For try our service you must be login</p>
                    <a class="btn btn-primary" href="{{ route('register') }}" {{__('Register')}} >Let's Go...</a>
                </section>
            </main>
        </div>
    </div>
    @endsection


