@extends('layouts.template')

@section('title', 'Cancel or Change Flight')

@section('content')

<div class="container-fluid min-vh-100 d-flex flex-column align-items-center justify-content-center">

    <div class="position-absolute top-0 start-0 ms-4 mt-4">
        <div class="rounded p-3 mb-3 mt-3 d-flex align-items-center">
            <h2 class="fw-bold mt-3 me-4">Hello,{{ Auth::user()->full_name }}!</h2>
             <p class="mt-4 user-header">0000-0000</p>
        </div>
    </div>

<div class="bg-white rounded shadow p-4 mx-auto cancel-container">
    <div class="d-flex align-items-center mb-3">
        <h2 class="fw-bold mb-0">Cancel Your Flight</h2>
    </div>
    <div class="flight-info-oval-reservation mb-3">
        <div class="d-flex align-items-center justify-content-between">
        <p class="pt-3">Reservation number: QN7853</p>
        <p class="pt-3">Total 1 person</p>
        </div>
    </div>

    <div class="border rounded p-3">
        <div class="d-flex align-items-center mb-3 text-muted">
            <i class="fa-solid fa-plane-departure fa-lg mr-2 icon-plane"></i>
        <h3 class="fs-6 text-muted mt-1">Departing Flight</h3>
        </div>
   <p class="mb-1">{{ $reservation->departureFlight->from }}
                        → {{ $reservation->departureFlight->to }}
                        <span class="mx-2">|</span>
                        {{ $reservation->departureFlight->departure_time }}
                        <span class="mx-2">|</span>
                        {{ $reservation->departureFlight->departure_date }}
                    </p>

        <div class="border-bottom pb-2"></div>
        <div class="d-flex align-items-center mb-3 mt-3 text-muted">
            <i class="fa-solid fa-plane-departure fa-lg mr-2 icon-plane"></i>
        <h3 class="fs-6 text-muted">Returning Flight</h3>
        </div>
         <p class="mb-1">{{ $reservation->returnFlight->from }}
                        → {{ $reservation->returnFlight->to }}
                        <span class="mx-2">|</span>
                        {{ $reservation->returnFlight->departure_time }}
                        <span class="mx-2">|</span>
                        {{ $reservation->returnFlight->return_date }}
                    </p>
        <div class="border-bottom pb-2"></div>
        <div class="d-flex justify-content-end">
        <p class="mt-3 mb-0">Total: $1,200</p>
        <form action="{{ route('reservation.cancel', $reservation->id) }}" method="POST">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn d-block mx-auto mt-1 px-4 py-2 rounded-pill fw-bold text-white flight-cancel-btn">Cancel</button>
        </form>
     </div>
        </div>
    </div>

    <div class="bg-white rounded shadow p-4 mx-auto cancel-container  mt-4 mb-5">
        <div class="d-flex align-items-center mb-3">
            <h2 class="fw-bold mb-0">Change Your Flight</h2>
        </div>
        <div class="flight-info-oval-reservation mb-3">
            <div class="d-flex align-items-center justify-content-between">
            <p class="pt-3">Reservation number: QN7853</p>
            <p class="pt-3">Total 1 person</p>
            </div>
        </div>

        <div class="border rounded p-3 pb-2">
            <div class="d-flex align-items-center mb-3 text-muted">
                <i class="fa-solid fa-plane-departure fa-lg mr-2 icon-plane"></i>
            <h3 class="fs-6 text-muted mt-1">Departing Flight</h3>
            </div>
            <div class="d-flex  justify-content-between align-items-center mb-0">
          <p class="mb-1">{{ $reservation->departureFlight->from }}
                        → {{ $reservation->departureFlight->to }}
                        <span class="mx-2">|</span>
                        {{ $reservation->departureFlight->departure_time }}
                        <span class="mx-2">|</span>
                        {{ $reservation->departureFlight->departure_date }}
                    </p>
           <a href="{{ route('flight.changeDeparting', [
    'reservation_id' => $reservation->id,
    'return_flight_id' => $reservation->return_flight_id,
    'from' => $reservation->departureFlight->from,
    'to' => $reservation->departureFlight->to,
    'departure_date' => $reservation->departureFlight->departure_date
]) }}" class="btn d-block ms-auto mt-1 px-4 py-2 rounded-pill fw-bold text-white flight-change-btn">
    Change departing flight
</a>
 <input type="hidden" name="reservation_id" value="{{ $reservation->id }}">
            </div>
            <div class="border-bottom pb-2"></div>
            <div class="d-flex align-items-center mb-3 mt-3 text-muted">
                <i class="fa-solid fa-plane-departure fa-lg mr-2 icon-plane"></i>
            <h3 class="fs-6 text-muted">Returning Flight</h3>
            </div>
            <div class="d-flex  justify-content-between align-items-center mb-0">
           <p class="mb-1">{{ $reservation->returnFlight->from }}
                        → {{ $reservation->returnFlight->to }}
                        <span class="mx-2">|</span>
                        {{ $reservation->returnFlight->departure_time }}
                        <span class="mx-2">|</span>
                        {{ $reservation->returnFlight->return_date }}
                    </p>
            <div class="border-bottom pb-2"></div>
            <a href="{{ route('flight.change.returning',
            ['departure_flight_id' => $reservation->departure_flight_id,
            'reservation_id' => $reservation->id]) }}"
            class="btn d-block ms-auto mt-1 px-4 py-2 rounded-pill fw-bold text-white flight-change-btn">
             Change returning flight
                </a>
            </div>

         </div>
            </div>
        </div>




  @endsection

