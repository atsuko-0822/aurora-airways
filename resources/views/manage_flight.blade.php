@extends('layouts.template')

@section('title', 'Manage Flight')

@section('content')

@php
    $flights = $flights ?? collect();
@endphp

<div class="py-0 flight-bg d-flex align-items-center justify-content-center">
    <div class="bg-white rounded shadow p-5 flight-departure">

        <div class="d-flex justify-content-between align-items-center mb-4">
            <div class="d-flex align-items-center">
                <i class="fa-solid fa-plane-departure fa-lg mr-2 icon-plane"></i>
                <h1 class="fw-bold mb-0">Manage Flights</h1>
            </div>
        </div>

        {{-- 検索フォーム --}}
      <form action="{{ route('admin.flights.index') }}" method="GET" class="mb-4">
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

        <div class="form-group col-md-2">
            <label>&nbsp;</label>
            <a href="{{ route('admin.flights.create') }}" class="btn text-white admin-add-btn rounded-pill w-100">
                <i class="fa fa-plus"></i> Add Flight
            </a>
        </div>

    </div>
</form>
{{-- 検索結果 --}}
@if($flights->count() > 0)
    <div class="bg-white rounded shadow p-4 mt-4">
        @foreach($flights as $flight)
            <div class="border-bottom py-3 d-flex justify-content-between align-items-center">
                <div>{{ $flight->from }} → {{ $flight->to }}</div>
                <div>{{ $flight->departure_date }} {{ \Carbon\Carbon::parse($flight->departure_time)->format('g:i A') }}</div>
                <div>${{ number_format($flight->price) }}</div>

            {{-- 目アイコン --}}
        <div class="me-4">
            <form action="{{ route('admin.flights.toggleVisibility', $flight->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('PATCH')
                <button type="submit" class="btn btn-link p-0 m-0">
        @if($flight->is_active)
            <i class="fa-solid fa-eye-slash text-danger"></i>
        @else
            <i class="fa-solid fa-eye text-success"></i>
        @endif
                </button>
            </form>
        </div>

{{-- Editボタン --}}
        <div>
            <a href="{{ route('admin.flights.edit', $flight->id) }}" class="btn btn-sm btn-outline-primary">Edit</a>
        </div>
    </div>
        @endforeach
    </div>
@else
    <p class="text-center mt-4">No flights found.</p>
@endif

</div>

@endsection

