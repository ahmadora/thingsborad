@extends('layouts.layout')
@section('title') Index @endsection
@section('navbar')
    <div class="tm-col-right">
        <nav class="navbar navbar-expand-lg " id="tm-main-nav">
            <div class="collapse navbar-collapse" id="collapsibleNavbar">
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
                    <li  class="nav-item">
                        <div class="nav-item dropdown" >
                        <a  class="nav-link tm-nav-link"  href="#" id="navbardrop" role="button" data-toggle="dropdown">
                            Services
                        </a>
                        <div class="dropdown-menu">
                            @if(\Illuminate\Support\Facades\Auth::user()->id == 2)
                            <a class="dropdown-item" href={{action('Tenant\TenantController@service')}}>Customer management</a>
                            <a class="dropdown-item" href="#">Device management</a>
                            <a class="dropdown-item" href="#">Asset management</a>
                        </div>@endif
                        </div>
                    </li>
                    <li class="nav-item">
                        <div class="nav-item dropdown" >
                            <a  class="nav-link tm-nav-link"  href="#" id="navbardrop" role="button" data-toggle="dropdown">browser</a>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="#">Customers</a>
                                <a class="dropdown-item" href="#">Devices</a>
                            </div>
                        </div>
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
            </div>
        </nav>
    </div>
@endsection
@section('content')
    <div class="container">
        <div class="tm-row">
            <div class="tm-col-left"></div>
            <main class="tm-col-right">
                @if(\Illuminate\Support\Facades\Auth::user()->id ==2)
                <section class="tm-content">
                    <h2 class="mb-5 tm-content-title">Hello Admin You Are Here Take Your Token And Go To Enjoy </h2>
                    <hr class="mb-5">
                        <a class="btn btn-primary" href={{ action('HomeController@userLogin') }}>take token </a>
                </section>
                    @endif
            </main>
        </div>
    </div>
@endsection
