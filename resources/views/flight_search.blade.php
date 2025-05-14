@extends('layouts.template')

@section('title', 'Flight Search')

@section('content')

<section class="hero position-relative text-center text-white">
    <img src="/image/jake-weirick-Q_RBVFFXR_g-unsplash.jpg" class="img-fluid w-100 sky-photo"  alt="Night Sky">
    <div class="position-absolute top-50 start-50 translate-middle">
        <h1 class="text-center fw-bold text-white mb-5">Where do you want to go ?</h1>
    </div>
</section>

<div class="booking-form mx-auto">
    <form action="{{ route('flight.search') }}" method="GET">
        <div class="bg-white rounded shadow p-4 m-5">
        <div class="form-row d-flex justify-content-center">
            <div class="form-group col-md-2">
                <label for="from">From</label>
                <select class="form-control" name="from" id="from">
                    <option value="Tokyo" {{ request('from') == 'Tokyo' ? 'selected' : '' }}>Tokyo</option>
                    <option value="Osaka" {{ request('from') == 'Osaka' ? 'selected' : '' }}>Osaka</option>
                    <option value="Fukuoka" {{ request('from') == 'Fukuoka' ? 'selected' : '' }}>Fukuoka</option>
                </select>
            </div>
            <div class="form-group col-md-2 me-2">
                <label for="to">To</label>
                <select class="form-control" name="to" id="to">
                    <option value="Vancouver" {{ request('to') == 'Vancouver' ? 'selected' : '' }}>Vancouver</option>
                    <option value="Toronto" {{ request('to') == 'Toronto' ? 'selected' : '' }}>Toronto</option>
                    <option value="Montreal" {{ request('to') == 'Montreal' ? 'selected' : '' }}>Montreal</option>
                </select>
            </div>
            <div class="form-group col-md-2 mr-2">
                <label for="departure_date">Departure Date</label>
                <input type="date" class="form-control" name="departure_date" id="departure_date" value="{{ request('departure_date') }}">
            </div>
            <div class="form-group col-md-2 mr-2">
                <label for="return_date">Return Date</label>
                <input type="date" class="form-control" name="return_date" id="return_date" value="{{ request('return_date') }}">
            </div>
            <div class="form-group col-md-2 mr-2">
                <label for="trip_type">Trip Type</label>
                <select class="form-control" name="trip_type" id="trip_type">
                    <option value="round_trip" {{ request('trip_type') == 'round_trip' ? 'selected' : '' }}>Round trip</option>
                    <option value="one_way" {{ request('trip_type') == 'one_way' ? 'selected' : '' }}>One way</option>
                </select>
            </div>
        </div>
        <button type="submit" class="btn d-block mx-auto px-4 py-2 mt-3 rounded-pill fw-bold text-white search-btn">Search</button>
        </div>
    </form>
</div>

@if(isset($flights) && count($flights) > 0)
<div class="bg-white rounded shadow p-4 mx-5 mt-5 flight-results">
    <div class="d-flex align-items-center mb-3">
        <i class="fa-solid fa-plane-departure fa-lg mr-2 icon-plane"></i>
        <h2 class="fw-bold mb-0">Departing Flights</h2>
    </div>

    @foreach ($flights as $flight)
        <div class="flight-item d-flex justify-content-between align-items-center py-3 border-bottom">
            <div class="me-3">{{ \Carbon\Carbon::parse($flight->departure_time)->format('g:i A') }} - {{ \Carbon\Carbon::parse($flight->arrival_time)->format('g:i A') }}</div>
            <div class="me-3">{{ $flight->from }} - {{ $flight->to }}</div>
            <div class="me-3">{{ $flight->departure_date }}</div>
            <div>${{ number_format($flight->price) }}</div>
        </div>
    @endforeach

    <a href="{{ route('flight.all', request()->all()) }}" class="text-decoration-none">
        <button type="submit" class="btn d-block mx-auto px-4 py-2 mt-3 rounded-pill fw-bold text-white search-btn mt-2">Show more</button>
    </a>
</div>
@else
    <div class="text-center mt-5">
        <p>No flights found.</p>
    </div>
@endif

@endsection

