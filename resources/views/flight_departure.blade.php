@extends('layouts.template')

@section('title', 'Flight Departure')

@section('content')


 @php
    $flights = $flights ?? collect();
    $reservationId = $reservationId ?? '';
    $returnFlightId = $returnFlightId ?? '';
@endphp


<div class="py-0 flight-bg d-flex align-items-center justify-content-center">
    <div class="bg-white rounded shadow p-5 flight-departure">

        <div class="d-flex justify-content-between align-items-center mb-4">
            <div class="d-flex align-items-center">
                <i class="fa-solid fa-plane-departure fa-lg mr-2 icon-plane"></i>
                <h1 class="fw-bold mb-0">Departing Flight</h1>
            </div>
        </div>

        @if(isset($isFromSearch) && $isFromSearch)
    <h2 class="text-center mb-4">Flight Search Results</h2>
@else
    <h2 class="text-center mb-4">Change Your Flight</h2>
@endif

        {{-- 検索フォーム --}}
        @if(!isset($hideSearchForm) || !$hideSearchForm)
      <form action="{{ route('flight.changeSearchDeparting', ['reservation_id' => $reservationId, 'return_flight_id' => $returnFlightId ]) }}" method="GET" class="mb-4">
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
            <label for="departure_date">Departure Date</label>
            <input type="date" class="form-control" name="departure_date" id="departure_date" value="{{ request('departure_date') }}">
        </div>

        <div class="form-group col-md-2 me-2">
            <label>&nbsp;</label>
            <button type="submit" class="btn text-white rounded-pill w-100 admin-search-btn">Search</button>
        </div>

        <input type="hidden" name="return_flight_id" id="return_flight_id"value="{{ $returnFlightId }}">
        <input type="hidden" name="trip_type" value="round_trip">
        <input type="hidden" name="reservation_id" value="{{ $reservationId }}">

    </div>
</form>
@endif
{{-- 検索結果 --}}
@if(request()->has('from') || request()->has('to') || request()->has('departure_date'))
    @if($flights->count() > 0)
        <div class="bg-white rounded shadow p-4 mt-4">


            {{-- フライト一覧の各行を条件分け --}}
@foreach($flights as $flight)
    @if(isset($isFromSearch) && $isFromSearch)
      <form action="{{ route('flight.selectReturn', ['departureFlightId' => $flight->id]) }}" method="GET">
      <input type="hidden" name="departure_flight_id" value="{{ $flight->id }}">
            <input type="hidden" name="trip_type" value="{{ $tripType }}">
            <input type="hidden" name="return_date" value="{{ $returnDate }}">
            <button type="submit" class="btn btn-link w-100 p-0 m-0 text-dark text-start">
                <div class="border-bottom py-3 d-flex justify-content-between align-items-center">
                    <div>{{ $flight->from }} → {{ $flight->to }}</div>
                    <div>{{ $flight->departure_date }} {{ \Carbon\Carbon::parse($flight->departure_time)->format('g:i A') }}</div>
                    <div>${{ number_format($flight->price) }}</div>
                </div>
            </button>
        </form>
    @else
        {{-- 予約変更用のPOSTボタンつき --}}
        <form action="{{ route('reserve.departure', ['departureFlightId' => $flight->id]) }}" method="POST">
            @csrf
             <input type="hidden" name="new_flight_id" value="{{ $flight->id }}">
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
    @endif
@endforeach
        </div>
    @else
        <p class="text-center mt-4">No flights found.</p>
    @endif
@endif
</div>
</div>

@endsection

