@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1>Imported file dettails</h1>
                <hr>
            </div>
        </div>
        @if (session('message'))
            <div class="alert alert-warning">
                {{  session('message') }}
            </div>
        @endif
        @if(count($horoscopes) == 0)
            <div class="row">
                <div class="col-12">
                    <h2>No data found, please import a file Excel or Csv</h2>
                </div>
            </div>
            <form class="mt-5" action="{{ route('import') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group mb-4">
                    <div class="custom-file text-left align-items-center justify-content-between d-flex">
                        <input type="file" name="file" class="form-control custom-file-input" id="customFile">
                        <label class="custom-file-label" for="customFile">
                            <i class="fa-regular fa-folder-open fa-2x ms-1"></i>
                        </label>
                    </div>
                </div>
                <div class="text-start">
                    <button class="btn border-main text-main"><i class="fa-solid fa-upload"></i> Upload...</button>
                </div>
            </form>
        @else
        <div class="row">
            <div class="col-6 justify-content-start d-flex">
                <a class="btn text-main border rounded-5" href="{{ route('home') }}">Go to home page <i class="fa-solid fa-house"></i></a>
            </div>
            <div class="col-6 justify-content-end d-flex">
                <a class="btn text-main border rounded-5" href="{{ route('export-horoscope') }}">Export all <i class="fa-solid fa-file"></i></a>
                <button type="button" class="btn border-danger text-danger ms-2 rounded-5" onclick="deleteAll()">
                    Delete all <i class="fa-solid fa-folder-minus text-danger"></i>
                </button>
            </div>
            <div class="col-12 mt-5">
                <div class="table-responsive">
                    <table class="table align-middle">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Sign</th>
                            <th>Date</th>
                            <th>Prediction</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($horoscopes as $horoscope)
                            <tr>
                                <td>{{ $horoscope->id }}</td>
                                <td class="m_title">{{ $horoscope->sign }}</td>
                                <td>{{ date('M D Y', strtotime($horoscope->date)) }}</td>
                                <td>{{ $horoscope->description }}</td>
                                <td>
                                    <button type="button" class="btn" onclick="edit('{{ $horoscope->id }}', '{{ date('Y-m-d', strtotime($horoscope->date)) }}', '{{ $horoscope->sign }}', '{{ $horoscope->description }}')">
                                        <i class="fa-solid fa-pen-fancy"></i>
                                    </button>
                                </td>
                                <td>
                                    <button type="button" class="btn" onclick="deleteRecord('{{ $horoscope->id }}', '{{ date('M D Y', strtotime($horoscope->date)) }}', '{{ $horoscope->sign }}')">
                                        <i class="fa-solid fa-folder-minus text-danger"></i>
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <x-nav.links :horoscopes="$horoscopes"/>
                <x-modal.delete/>
                <x-modal.edit :signs="$signs"/>
            </div>
        </div>
        @endif
    </div>

@endsection
