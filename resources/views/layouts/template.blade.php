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

                <ul class="navbar-nav mx-auto d-flex flex-row">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">My bookings</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Check in</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Flights</a>
                    </li>
                </ul>

                <div class="d-flex align-items-center ">
                    <i class="fa-solid fa-magnifying-glass"></i>
                    <i class="fa-solid fa-globe"></i>
                    <i class="fa-solid fa-bell"></i>

                    <button class="btn btn-outline-primary">Login</button>
                </div>
            </div>
        </nav>
        <main class="py-0">
            @yield('content')
        </main>


        <footer class="py-4">
            <div class="container-fluid">
                <div class="row row-cols-1 row-cols-md-4">
                    <div class="col">
                        <h4 class="pb-2 mb-3">Customer Service</h4>
                        <ul class="list-unstyled">
                            <li><a href="#">Contact Us</a></li>
                            <li><a href="#">FAQ</a></li>
                        </ul>
                    </div>
                    <div class="col">
                        <h4 class="pb-2 mb-3">Inspiration</h4>
                        <ul class="list-unstyled">
                            <li><a href="#">Travel Guides</a></li>
                            <li><a href="#">Flight Schedules</a></li>
                        </ul>
                    </div>
                    <div class="col">
                        <h4 class="pb-2 mb-3">About Us</h4>
                        <ul class="list-unstyled">
                            <li><a href="#">Our Story</a></li>
                            <li><a href="#">Careers</a></li>
                            <li><a href="#">Our Community</a></li>
                            <li><a href="#">Sustainability</a></li>
                            <li><a href="#">Publicity</a></li>
                        </ul>
                    </div>
                    <div class="col">
                        <h4 class="pb-2 mb-3">Connect with us</h4>
                        <div class="d-flex flex-column flex-md-row flex-wrap gap-3">
                            <a href="#"><i class="fa-solid fa-comment"></i></a>
                            <a href="#"><i class="fa-brands fa-twitter"></i></a>
                            <a href="#"><i class="fa-brands fa-facebook-f"></i></a>
                            <a href="#"><i class="fa-brands fa-instagram"></i></a>
                            <a href="#"><i class="fa-brands fa-youtube"></i></a>
                            <a href="#"><i class="fa-brands fa-snapchat"></i></a>
                        </div>
                    </div>
                </div>
                <div class="subfooter d-flex justify-content-between pt-3 mt-3">
                    <p class="small">Aurora Airways Canada Ltd.</p>
                    <p class="small">All rights reserved.</p>
                    <p class="small">&copy; 2025 Aurora Airways group</p>
                </div>
            </div>
        </footer>

    </div>
</body>
</html>
