@extends('layouts.template')

@section('title', 'Rewards')

@section('content')

<section class="hero position-relative text-center">
    <img src="/image/6C8FB442-06FE-48B8-A1EA-96EBE698E8D5_1_201_a.jpeg" class="img-fluid w-100" alt="notification-image">
</section>
<section class="hero-section text-center text-dark py-5">
    <div class="container">
        <h1 class="fw-bold mb-4">Sign Up for Flight Deals and Updates</h1>
        <p class="mb-4 fs-5">
            Sign up with just your email address to receive<br>
            booking updates, notifications, and the latest news<br>
            — all in one place.<br>
            Don’t miss out on important information.<br>
            Subscribe now!
        </p>
        <div class="d-flex justify-content-center input-container">
            <div class="input-wrapper">
                <input type="email" placeholder="E-mail address">
                <button type="button" class="icon-button">
                  <i class="fa-solid fa-arrow-right"></i>
                </button>
              </div>
    </div>
</section>


  @endsection





