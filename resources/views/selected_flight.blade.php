@extends('layouts.template')

@section('title', 'Selected Flight')

@section('content')

<div class="container-fluid min-vh-100 d-flex flex-column align-items-center justify-content-center">

    <div class="position-absolute top-0 start-0 ms-4 mt-4 w-100">
        <div class="rounded p-3 mb-3 mt-3 d-flex align-items-center justify-content-center">
            <h1 class="fw-bold text-white text-nowrap mt-5 mb-5">Details of your selection</h1>
        </div>
    </div>

    <div class="bg-white rounded shadow p-4 mx-auto cancel-container">

        <div class="border rounded p-3">
            <div class="d-flex align-items-center mb-3 text-muted">
                <i class="fa-solid fa-plane-departure fa-lg mr-2 icon-plane"></i>
            <h3 class="fs-6 text-muted mt-1">Departing Flight</h3>
            </div>
            <div class="row text-center">
                <div class="col">2024/10/10</div>
                <div class="col">3:40 PM - 8:15 AM</div>
                <div class="col">NRT - YVR</div>
                <div class="col">8hour 35min</div>
                <div class="col">$975</div>
            </div>
            <div class="border-bottom pb-2"></div>
            <div class="d-flex align-items-center mb-3 mt-3 text-muted">
                <i class="fa-solid fa-plane-departure fa-lg mr-2 icon-plane"></i>
            <h3 class="fs-6 text-muted">Returning Flight</h3>
            </div>

            <div class="row text-center">
                <div class="col">2024/10/20</div>
                <div class="col">6:45 PM - 9:00 PM</div>
                <div class="col">YVR - NRT</div>
                <div class="col">10hour 15min</div>
                <div class="col">$1200</div>
            </div>


            <div class="d-flex justify-content-end">

         </div>
            </div>
        </div>
    <div class="bg-white rounded shadow p-4 mx-auto cancel-container  mt-4 mb-5">

        <div class="border rounded p-4 text-center mt-4">
            <h2 class="mb-3 fw-bold">Total to be paid</h2>
            <p class="fs-3 mb-4">1 passenger</p>
            <p class="fs-4 fw-bold mb-4">$2175</p>
            <button class="btn btn-lg rounded-pill text-white px-5 reservation-btn">
                Confirm Reservation
            </button>
        </div>
        </div>




  @endsection

