@extends('layouts.background')

@section('title', 'User Login')

@section('content')



  <div class="container mt-3 mb-3">

    <div class="mx-auto p-4 rounded-4 shadow login-container">
        <div class="text-center mb-2">
            <img src="{{ asset('/image/Image 2 3.jpg') }}" class="d-block mx-auto" alt="Logo">
          </div>
        <h3 class="mb-3 display-6 fw-bold text-center">Welcome!</h3>
        <form method="POST" action="{{ route('authenticate') }}">
        @csrf

        <div class="mb-3">
          <input type="email" class="form-control" id="email" name="email" required placeholder="Email adress" />
        </div>

        <div class="mb-3">
          <input type="password" class="form-control" id="password" name="password" required placeholder="Password"/>
        </div>

        <button type="submit" class="btn d-block mx-auto px-4 py-2 rounded-pill fw-bold login-btn">Login</button>

        <br>

        <a href="" class="text-decoration-none text-center d-block">Forget password?</a>

        <br>

        <div class="mb-3">
            <a href="{{ route('google.login') }}" class="btn d-flex align-items-center justify-content-center google-btn w-75 mx-auto">
                <i class="fa-brands fa-google me-2"></i>
                Sign in with Google
            </a>
          </div>

          <div class="mb-3">
            <a href="{{ route('facebook.login') }}" class="btn d-flex align-items-center justify-content-center facebook-btn w-75 mx-auto">
                <i class="fa-brands fa-facebook-f me-2"></i>
                Sign in with Facebook
           </a>
          </div>

          <a href="" class="text-decoration-none text-center d-block">or</a>

          <br>

          <a href="{{ route('user_registration.show') }}" class="text-decoration-none text-center d-block">Create account</a>


      </form>
    </div>
  </div>

  @endsection

