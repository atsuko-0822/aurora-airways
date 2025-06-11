@extends('layouts.template')

@section('title', 'Flight Return')

@section('content')

@php
    $flights = $flights ?? collect();
@endphp


<div class="py-0 flight-bg d-flex align-items-center justify-content-center">
    <div class="bg-white rounded shadow p-5 flight-departure">
        <div class="d-flex align-items-center mb-3">
            <i class="fa-solid fa-plane-arrival fa-lg mr-2 icon-plane"></i>
            <h1 class="fw-bold mb-0">Returning Flights</h1>
        </div>

        {{-- 検索フォーム --}}
      <form action="{{ route('flight.changeSearchReturning', ['reservation_id' => $reservationId, 'departure_flight_id' => $departureFlightId ]) }}" method="GET" class="mb-4">
        @csrf
    <div class="form-row d-flex justify-content-center align-items-end">

        <div class="form-group col-md-2 me-2">
            <label for="from">From</label>
            <select class="form-control" name="from" id="from">
                <option value="Tokyo" {{ request('from') == 'Tokyo' ? 'selected' : '' }}>Tokyo</option>
                <option value="Osaka" {{ request('from') == 'Osaka' ? 'selected' : '' }}>Osaka</option>
                <option value="Fukuoka" {{ request('from') == 'Fukuoka' ? 'selected' : '' }}>Fukuoka</option>
                <option value="Vancouver" {{ request('from') == 'Vancouver' ? 'selected' : '' }}>Vancouver</option>
                <option value="Toronto" {{ request('from') == 'Toronto' ? 'selected' : '' }}>Toronto</option>
                <option value="Montreal" {{ request('from') == 'Montreal' ? 'selected' : '' }}>Montreal</option>
            </select>
        </div>

        <div class="form-group col-md-2 me-2">
            <label for="to">To</label>
            <select class="form-control" name="to" id="to">
                <option value="Vancouver" {{ request('to') == 'Vancouver' ? 'selected' : '' }}>Vancouver</option>
                <option value="Toronto" {{ request('to') == 'Toronto' ? 'selected' : '' }}>Toronto</option>
                <option value="Montreal" {{ request('to') == 'Montreal' ? 'selected' : '' }}>Montreal</option>
                <option value="Tokyo" {{ request('to') == 'Tokyo' ? 'selected' : '' }}>Tokyo</option>
                <option value="Osaka" {{ request('to') == 'Osaka' ? 'selected' : '' }}>Osaka</option>
                <option value="Fukuoka" {{ request('to') == 'Fukuoka' ? 'selected' : '' }}>Fukuoka</option>
            </select>
        </div>

        <div class="form-group col-md-2 me-2">
            <label for="departure_date">Return Date</label>
            <input type="date" class="form-control" name="return_date" id="return_date" value="{{ request('return_date') }}">
        </div>

        <div class="form-group col-md-2 me-2">
            <label>&nbsp;</label>
            <button type="submit" class="btn text-white rounded-pill w-100 admin-search-btn">Search</button>
        </div>

        <input type="hidden" name="departure_flight_id" id="departure_flight_id"value="{{ $departureFlightId }}">
        <input type="hidden" name="trip_type" value="round_trip">
        <input type="hidden" name="reservation_id" value="{{ $reservationId }}">

    </div>
</form>
{{-- 検索結果 --}}
@if(request()->has('from') || request()->has('to') || request()->has('return_date'))
    @if($flights->count() > 0)
        <div class="bg-white rounded shadow p-4 mt-4">
            @foreach($flights as $flight)
            <form action="{{ route('reserve.return', ['returnFlightId' => $flight->id]) }}" method="POST" class="mb-3">
                @csrf
                 <input type="hidden" name="new_flight_id" value="{{ $flight->id }}">
                 <input type="hidden" name="departure_flight_id" id="departure_flight_id"value="{{ $departureFlightId }}">
                <input type="hidden" name="trip_type" value="round_trip">
                 <input type="hidden" name="reservation_id" value="{{ $reservationId }}">

                <button type="submit" class="btn btn-link w-100 p-0 m-0 text-dark text-start">
                    <div class="border-bottom py-3 d-flex justify-content-between align-items-center">
                        <div>{{ $flight->from }} → {{ $flight->to }}</div>
                        <div>{{ $flight->return_date }} {{ \Carbon\Carbon::parse($flight->return_time)->format('g:i A') }}</div>
                        <div>${{ number_format($flight->price) }}</div>
                    </div>
                </button>
            </form>
            @endforeach
        </div>
    @else
        <p class="text-center mt-4">No flights found.</p>
    @endif
@endif
</div>
</div>
@endsection



