@extends('layouts.layout')
@section('content')
    <div class="container">
        <div class="tm-row">
            <div class="tm-col-left"></div>
            <main class="tm-col-right">
                <div class="form-group row mb-0">
                    <div class="col-md-6 offset-md-4">
                        @if(\App\Models\Roles::where('name','SYS_ADMIN'))
                            <button type="submit" class="btn btn-primary">
                                <a class="btn btn-primary" href="{{ action('HomeController@userLogin') }}"  >take token </a>
                            </button>
                        @endif
                    </div>
                </div>
            </main>
        </div>
    </div>
@endsection


