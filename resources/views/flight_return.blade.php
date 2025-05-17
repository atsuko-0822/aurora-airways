@extends('layouts.template')

@section('title', 'Flight Return')

@section('content')
<div class="py-0 flight-bg d-flex align-items-center justify-content-center">
    <div class="bg-white rounded shadow p-5 flight-departure">
        <div class="d-flex align-items-center mb-3">
            <i class="fa-solid fa-plane-arrival fa-lg mr-2 icon-plane"></i>
            <h1 class="fw-bold mb-0">Returning Flights</h1>
        </div>

        @if(count($returnFlights) > 0)
            @foreach ($returnFlights as $flight)
            <form action="{{ route('reserve.round.trip', ['returnFlightId' => $flight->id]) }}" method="POST">
                @csrf
                <input type="hidden" name="departure_flight_id" value="{{ session('departure_flight_id') }}">
                <input type="hidden" name="trip_type" value="round_trip">
                <button type="submit" class="flight-link w-100 text-start btn btn-link p-0 m-0">
                    <div class="flight-item d-flex justify-content-between align-items-center py-4 border-bottom">
                        <div class="me-3">{{ \Carbon\Carbon::parse($flight->departure_time)->format('g:i A') }} - {{ \Carbon\Carbon::parse($flight->arrival_time)->format('g:i A') }}</div>
                        <div class="me-3">{{ $flight->from }} - {{ $flight->to }}</div>
                        <div class="me-3">{{ $flight->duration ?? 'N/A' }}</div>
                        <div>${{ number_format($flight->price) }}</div>
                    </div>
                </button>
            </form>
            @endforeach
        @else
            <div class="text-center mt-3">
                <p>No return flights found.</p>
            </div>
        @endif
    </div>
</div>
@endsection



