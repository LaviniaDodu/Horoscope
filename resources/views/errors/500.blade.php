@extends('layouts.app')
@section('content')

    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <h1>505</h1>
                <h2 class="fst-italic">Sorry, it's me, not you. :(</h2>
            </div>
            <hr>
            <div class="col-12 mt-5">
                <h4>Maybe you'll like to turn back to the home page?</h4>
                <a class="btn border-main text-main" href="{{ route('home') }}">
                    Home page <i class="fa-solid fa-house-chimney"></i>
                </a>
            </div>
        </div>
    </div>

@endsection
