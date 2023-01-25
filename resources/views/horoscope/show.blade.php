@extends('layouts.app')
@section('content')

    <div class="container-fluid mt-2">
        <div class="mb-4 text-center">
            @if(isset($sign))
                <h1>You're sign is...</h1>
                <img src="{{ asset('img/'.$sign.'.png') }}" class="img-fluid" width="150px">
                <h2 class="m_title fst-italic">{{ $sign }}</h2>
            @else
                @foreach($signs as $sign => $date)
                    <a href="{{ route('horoscope.show', $sign) }}" class="btn text-decoration-none">
                        <img src="{{ asset('img/'.$sign.'.png') }}" class="img-fluid" width="80px">
                        <h4 class="m_title">{{ $sign }}</h4>
                        <div class="text-secondary">{{ $date }}</div>
                    </a>
                @endforeach
            @endif
                <hr class="text-main">
        </div>
        @if (session('message'))
            <div class="alert alert-warning fs-4">
                {{  session('message') }}
            </div>
        @endif
        <x-cards.card :horoscopes="$horoscopes"/>
        <x-nav.links :horoscopes="$horoscopes"/>
        <x-modal.delete/>
        <x-modal.edit :signs="$signs"/>
    </div>

@endsection
