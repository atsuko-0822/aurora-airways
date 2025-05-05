@extends('layouts.template')

@section('title', 'Flight Departure')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-5">
            <div class="rounded p-3 mb-3 d-flex align-items-center">
                <h2 class="fw-bold mt-3 me-4">Hello, Name !</h2>
                 <p class="mt-4 user-header">0000-0000</p>
            </div>
            <div class="bg-white rounded shadow p-4 pb-5 mb-4 personal-info-container">
                 <div class="d-flex align-items-center mb-3">
                    <i class="fa-solid fa-user fa-lg mb-3 me-2"></i>
                 <h2 class="mb-3">Personal Information</h2>
                </div>
                        <div class="mb-3">
                            <label for="full-name" class="form-label">Full Name</label>
                            <div class="form-text fw-bold"></div>
                            <div class="border-bottom pb-2"></div>
                    </div>
                    <div class="mb-3">
                        <label for="address" class="form-label">Address</label>
                        <div class="form-text fw-bold"></div>
                        <div class="border-bottom pb-2"></div>
                    </div>
                    <div class="mb-3">
                        <label for="phone" class="form-label">Phone</label>
                        <div class="form-text fw-bold"></div>
                            <div class="border-bottom pb-2"></div>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">E-mail</label>
                        <div class="form-text fw-bold"></div>
                            <div class="border-bottom pb-2"></div>
                    </div>
                    <div class="mb-3">
                        <label for="passport" class="form-label">Passport number</label>
                        <div class="form-text fw-bold"></div>
                        <div class="border-bottom pb-2"></div>
                    </div>
                    <div class="mb-3">
                        <label for="emergency-name" class="form-label">Emergency contact(name)</label>
                        <div class="form-text fw-bold"></div>
                            <div class="border-bottom pb-2"></div>
                    </div>
                    <div class="mb-3">
                        <label for="emergency-phone" class="form-label">Emergency contact(phone)</label>
                        <div class="form-text fw-bold"></div>
                            <div class="border-bottom pb-2"></div>
                    </div>
                    <div class="mb-3">
                        <label for="credit-card" class="form-label">credit card</label>
                        <div class="form-text fw-bold"></div>
                        <div class="border-bottom pb-2"></div>
                    </div>
                    <div class="text-center">
                        <a href="" class="text-decoration-none text-secondary">change your information ?</a>
                    </div>
            </div>
        </div>
        <div class="col-md-7">
            <div class="bg-white rounded p-2 pt-3 pb-3 mb-3 mt-3">
                <div class="d-flex align-items-center justify-content-around">
                <div class="me-5">Your Aurora points: <strong>0000pt</strong></div>
                <a href="#" class="text-reset text-decoration-none">Do you want to use points ?</a>
            </div>
        </div>
            <div class="bg-white rounded shadow p-4 mb-4">
                <h2 class="mb-3">Your next trip is...</h2>
                <div class="flight-info-oval-reservation mb-3">
                    <div class="d-flex align-items-center justify-content-between">
                    <p class="pt-3">Reservation number: QN7853</p>
                    <p class="pt-3">Total 1 person</p>
                    <button type="submit" class="btn d-block px-1 py-1rounded-pill fw-bold eticket-btn">send e-ticket</button>
                    </div>
                </div>

                <div class="border rounded p-3">
                    <div class="d-flex align-items-center mb-3 text-muted">
                        <i class="fa-solid fa-plane-departure fa-lg mr-2 icon-plane"></i>
                    <h3 class="fs-6 text-muted mt-1">Departing Flight</h3>
                    </div>
                    <p class="mb-1">2024/10/10 3:40 PM - 8:15 AM NRT - YVR 8hour 35min</p>
                    <div class="border-bottom pb-2"></div>
                    <div class="d-flex align-items-center mb-3 mt-3 text-muted">
                        <i class="fa-solid fa-plane-departure fa-lg mr-2 icon-plane"></i>
                    <h3 class="fs-6 text-muted">Returning Flight</h3>
                    </div>
                    <p class="mb-1">2024/10/20 6:45 PM - 9:00 PM YVR - NRT 10hour 15min</p>
                    <div class="border-bottom pb-2"></div>
                    <div class="d-flex justify-content-end">
                    <p class="mt-3 mb-0">Total: $1,200

                        <button class="btn btn-sm me-2 receipt-btn"><div class="d-flex align-items-center">
                            <i class="fa-solid fa-receipt me-1"></i>receipt</div></button>
                        <button class="btn btn-outline-danger btn-sm cancel-btn">Cancel or change your flight?</button>
                    </p>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded shadow p-4 pb-4">
                <h2 class="mb-3">Your flight history</h2>
                <div class="list-group">
                    <div class="list-group-item d-flex justify-content-between align-items-center">
                        <div>
                            <div>2024/03/15 10:45 AM - 3:10 AM NRT - YVR</div>
                            <div>2024/07/07 6:45 PM - 9:00 PM YVR - NRT</div>
                        </div>
                        <button class="btn btn-sm me-2 receipt-btn"><div class="d-flex align-items-center">
                            <i class="fa-solid fa-receipt me-1"></i>receipt</div></button>
                    </div>
                    <div class="list-group-item d-flex justify-content-between align-items-center">
                        <div>
                            <div>2023/11/03 3:40 PM - 8:15 AM NRT - YVR</div>
                            <div>2023/11/13 9:30 PM - 11:35 PM YVR - NRT</div>
                        </div>
                        <button class="btn btn-sm me-2 receipt-btn"><div class="d-flex align-items-center">
                            <i class="fa-solid fa-receipt me-1"></i>receipt</div></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
  @endsection

