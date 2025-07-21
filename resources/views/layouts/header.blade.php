<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>


    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
  <link rel="stylesheet" href="{{ asset('css/homepage.css') }}">
  <link rel="stylesheet" href="{{ asset('css/flight_search.css') }}">


</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-lg bg-white shadow-sm" style="height:50px;">
            <div class="container-fluid d-flex align-items-center justify-content-between px-0">
                <a class="navbar-brand" href="/"> <img src="/image/logo.jpeg" alt="Aurora Airways Logo" class="logo-img">
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
