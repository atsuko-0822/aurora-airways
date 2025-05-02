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
        <form>
            <div class="bg-white rounded shadow p-4 m-5">
            <div class="form-row d-flex justify-content-center">
                <div class="form-group col-md-2">
                    <label for="from">From</label>
                    <select class="form-control" id="from">
                        <option>Tokyo</option>
                        <option>Osaka</option>
                        <option>Fukuoka</option>
                        </select>
                </div>
                <div class="form-group col-md-2 me-2">
                    <label for="to">To</label>
                    <select class="form-control" id="to">
                        <option>Vancouver</option>
                        <option>Tronto</option>
                        <option>Montreal</option>
                    </select>
                </div>
                <div class="form-group col-md-2 mr-2">
                    <label for="departure_date">Departure Date</label>
                    <input type="date" class="form-control" id="departure_date" value="2025-04-10">
                </div>
                <div class="form-group col-md-2 mr-2">
                    <label for="return_date">Return Date</label>
                    <input type="date" class="form-control" id="return_date" value="2025-04-20">
                </div>
                <div class="form-group col-md-2 mr-2">
                    <label for="trip_type">Trip Type</label>
                    <select class="form-control" id="trip_type">
                        <option>Round trip</option>
                        <option>One way</option>
                    </select>
                </div>
            </div>
            <button type="submit" class="btn d-block mx-auto px-4 py-2 mt-3 rounded-pill fw-bold text-white search-btn">Search</button>
            </div>
        </form>
    </div>

    <div class="bg-white rounded shadow p-4 mx-5 mt-5 flight-results">
        <div class="d-flex align-items-center mb-3">
            <i class="fa-solid fa-plane-departure fa-lg mr-2 icon-plane"></i>
            <h2 class="fw-bold mb-0">Departing Flights</h2>
        </div>
        <div class="flight-item d-flex justify-content-between align-items-center py-3 border-bottom">
            <div class="me-3">3:40 PM - 8:15 AM</div>
            <div class="me-3">NRT - YVR</div>
            <div class="me-3">8hour35min</div>
            <div>$975</div>
        </div>

        <div class="flight-item d-flex justify-content-between align-items-center py-3">
            <div class="me-3">6:55 PM - 11:30 AM</div>
            <div class="me-3">NRT - YVR</div>
            <div class="me-3">8hour35min</div>
            <div>$1100</div>
        </div>
        <button type="submit" class="btn d-block mx-auto px-4 py-2 rounded-pill fw-bold text-white show-btn">Show more</button>
    </div>



  @endsection

