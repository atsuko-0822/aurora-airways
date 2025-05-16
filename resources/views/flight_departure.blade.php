@extends('layouts.template')

@section('title', 'Flight Departure')

@section('content')

<div class="py-0 flight-bg d-flex align-items-center justify-content-center">
    <div class="bg-white rounded shadow p-5 flight-departure">
        <div class="d-flex align-items-center mb-3">
            <i class="fa-solid fa-plane-departure fa-lg mr-2 icon-plane"></i>
            <h1 class="fw-bold mb-0">Departing Flights</h1>
        </div>


        @if(count($flights) > 0)
        @foreach ($flights as $flight)
            <a href="{{ route('return.flights', $flight->id) }}" class="flight-link">
                <div class="flight-item d-flex justify-content-between align-items-center py-4 border-bottom">
                    <div class="me-3">{{ \Carbon\Carbon::parse($flight->departure_time)->format('g:i A') }} - {{ \Carbon\Carbon::parse($flight->arrival_time)->format('g:i A') }}</div>
                    <div class="me-3">{{ $flight->from }} - {{ $flight->to }}</div>
                    <div class="me-3">{{ $flight->duration ?? 'N/A' }}</div> {{-- durationカラムがあれば --}}
                    <div>${{ number_format($flight->price) }}</div>
                </div>
            </a>
        @endforeach
    @else
        <div class="text-center mt-3">
            <p>No flights found.</p>
        </div>
    @endif
</div>
</div>

@endsection

