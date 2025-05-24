@extends('layouts.background')

@section('title', 'Admin Login')

@section('content')



  <div class="container mt-3 mb-3">

    <div class="mx-auto p-4 rounded-4 shadow login-container">
        <div class="text-center mb-2">
            <img src="{{ asset('/image/Image 2 3.jpg') }}" class="d-block mx-auto" alt="Logo">
          </div>
        <form method="POST" action="">
        @csrf

        <div class="mb-3">
          <input type="email" class="form-control" id="email" name="email" required placeholder="Email adress" />
        </div>

        <div class="mb-3">
          <input type="password" class="form-control" id="password" name="password" required placeholder="Password"/>
        </div>

        <button type="submit" class="btn d-block mx-auto px-4 py-2 rounded-pill fw-bold login-btn">Login</button>

        <br>

      </form>
    </div>
  </div>

  @endsection

