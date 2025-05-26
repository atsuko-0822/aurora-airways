@extends('layouts.background')

@section('title', 'Admin Login')

@section('content')



  <div class="container mt-3 mb-3">

    <div class="mx-auto p-4 rounded-4 shadow login-container">
        <div class="text-center mb-2">
            <img src="{{ asset('/image/Image 2 3.jpg') }}" class="d-block mx-auto" alt="Logo">
          </div>
        <form method="POST" action="{{ route('admin.login.submit') }}">
        @csrf

        <div class="mb-3">
          <input type="email" class="form-control" id="email" name="email" required placeholder="Email adress" />
        </div>

        <div class="mb-3 position-relative">
          <input type="password" class="form-control" id="password" name="password" required placeholder="Password"/>
           <span class="position-absolute top-50 end-0 translate-middle-y me-3" onclick="togglePassword()" style="cursor: pointer;">
    <i class="fa-solid fa-eye" id="toggleEye"></i>
  </span>
        </div>

        <button type="submit" class="btn d-block mx-auto px-4 py-2 rounded-pill fw-bold login-btn">Login</button>

        <br>

      </form>
    </div>
  </div>

  <script src="{{ asset('js/admin_login.js') }}"></script>

  @endsection

