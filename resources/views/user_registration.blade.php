@extends('layouts.background')

@section('title', 'User Registration')

@section('content')

<div class="container-fluid min-vh-100 d-flex align-items-center justify-content-center position-relative">

    <div class="position-absolute top-0 start-0 ms-4 mt-3">
      <h1 class="display-5 fw-bold mt-3">Join Aurora Club!</h1>
    </div>

    <!-- 中央にフォーム配置 -->
    <div class="p-4 bg-white rounded-4 shadow registration-container m-5">
      <form method="POST" action="{{ route('register.store') }}">
        @csrf

        <div class="mb-3">
          <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
          <input type="email" class="form-control" id="email" name="email" required />
        </div>

        <div class="mb-3">
          <label for="password" class="form-label">Password <span class="text-danger">*</span></label>
          <input type="password" class="form-control" id="password" name="password" required />
        </div>

        <div class="mb-3">
          <label for="retypePassword" class="form-label">Retype Password <span class="text-danger">*</span></label>
          <input type="password" class="form-control" id="retypePassword" name="password_confirmation" required />
        </div>

        <div class="mb-3">
          <label for="fullName" class="form-label">Full Name <span class="text-danger">*</span></label>
          <input type="text" class="form-control" id="fullName" name="full_name" required />
        </div>

        <div class="mb-3">
          <label for="phoneNumber" class="form-label">Phone Number <span class="text-danger">*</span></label>
          <input type="text" class="form-control" id="phoneNumber" name="phone_number" required />
        </div>

        <div class="mb-3">
          <label for="address" class="form-label">Address <span class="text-danger">*</span></label>
          <input type="text" class="form-control" id="address" name="address" required />
        </div>

        <div class="mb-3">
          <label for="passportNumber" class="form-label">Passport Number <span class="text-danger">*</span></label>
          <input type="text" class="form-control" id="passportNumber" name="passport_number" required />
        </div>

        <div class="mb-3">
          <label for="emergencyContactName" class="form-label">Emergency Contact (Name) <span class="text-danger">*</span></label>
          <input type="text" class="form-control" id="emergencyContactName"name="emergency_contact_name" required />
        </div>

        <div class="mb-3">
          <label for="emergencyContactPhone" class="form-label">Emergency Contact (Phone) <span class="text-danger">*</span></label>
          <input type="text" class="form-control" id="emergencyContactPhone" name="emergency_contact_phone" required />
        </div>

        <p class="text-secondary small"><span class="text-danger">*</span> are required</p>

        <button type="submit" class="btn d-block mx-auto px-4 py-2 rounded-pill fw-bold text-white submit-btn">Register</button>
      </form>
    </div>
  </div>

  @endsection



