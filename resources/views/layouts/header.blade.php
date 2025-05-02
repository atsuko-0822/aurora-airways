<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    {{-- <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet"> --}}

    {{-- @vite([
    'resources/sass/app.scss',
    'resources/js/app.js',
    'public/css/homepage.css',
    'public/css/flight_search.css'
    ]) --}}

    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
  <link rel="stylesheet" href="{{ asset('css/homepage.css') }}">
  <link rel="stylesheet" href="{{ asset('css/flight_search.css') }}">


    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" /> --}}
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-lg bg-white shadow-sm" style="height:50px;">
            <div class="container-fluid d-flex align-items-center justify-content-between px-0">
                <a class="navbar-brand" href="/"> <img src="/image/logo.jpeg" alt="Aurora Airways Logo" class="logo-img" style="max-height: 100%; height: 50px;">
                </a>

                <div class="d-flex flex-grow-1 justify-content-between align-items-center">
                    <ul class="navbar-nav mx-auto d-flex flex-row gap-4" style="color: #0F384A;">
                        <li class="nav-item">
                            <a class="nav-link" href="#" style="color: #0F384A;">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#" style="color: #0F384A;">My bookings</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#" style="color: #0F384A;">Check in</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#" style="color: #0F384A;">Flights</a>
                        </li>
                    </ul>

                    <div class="d-flex align-items-center gap-3 me-4" style="color: #3E8BAC;">
                        <i class="fa-solid fa-magnifying-glass"></i>
                        <i class="fa-solid fa-globe"></i>
                        <i class="fa-solid fa-bell"></i>
                        <button class="btn btn-outline-primary" style="color: #3E8BAC; border-color: #3E8BAC;">Login</button>
                    </div>
                </div>
            </div>
        </nav>
        <main class="py-0">
            @yield('content')
        </main>
    </div>
</body>
</html>
