@extends('layouts.layout')
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
                                    <a class="dropdown-item" href={{action('Tenant\TenantController@service')}}>Customer management</a>
                                    <a class="dropdown-item" href="#">Device management</a>
                                    <a class="dropdown-item" href="#">Asset management</a>
                                </div>
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
    <div class="tm-row">
        <div class="tm-col-left"></div>
        <main class="tm-col-right tm-contact-main"> <!-- Content -->
            <section class="tm-content tm-contact">
                <h2 class="mb-4 tm-content-title">Create New Customer</h2>
                <p class="mb-85"></p>
                <form id="contact-form" action={{__('createCustomer')}} method="POST">
                    @csrf
                    <div class="form-group mb-4">
                        <input type="text" name="name" class="form-control" placeholder="Name" required="" />
                    </div>
                    <div class="form-group mb-4">
                        <input type="email" name="email" class="form-control" placeholder="Email" required="" />
                    </div>
                    <div class="form-group mb-4">
                        <input type="text" name="address" class="form-control" placeholder="Address" required="" />
                    </div>
                    <div class="form-group mb-4">
                        <input type="text" name="city" class="form-control" placeholder="City" required="" />
                    </div>
                    <div class="form-group mb-4">
                        <input type="text" name="phone" class="form-control" placeholder="Phone" required="" />
                    </div>
                    <div class="form-group mb-4">
                        <input type="text" name="title" class="form-control" placeholder="Title" required="" />
                    </div>
                    <div class="text-right">
                        <button type="submit" class="btn btn-big btn-primary">Send It</button>
                    </div>
                </form>
            </section>
        </main>
    </div>
        @endsection

