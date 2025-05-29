@extends('layouts.template')

@section('title', 'Add Flight')

@section('content')
<div class="container mt-5 mb-5">
    <h2>Add New Flight</h2>

    <form action="{{ route('admin.flights.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="from" class="form-label">From</label>
            <input type="text" class="form-control" name="from" required>
        </div>

        <div class="mb-3">
            <label for="to" class="form-label">To</label>
            <input type="text" class="form-control" name="to" required>
        </div>

        <div class="mb-3">
            <label for="departure_date" class="form-label">Departure Date</label>
            <input type="date" class="form-control" name="departure_date" required>
        </div>

        <div class="mb-3">
            <label for="departure_time" class="form-label">Departure Time</label>
            <input type="time" class="form-control" name="departure_time" required>
        </div>

        <div class="mb-3">
            <label for="arrival_time" class="form-label">Arrival Time</label>
            <input type="time" class="form-control" name="arrival_time" required>
        </div>

        <div class="mb-3">
            <label for="trip_type" class="form-label">Trip Type</label>
            <select name="trip_type" class="form-control" required>
                <option value="one-way">One Way</option>
                <option value="round-trip">Round Trip</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="price" class="form-label">Price</label>
            <input type="number" class="form-control" name="price" step="0.01" required>
        </div>

        <button type="submit" class="btn create-btn text-white rounded-pill">Add Flight</button>
        <a href="{{ route('admin.flights.index') }}" class="btn create-cancel-btn text-white rounded-pill ms-2">Cancel</a>
    </form>
</div>
@endsection
