<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- {{-- @stack('styles') --}} -->

    <!-- {{-- <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet"> --}} -->

    <!-- {{-- @vite([
    'resources/sass/app.scss',
    'resources/js/app.js',
    'public/css/homepage.css'
    ]) --}} -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <link rel="stylesheet" href="{{ asset('css/homepage.css') }}">
    <link rel="stylesheet" href="{{ asset('css/flight_search.css') }}">
    <link rel="stylesheet" href="{{ asset('css/template.css') }}">
    <link rel="stylesheet" href="{{ asset('css/departure.css') }}">
    <link rel="stylesheet" href="{{ asset('css/user_dashboard.css') }}">
    <link rel="stylesheet" href="{{ asset('css/edit_profile.css') }}">
    <link rel="stylesheet" href="{{ asset('css/cancel_change.css') }}">
    <link rel="stylesheet" href="{{ asset('css/contact_us.css') }}">
    <link rel="stylesheet" href="{{ asset('css/FAQ.css') }}">
    <link rel="stylesheet" href="{{ asset('css/rewards.css') }}">
    <link rel="stylesheet" href="{{ asset('css/flight_comparison.css') }}">
    <link rel="stylesheet" href="{{ asset('css/notifications.css') }}">
    <link rel="stylesheet" href="{{ asset('css/selected_flight.css') }}">
    <link rel="stylesheet" href="{{ asset('css/payment.css') }}">
    <link rel="stylesheet" href="{{ asset('css/user_management.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin_dashboard.css') }}">
    <link rel="stylesheet" href="{{ asset('css/manage_flight.css') }}">
    <link rel="stylesheet" href="{{ asset('css/create_user.css') }}">
    <link rel="stylesheet" href="{{ asset('css/edit_user.css') }}">
    <link rel="stylesheet" href="{{ asset('css/manage_flight.css') }}">

    <script type="module "src="{{ asset('js/bootstrap.js') }}"></script>
    <!-- {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" /> --}} -->
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-lg shadow-sm header-nav">
            <div class="container-fluid d-flex align-items-center justify-content-between px-0">
                <a class="navbar-brand" href="{{ route('home') }}"> <img src="/image/Image 2 3.jpg" alt="Aurora Airways Logo" class="logo-img">
                </a>

                <ul class="navbar-nav mx-auto d-flex flex-row">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('home') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('user.dashboard') }}">My bookings</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Check in</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('flight_search') }}">Flights</a>
                    </li>
                </ul>

                <div class="d-flex align-items-center nav-icons ms-auto">
                    <i class="fa-solid fa-magnifying-glass fa-lg"></i>
                    <i class="fa-solid fa-globe ms-3 fa-lg"></i>
                    <i class="fa-solid fa-bell ms-3 fa-lg"></i>

                    @guest
                        <a href="{{ route('login') }}" class="btn  ms-2">Login</a>
                    @else
                        <div class="dropdown ms-2">
                            <button class="btn  dropdown-toggle user_dropdown" type="button" id="userDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                                {{ Auth::user()->full_name }}
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                               <li><a class="dropdown-item" href="{{ route('user.dashboard') }}" >My Profile</a></li>
                                <li><a class="dropdown-item" href="{{ route('edit.profile') }}">Edit Profile</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li>
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <button type="submit" class="dropdown-item">Logout</button>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    @endguest
                </div>
            </div>
        </nav>
        <main class="py-0">
            @yield('content')
        </main>


        <footer class="py-4">
            <div class="container-fluid footer-container">
                <div class="row row-cols-1 row-cols-md-4">
                    <div class="col">
                        <h4 class="pb-2 mb-3">Customer Service</h4>
                        <ul class="list-unstyled">
                            <li><a href="{{ route('contact_us') }}">Contact Us</a></li>
                            <li><a href="{{ route('FAQ') }}">FAQ</a></li>
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
            </div>
                <div class="subfooter d-flex justify-content-between pt-3 mt-3">
                    <p class="small">Aurora Airways Canada Ltd.</p>
                    <p class="small">All rights reserved.</p>
                    <p class="small">&copy; 2025 Aurora Airways group</p>
                </div>

        </footer>

    </div>
</body>
</html>
