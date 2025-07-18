@extends('layouts.template')

@section('title', 'Edit Flight')

@section('content')

<div class="container py-5">
    <h2>Edit Flight</h2>

    <form action="{{ route('admin.flights.update', $flight->id) }}" method="POST">
        @csrf
        {{-- @method('PUT') --}}

        <!-- From -->
        <div class="form-group mb-2">
            <label for="from">From</label>
            <input type="text" name="from" id="from" class="form-control" value="{{ old('from', $flight->from) }}">
            @error('from')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <!-- To -->
        <div class="form-group mb-2">
            <label for="to">To</label>
            <input type="text" name="to" id="to" class="form-control" value="{{ old('to', $flight->to) }}">
            @error('to')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <!-- Departure Date -->
        <div class="form-group mb-2">
            <label for="departure_date">Departure Date</label>
            <input type="date" name="departure_date" id="departure_date" class="form-control" value="{{ old('departure_date', $flight->departure_date) }}">
            @error('departure_date')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <!-- Departure Time -->
        <div class="form-group mb-2">
            <label for="departure_time">Departure Time</label>
            <input type="time" name="departure_time" id="departure_time" class="form-control" value="{{ old('departure_time', $flight->departure_time) }}">
            @error('departure_time')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <!-- Arrival Time -->
        <div class="form-group mb-2">
            <label for="arrival_time">Arrival Time</label>
            <input type="time" name="arrival_time" id="arrival_time" class="form-control" value="{{ old('arrival_time', $flight->arrival_time) }}">
            @error('arrival_time')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <!-- Trip Type -->
        <div class="form-group mb-2">
            <label for="trip_type">Trip Type</label>
            <select name="trip_type" id="trip_type" class="form-control">
                <option value="one-way" {{ old('trip_type', $flight->trip_type) == 'one-way' ? 'selected' : '' }}>One Way</option>
                <option value="round-trip" {{ old('trip_type', $flight->trip_type) == 'round-trip' ? 'selected' : '' }}>Round Trip</option>
            </select>
            @error('trip_type')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <!-- Price -->
        <div class="form-group mb-4">
            <label for="price">Price</label>
            <input type="number" name="price" id="price" class="form-control" value="{{ old('price', $flight->price) }}">
            @error('price')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <!-- Submit -->
        <button type="submit" class="btn text-white admin-add-btn rounded-pill">Update Flight</button>
    </form>
</div>
@endsection
