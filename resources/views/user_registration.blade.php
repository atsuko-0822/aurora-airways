@extends('layouts.background')

@section('title', 'User Registration')

@section('content')


<h1 class="mt-5 ps-4 display-3 fw-bold">Join Aurora Club!</h1>

  <div class="container mt-3 mb-3">
    <div class="mx-auto p-4 bg-white rounded-4 shadow registration-container">
      <form>
        <div class="mb-3">
          <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
          <input type="email" class="form-control" id="email" required />
        </div>

        <div class="mb-3">
          <label for="password" class="form-label">Password <span class="text-danger">*</span></label>
          <input type="password" class="form-control" id="password" required />
        </div>

        <div class="mb-3">
          <label for="retypePassword" class="form-label">Retype Password <span class="text-danger">*</span></label>
          <input type="password" class="form-control" id="retypePassword" required />
        </div>

        <div class="mb-3">
          <label for="fullName" class="form-label">Full Name <span class="text-danger">*</span></label>
          <input type="text" class="form-control" id="fullName" required />
        </div>

        <div class="mb-3">
          <label for="phoneNumber" class="form-label">Phone Number <span class="text-danger">*</span></label>
          <input type="text" class="form-control" id="phoneNumber" required />
        </div>

        <div class="mb-3">
          <label for="address" class="form-label">Address <span class="text-danger">*</span></label>
          <input type="text" class="form-control" id="address" required />
        </div>

        <div class="mb-3">
          <label for="passportNumber" class="form-label">Passport Number <span class="text-danger">*</span></label>
          <input type="text" class="form-control" id="passportNumber" required />
        </div>

        <div class="mb-3">
          <label for="emergencyContactName" class="form-label">Emergency Contact (Name) <span class="text-danger">*</span></label>
          <input type="text" class="form-control" id="emergencyContactName" required />
        </div>

        <div class="mb-3">
          <label for="emergencyContactPhone" class="form-label">Emergency Contact (Phone) <span class="text-danger">*</span></label>
          <input type="text" class="form-control" id="emergencyContactPhone" required />
        </div>

        <p class="text-secondary small"><span class="text-danger">*</span> are required</p>

        <button type="submit" class="btn d-block mx-auto px-4 py-2 rounded-pill fw-bold text-white submit-btn">Register</button>
      </form>
    </div>
  </div>

  @endsection

