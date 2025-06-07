@extends('layouts.template')

@section('title', 'Flight Departure')

@section('content')

{{-- <div class="py-0 flight-bg d-flex align-items-center justify-content-center">
    <div class="bg-white rounded shadow p-5 flight-departure">
        <div class="d-flex align-items-center mb-3">
            <i class="fa-solid fa-plane-departure fa-lg mr-2 icon-plane"></i>
            <h1 class="fw-bold mb-0">Departing Flight</h1>
        </div>


        @if(count($flights) > 0)
        @foreach ($flights as $flight)

        <form action="{{ route('flight.selectDeparture', ['departureFlightId' => $flight->id]) }}" method="POST" class="flight-link d-block p-0 m-0">
            @csrf
            <input type="hidden" name="return_flight_id" id="return_flight_id" value="{{ $returnFlightId }}">
                <input type="hidden" name="trip_type" value="round_trip">
                <input type="hidden" name="reservation_id" value="{{ $reservationId }}">
            <button type="submit" class="btn btn-link text-decoration-none w-100 p-0 m-0 text-dark text-start">
                <div class="flight-item d-flex justify-content-between align-items-center py-4 border-bottom">
                    <div class="me-3">{{ \Carbon\Carbon::parse($flight->departure_time)->format('g:i A') }} - {{ \Carbon\Carbon::parse($flight->arrival_time)->format('g:i A') }}</div>
                    <div class="me-3">{{ $flight->from }} - {{ $flight->to }}</div>
                    <div>${{ number_format($flight->price) }}</div>
                </div>
            </button>
        </form>
        @endforeach
    @else
        <div class="text-center mt-3">
            <p>No flights found.</p>
        </div>
    @endif
</div>
</div>

@endsection
 --}}

 @php
    $flights = $flights ?? collect();
@endphp


<div class="py-0 flight-bg d-flex align-items-center justify-content-center">
    <div class="bg-white rounded shadow p-5 flight-departure">

        <div class="d-flex justify-content-between align-items-center mb-4">
            <div class="d-flex align-items-center">
                <i class="fa-solid fa-plane-departure fa-lg mr-2 icon-plane"></i>
                <h1 class="fw-bold mb-0">Departing Flight</h1>
            </div>
        </div>

        {{-- 検索フォーム --}}
      <form action="{{ route('flight.changeDeparting') }}" method="GET" class="mb-4">
    <div class="form-row d-flex justify-content-center align-items-end">

        <div class="form-group col-md-2 me-2">
            <label for="from">From</label>
            <select class="form-control" name="from" id="from">
                <option value="Tokyo" {{ request('from') == 'Tokyo' ? 'selected' : '' }}>Tokyo</option>
                <option value="Osaka" {{ request('from') == 'Osaka' ? 'selected' : '' }}>Osaka</option>
                <option value="Fukuoka" {{ request('from') == 'Fukuoka' ? 'selected' : '' }}>Fukuoka</option>
                <option value="Vancouver" {{ request('to') == 'Vancouver' ? 'selected' : '' }}>Vancouver</option>
                <option value="Toronto" {{ request('to') == 'Toronto' ? 'selected' : '' }}>Toronto</option>
                <option value="Montreal" {{ request('to') == 'Montreal' ? 'selected' : '' }}>Montreal</option>
            </select>
        </div>

        <div class="form-group col-md-2 me-2">
            <label for="to">To</label>
            <select class="form-control" name="to" id="to">
                <option value="Vancouver" {{ request('to') == 'Vancouver' ? 'selected' : '' }}>Vancouver</option>
                <option value="Toronto" {{ request('to') == 'Toronto' ? 'selected' : '' }}>Toronto</option>
                <option value="Montreal" {{ request('to') == 'Montreal' ? 'selected' : '' }}>Montreal</option>
                <option value="Tokyo" {{ request('from') == 'Tokyo' ? 'selected' : '' }}>Tokyo</option>
                <option value="Osaka" {{ request('from') == 'Osaka' ? 'selected' : '' }}>Osaka</option>
                <option value="Fukuoka" {{ request('from') == 'Fukuoka' ? 'selected' : '' }}>Fukuoka</option>
            </select>
        </div>

        <div class="form-group col-md-2 me-2">
            <label for="departure_date">Departure Date</label>
            <input type="date" class="form-control" name="departure_date" id="departure_date" value="{{ request('departure_date') }}">
        </div>

        <div class="form-group col-md-2 me-2">
            <label>&nbsp;</label>
            <button type="submit" class="btn text-white rounded-pill w-100 admin-search-btn">Search</button>
        </div>


    </div>
</form>
{{-- 検索結果 --}}
@if(request()->has('from') || request()->has('to') || request()->has('departure_date'))
    @if($flights->count() > 0)
        <div class="bg-white rounded shadow p-4 mt-4">
            @foreach($flights as $flight)
            <form action="{{ route('flight.selectDeparture', ['departureFlightId' => $flight->id]) }}" method="POST" class="mb-3">
                @csrf
                <input type="hidden" name="return_flight_id" value="{{ $returnFlightId }}">
                <input type="hidden" name="trip_type" value="round_trip">
                <input type="hidden" name="reservation_id" value="{{ $reservationId }}">

                <button type="submit" class="btn btn-link w-100 p-0 m-0 text-dark text-start">
                    <div class="border-bottom py-3 d-flex justify-content-between align-items-center">
                        <div>{{ $flight->from }} → {{ $flight->to }}</div>
                        <div>{{ $flight->departure_date }} {{ \Carbon\Carbon::parse($flight->departure_time)->format('g:i A') }}</div>
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

