<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>@yield('title', 'Background')</title>
  {{-- @vite(['resources/css/app.css', 'resources/css/font.css', 'resources/js/bootstrap.link.js']) --}}
  @vite(['resources/sass/app.scss', 'resources/js/app.js'])
  <link rel="stylesheet" href="{{ asset('css/registration.css') }}">
  <link rel="stylesheet" href="{{ asset('css/flight_search.css') }}">

</head>
<body class="bg-light g-gradient-custom" >
    @yield('content')
</body>
</html>
