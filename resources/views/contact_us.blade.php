@extends('layouts.template')

@section('title', 'Contact Us')

@section('content')

<div class="container-fluid min-vh-100 d-flex align-items-center justify-content-center position-relative">
    <div class="contact-form text-center bg-white">
        <h2 class="fw-bold mb-4">Send us a message</h2>
        <form>
          <div class="row mb-3">
            <div class="col">
              <label class="form-label text-start w-100">First name</label>
              <input type="text" class="form-control" required>
            </div>
            <div class="col">
              <label class="form-label text-start w-100">Last name</label>
              <input type="text" class="form-control" required>
            </div>
          </div>
          <div class="mb-3 text-start">
            <label class="form-label">email</label>
            <input type="email" class="form-control" required>
          </div>
          <div class="mb-3 text-start">
            <label class="form-label">phone number</label>
            <input type="tel" class="form-control">
          </div>
          <div class="mb-4 text-start">
            <label class="form-label">message</label>
            <textarea class="form-control" rows="4" required></textarea>
          </div>
          <button type="submit" class="btn d-block mx-auto px-4 py-2 rounded-pill fw-bold text-white send-btn">Send</button>
        </form>
      </div>
  @endsection





