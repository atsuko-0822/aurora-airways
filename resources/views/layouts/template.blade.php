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
    'public/css/homepage.css'
    ]) --}}
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <link rel="stylesheet" href="{{ asset('css/homepage.css') }}">
    <link rel="stylesheet" href="{{ asset('css/flight_search.css') }}">
    <link rel="stylesheet" href="{{ asset('css/template.css') }}">


    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" /> --}}
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-lg shadow-sm header-nav" style="height:50px;">
            <div class="container-fluid d-flex align-items-center justify-content-between px-0">
                <a class="navbar-brand" href="/"> <img src="/image/Image 2 3.jpg" alt="Aurora Airways Logo" class="logo-img" style="max-height: 100%; height: 50px;">
                </a>

                <ul class="navbar-nav mx-auto d-flex flex-row" style="color: #0F384A;">
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

                <div class="d-flex align-items-center " style="color: #3E8BAC;">
                    <i class="fa-solid fa-magnifying-glass" style="font-size: 1.7em;"></i>
                    <i class="fa-solid fa-globe" style="font-size: 1.7em;"></i>
                    <i class="fa-solid fa-bell" style="font-size: 1.7em;"></i>

                    <button class="btn btn-outline-primary" style="color: #3E8BAC; border-color: #3E8BAC; font-size: 1.1em; padding: 0.3em 0.7em;">Login</button>
                </div>
            </div>
        </nav>
        <main class="py-0">
            @yield('content')
        </main>


        <footer class="text-light py-4" style="color: #0F384A !important;">
            <div class="container-fluid">
                <div class="row row-cols-1 row-cols-md-4">
                    <div class="col">
                        <h4 class="pb-2 mb-3">Customer Service</h4>
                        <ul class="list-unstyled">
                            <li><a href="#"  style="color: #0F384A; text-decoration: none;">Contact Us</a></li>
                            <li><a href="#"  style="color: #0F384A; text-decoration: none;">FAQ</a></li>
                        </ul>
                    </div>
                    <div class="col">
                        <h4 class="pb-2 mb-3">Inspiration</h4>
                        <ul class="list-unstyled">
                            <li><a href="#" style="color: #0F384A; text-decoration: none;">Travel Guides</a></li>
                            <li><a href="#" style="color: #0F384A; text-decoration: none;">Flight Schedules</a></li>
                        </ul>
                    </div>
                    <div class="col">
                        <h4 class="pb-2 mb-3">About Us</h4>
                        <ul class="list-unstyled">
                            <li><a href="#"  style="color: #0F384A; text-decoration: none;">Our Story</a></li>
                            <li><a href="#"  style="color: #0F384A; text-decoration: none;">Careers</a></li>
                            <li><a href="#"  style="color: #0F384A; text-decoration: none;">Our Community</a></li>
                            <li><a href="#"  style="color: #0F384A; text-decoration: none;">Sustainability</a></li>
                            <li><a href="#"  style="color: #0F384A; text-decoration: none;">Publicity</a></li>
                        </ul>
                    </div>
                    <div class="col">
                        <h4 class="pb-2 mb-3">Connect with us</h4>
                        <div class="d-flex flex-column flex-md-row flex-wrap gap-3" style="max-width: 150px;">
                            <a href="#" style="color: #0F384A; font-size: 2.0em; width: 25%; display: inline-block; text-align: center;"><i class="fa-solid fa-comment"></i></a>
                            <a href="#" style="color: #0F384A; font-size: 2.0em; width: 25%; display: inline-block; text-align: center;"><i class="fa-brands fa-twitter"></i></a>
                            <a href="#" style="color: #0F384A; font-size: 2.0em; width: 25%; display: inline-block; text-align: center;"><i class="fa-brands fa-facebook-f"></i></a>
                            <a href="#" style="color: #0F384A; font-size: 2.0em; width: 25%; display: inline-block; text-align: center;"><i class="fa-brands fa-instagram"></i></a>
                            <a href="#" style="color: #0F384A; font-size: 2.0em; width: 25%; display: inline-block; text-align: center;"><i class="fa-brands fa-youtube"></i></a>
                            <a href="#" style="color: #0F384A; font-size: 2.0em; width: 25%; display: inline-block; text-align: center;"><i class="fa-brands fa-snapchat"></i></a>
                        </div>
                    </div>
                </div>
                <div class="subfooter d-flex justify-content-between pt-3 mt-3" style="padding-left: 0; padding-right: 0; margin-left: -12px; margin-right: -12px; color: #0F384A !important;">
                    <p class="small">Aurora Airways Canada Ltd.</p>
                    <p class="small">All rights reserved.</p>
                    <p class="small">&copy; 2025 Aurora Airways group</p>
                </div>
            </div>
        </footer>

    </div>
</body>
</html>
