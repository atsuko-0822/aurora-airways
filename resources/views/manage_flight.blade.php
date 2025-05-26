@extends('layouts.template')

@section('title', 'Manage Flight')

@section('content')

<div class="py-0 flight-bg d-flex align-items-center justify-content-center">
    <div class="bg-white rounded shadow p-5 flight-departure" style="width: 100%; max-width: 800px;">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div class="d-flex align-items-center">
                <i class="fa-solid fa-plane-departure fa-lg mr-2 icon-plane"></i>
                <h1 class="fw-bold mb-0">Manage Flights</h1>
            </div>
            {{-- フライト追加ボタン --}}
            <a href="{{ route('admin.flights.create') }}" class="btn btn-primary">
                <i class="fa fa-plus me-1"></i> Add Flight
            </a>
        </div>

        @if(count($flights) > 0)
            @foreach ($flights as $flight)
                <div class="flight-item d-flex justify-content-between align-items-center py-3 border-bottom">
                    <div class="me-3">
                        {{ \Carbon\Carbon::parse($flight->departure_time)->format('g:i A') }} -
                        {{ \Carbon\Carbon::parse($flight->arrival_time)->format('g:i A') }}
                    </div>
                    <div class="me-3">
                        {{ $flight->from }} - {{ $flight->to }}
                    </div>
                    <div class="me-3">$
                        {{ number_format($flight->price) }}
                    </div>

                    {{-- 管理ボタン --}}
                    <a href="{{ route('admin.flights.edit', $flight->id) }}" class="btn btn-success">
                        Manage
                    </a>
                </div>
            @endforeach
        @else
            <div class="text-center mt-3">
                <p>No flights found.</p>
            </div>
        @endif
    </div>
</div>

@endsection

