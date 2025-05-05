@extends('layouts.template')

@section('title', 'Edit Profile')

@section('content')

<div class="container-fluid min-vh-100 d-flex align-items-center justify-content-center position-relative">

    <div class="position-absolute top-0 start-0 ms-4 mt-3">
        <div class="rounded p-3 mb-3 d-flex align-items-center">
            <h2 class="fw-bold mt-3 me-4">Hello, Name !</h2>
             <p class="mt-4 user-header">0000-0000</p>
        </div>
    </div>

    <!-- 中央にフォーム配置 -->
    <div class="p-4 bg-white rounded-4 shadow edit-container m-5">
      <form>
        <div class="d-flex align-items-center mb-3">
            <i class="fa-solid fa-user fa-lg mb-3 me-2"></i>
         <h2 class="mb-3">Edit Personal Information</h2>
        </div>
                <div class="mb-3">
                    <label for="full-name" class="form-label mb-0">Full Name</label>
                    <div class="form-text fw-bold"></div>
                    <div class="border-bottom pb-2 d-flex justify-content-between align-items-center">
                        <span></span>
                        <a href="#" class="text-decoration-none text-reset"><i class="fa-solid fa-pen fa-lg"></i></a>
                    </div>
            </div>
            <div class="mb-3">
                <label for="address" class="form-label mb-0">Address</label>
                <div class="form-text fw-bold"></div>
                <div class="border-bottom pb-2 d-flex justify-content-between align-items-center">
                    <span></span>
                    <a href="#" class="text-decoration-none text-reset"><i class="fa-solid fa-pen fa-lg"></i></a>
                </div>
            </div>
            <div class="mb-3">
                <label for="phone" class="form-label mb-0">Phone</label>
                <div class="form-text fw-bold"></div>
                <div class="border-bottom pb-2 d-flex justify-content-between align-items-center">
                    <span></span>
                    <a href="#" class="text-decoration-none text-reset"><i class="fa-solid fa-pen fa-lg"></i></a>
                </div>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label mb-0">E-mail</label>
                <div class="form-text fw-bold"></div>
                <div class="border-bottom pb-2 d-flex justify-content-between align-items-center">
                    <span></span>
                    <a href="#" class="text-decoration-none text-reset"><i class="fa-solid fa-pen fa-lg"></i></a>
                </div>
            </div>
            <div class="mb-3">
                <label for="passport" class="form-label mb-0">Passport number</label>
                <div class="form-text fw-bold"></div>
                <div class="border-bottom pb-2 d-flex justify-content-between align-items-center">
                    <span></span>
                    <a href="#" class="text-decoration-none text-reset"><i class="fa-solid fa-pen fa-lg"></i></a>
                </div>
            </div>
            <div class="mb-3">
                <label for="emergency-name" class="form-label mb-0">Emergency contact(name)</label>
                <div class="form-text fw-bold"></div>
                <div class="border-bottom pb-2 d-flex justify-content-between align-items-center">
                    <span></span>
                    <a href="#" class="text-decoration-none text-reset"><i class="fa-solid fa-pen fa-lg"></i></a>
                </div>
            </div>
            <div class="mb-3">
                <label for="emergency-phone" class="form-label mb-0">Emergency contact(phone)</label>
                <div class="form-text fw-bold"></div>
                <div class="border-bottom pb-2 d-flex justify-content-between align-items-center">
                    <span></span>
                    <a href="#" class="text-decoration-none text-reset"><i class="fa-solid fa-pen fa-lg"></i></a>
                </div>
            </div>
            <div class="mb-3">
                <label for="credit-card" class="form-label mb-0">credit card</label>
                <div class="form-text fw-bold"></div>
                <div class="border-bottom pb-2 d-flex justify-content-between align-items-center">
                    <span></span>
                    <a href="#" class="text-decoration-none text-reset"><i class="fa-solid fa-pen fa-lg"></i></a>
                </div>
            </div>


        <button type="submit" class="btn d-block mx-auto px-4 py-2 rounded-pill fw-bold text-white save-btn">SAVE</button>
      </form>
    </div>
  </div>
  @endsection



