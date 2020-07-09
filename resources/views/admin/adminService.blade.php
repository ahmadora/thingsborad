@extends('layouts.layout')
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
                        <a class="nav-link tm-nav-link" href={{__('adminService')}}>Your Service</a>
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
    <div class="container">
        <div class="tm-row">
            <div class="tm-col-left"></div>
            <main class="tm-col-right">
                <section class="tm-content">
                    <div class="media my-3 mb-5 tm-service-media tm-service-media-img-l">
{{--                        <img src="img/services-1.png" class="rounded float-left" alt="tm-service-img">--}}
                        <img src="img/services-1.jpg" alt="Image" class="tm-service-img">
                        <div class="media-body tm-service-text">
                            <h2 class="mb-4 tm-content-title">Best Services for you</h2>
                            <p></p>
                            <button type="button" class="btn btn-secondary"> <a href="{{__('createTenant')}}">Create New Tenant</a></button>
                        </div>
                    </div>
                    <div class="media my-3 mb-5 tm-service-media">
                        <div class="media-body tm-service-text">
                            <h2 class="mb-4 tm-content-title">Customer Satisfaction</h2>
                            <p></p>
                            <button type="button" class="btn btn-secondary"> <a href="{{__('showAllTenant')}}"> Show All Tenant</a></button>
                        </div>
                        <img src="img/services-2.jpg" alt="Image" class="tm-service-img-r">
                    </div>
                    <div class="media my-3 tm-service-media tm-service-media-img-l">
                        <img src="img/services-3.jpg" alt="Image" class="tm-service-img">
                        <div class="media-body tm-service-text">
                            <h2 class="mb-4 tm-content-title">Template Usage</h2>
                            <button type="button" class="btn btn-secondary"> <a href="{{__('showAllTenant')}}"> Show All Tenant</a></button>
                            <p></p>
                            <p></p>
                        </div>
                    </div>
                </section>
            </main>
        </div>
    </div>
    @endsection
