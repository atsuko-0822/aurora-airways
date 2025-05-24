@extends('layouts.template')

@section('title', 'Admin Dashboard')

@section('content')

<div class="container pt-5 pb-5">
    <h2 class="mb-4">Admin Dashboard</h2>

    <div class="card mb-3 text-bg-light">
        <div class="card-header">Welcome</div>
        <div class="card-body">
            <p><strong>Name:</strong> {{ Auth::guard('admin')->user()->name }}</p>
            <p><strong>Email:</strong> {{ Auth::guard('admin')->user()->email }}</p>
        </div>
    </div>

    <div class="row mb-4">
        <div class="col-md-6">
            <div class="card text-bg-light">
                <div class="card-header">User Management</div>
                <div class="card-body">
                    <p>Manage registered users.</p>
                    <a href="{{ url('/user_management') }}" class="btn fligh-management-btn rounded-pill text-white">Go to User Management</a>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card text-bg-light">
                <div class="card-header">Flight Management</div>
                <div class="card-body">
                    <p>Manage flight information.</p>
                    <a href="{{ url('/manage_flight') }}" class="btn fligh-management-btn rounded-pill text-white">Go to Flight Management</a>
                </div>
            </div>
        </div>
    </div>

    <form action="{{ route('admin.logout') }}" method="POST" class="text-center">
        @csrf
        <button type="submit" class="btn logout-btn rounded-pill text-white">Logout</button>
    </form>
</div>
@endsection
