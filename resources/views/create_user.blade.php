@extends('layouts.template')

@section('title', 'Create User')

@section('content')
<div class="container py-5">
    <h2 class="mb-4">Add New User</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.users.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="full_name" class="form-label">Name<span class="text-danger">*</span></label>
            <input type="text" class="form-control" id="full_name" name="full_name" required value="{{ old('full_name') }}">
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email<span class="text-danger">*</span></label>
            <input type="email" class="form-control" id="email" name="email" required value="{{ old('email') }}">
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Password<span class="text-danger">*</span></label>
            <input type="password" class="form-control" id="password" name="password" required>
        </div>

        <button type="submit" class="btn create-btn text-white rounded-pill">Create</button>
        <a href="{{ route('admin.users.index') }}" class="btn create-cancel-btn text-white rounded-pill ms-2">Cancel</a>
    </form>
</div>
@endsection
