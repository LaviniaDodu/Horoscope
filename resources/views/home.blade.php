@extends('layouts.app')
@section('content')

    <div class="container my-5">
        <div class="row">
            <div class="col-12 text-center">
                <h1 class="mb-4">
                    The horoscope says that today everything will be fine, to someone else...
                </h1>
                <hr>
            </div>
        </div>
    </div>
    <div class="container mt-5 text-center">
        @if(count($horoscopes) == 0)
            <h2 class="mb-4">
                We don't have any predictions to show you at the moment, some data needs to be imported.
            </h2>
            <a href="{{ route('horoscope.index') }}" type="button" class="btn border-main text-main">Import page <i class="fa-solid fa-share"></i></a>
        @else
            <div class="my-5">
                <div class="row text-start">
                    <div class="col-12">
                        <h2 class="fst-italic">Choose you're sign!</h2>
                        <hr class="text-main">
                        <div class="fst-italic fs-4">Let's see what the stars has in plan for you...</div>
                    </div>
                </div>
                <div class="row mt-4 justify-content-center align-items-center d-flex">
                    @foreach($signs as $sign => $date)
                        <div class="col-6 col-md-4 col-lg-1 justify-content-between">
                            <a href="{{ route('horoscope.show', $sign) }}" class="btn text-decoration-none">
                                <img src="{{ asset('img/'.$sign.'.png') }}" class="img-fluid" width="100px">
                                <h4 class="m_title">{{ $sign }}</h4>
                                <div class="text-secondary">{{ $date }}</div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="row text-end">
                <div class="col-12">
                    <h2 class="fst-italic">Insert you're birthday!</h2>
                    <hr class="text-main">
                    <div class="fst-italic fs-4">We can show you amazing things! Just insert you're birthday below</div>
                </div>
            </div>
            <div class="row my-4">
                <div class="col-12 justify-content-center d-flex mb-3">
                    <input type="date" name="date" class="form-control mx-3" onchange="sendData()" id="dateInput">
                </div>
            </div>
        @endif
    </div>

@endsection
