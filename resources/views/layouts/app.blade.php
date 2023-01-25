<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta name="description" content="Horoscope">
    <meta name="author" content="Dodu Lavinia">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Set images/favicon.png -->
    <link rel="icon" type="image/png" href="{{ asset('img/logo.png') }}"/>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <script src="https://cdn.jsdelivr.net/npm/axios@1.1.2/dist/axios.min.js"></script>

</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md shadow navbar-dark" id="navbar-menu">
            <div class="container-fluid">
                <a class="navbar-brand text-main" href="{{ route('home') }}">
                    <img src="{{ asset('img/logo.png') }}" width="50px" class="img-fluid">
                </a>
                <div class="vl"></div>
                <button class="navbar-toggler border-main" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="text-main">
                        <i class="fa-solid fa-ellipsis-vertical"></i>
                    </span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">
                        <a class="navbar-brand text-main" href="{{ route('home') }}">
                            HOME
                        </a>
                        @if(Auth::check())
                            <a class="navbar-brand text-main" href="{{ route('horoscope.index') }}">
                                IMPORTED
                            </a>
                        @endif
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link text-main" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link text-main" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <i class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle text-main" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </i>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
    <footer class="footer mt-auto py-3 bg-white shadow">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-6 align-items-center justify-content-end d-flex">
                    <span class="text-main">
                        <img src="{{ asset('img/logo.png') }}" width="40px" class="img-fluid">
                         © 2023 HOROSCOPE
                    </span>
                </div>
                <div class="col-12 col-md-6 align-items-center justify-content-start d-flex">
                    <span>by Dodu Lavinia
                        <img src="{{ asset('img/logo_LD.png') }}" width="30px" class="img-fluid">
                    </span>
                </div>
            </div>
        </div>
    </footer>
</body>
</html>
