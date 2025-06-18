@extends('layouts.template')

@section('title', 'Rewards')

@section('content')

<div class="row rewards-title">
    <div class="col-md-5">
        <div class="rounded p-3 mb-3 d-flex align-items-center name">
            <h2 class="fw-bold mt-3 me-4">Hello, {{ Auth::user()->full_name }}!</h2>
            <p class="mt-4 user-header">{{ Auth::user()->user_number }}</p>
        </div>
    </div>
    <div class="col-md-5">
        <div class="bg-white rounded p-2 pt-3 pb-3 mt-4 points">
            <div class="d-flex align-items-center justify-content-around">
                <div class="mx-3">Your Aurora points: <strong>{{ Auth::user()->points }}pt</strong></div>
            </div>
        </div>
    </div>
</div>
<div class="row row-cols-1 row-cols-md-3 g-4 ps-3 pe-3 rewards-card">
    <div class="col">
        <div class="card h-100 rounded-4 overflow-hidden ">
            <img src="{{ asset('/image/pexels-tanathip-rattanatum-1050216-2026398.jpg') }}" class="card-img-top" alt="Book Next Trip">
            <div class="card-body bg-white">
                <h3 class="card-title text-center">book next trip</h3>
                <button type="submit" class="btn d-block mx-auto mt-1 px-4 py-2 rounded-pill fw-bold text-white rewards-btn">Use points</button>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card h-100 rounded-4 overflow-hidden ">
            <img src="{{ asset('/image/frugal-flyer-gqzNVd4Ep18-unsplash.jpg') }}" class="card-img-top" alt="Upgrade Your Trip">
            <div class="card-body bg-white">
                <h3 class="card-title text-center">Upgrade your trip</h3>
                <button type="submit" class="btn d-block mx-auto mt-1 px-4 py-2 rounded-pill fw-bold text-white rewards-btn">Use points</button>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card h-100 rounded-4 overflow-hidden">
            <img src="{{ asset('/image/john-schnobrich-2FPjlAyMQTA-unsplash.jpg') }}" class="card-img-top" alt="Shop Online">
            <div class="card-body  bg-white">
                <h3 class="card-title text-center">Shop online</h3>
                <button type="submit" class="btn d-block mx-auto mt-1 px-4 py-2 rounded-pill fw-bold text-white rewards-btn">Use points</button>
            </div>
        </div>
    </div>
</div>


  @endsection





