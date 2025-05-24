@extends('layouts.template')

@section('title', 'Edit User')

@section('content')

<div class="container edit-user-container">
    <h2 class="mb-4">Edit User</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.users.update', $user->id) }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="full_name" class="form-label">Name<span class="text-danger">*</span></label>
            <input type="text" class="form-control" id="full_name" name="full_name" required value="{{ old('full_name', $user->full_name) }}">
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email<span class="text-danger">*</span></label>
            <input type="email" class="form-control" id="email" name="email" required value="{{ old('email', $user->email) }}">
        </div>

        <button type="submit" class="btn update-btn rounded-pill text-white">Update</button>
        <a href="{{ route('admin.users.index') }}" class="btn create-cancel-btn rounded-pill ms-2 text-white">Cancel</a>
    </form>
</div>

@endsection
