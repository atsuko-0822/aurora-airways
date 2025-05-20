@extends('layouts.template')

@section('title', 'Payment')

@section('content')

<div class="container py-5">
    <h1 class="text-center fw-bold text-white mb-4">Payment</h1>

    <div class="row justify-content-center">
        <!-- 左：支払い方法 -->
        <div class="col-md-6 bg-white rounded shadow p-4 mb-4 me-md-3">
            <h4 class="fw-bold mb-4">Select Payment Method</h4>

            <div class="form-check mb-3">
                <input class="form-check-input" type="checkbox" id="card">
                <label class="form-check-label fw-medium" for="card">
                    Credit or Debit Card
                    <img src="{{ asset('/image/icons8-american-express-48.png') }}" width="40" />
                    <img src="{{ asset('/image/icons8-mastercard-48.png') }}" width="40" />
                    <img src="{{ asset('/image/icons8-visa-48.png') }}" width="40" />
                </label>
            </div>

            <div class="row mb-2">
                <div class="col">
                    <input type="text" class="form-control" placeholder="Name">
                </div>
                <div class="col">
                    <input type="text" class="form-control" placeholder="Number">
                </div>
            </div>
            <div class="row mb-2">
                <div class="col">
                    <input type="text" class="form-control" placeholder="Month">
                </div>
                <div class="col">
                    <input type="text" class="form-control" placeholder="Year">
                </div>
            </div>
            <div class="mb-4">
                <input type="text" class="form-control" placeholder="Key">
            </div>

            <div class="form-check mb-2">
                <input class="form-check-input" type="checkbox" id="netbanking">
                <label class="form-check-label fw-medium" for="netbanking">Net Banking</label>
            </div>
            <div class="form-check mb-2">
                <input class="form-check-input" type="checkbox" id="auroraPoints">
                <label class="form-check-label fw-medium" for="auroraPoints">Aurora Points</label>
            </div>
            <div class="form-check mb-2">
                <input class="form-check-input" type="checkbox" id="paypal">
                <label class="form-check-label fw-medium" for="paypal">PayPal</label>
            </div>
            <div class="form-check mb-2">
                <input class="form-check-input" type="checkbox" id="wise">
                <label class="form-check-label fw-medium" for="wise">Wise</label>
            </div>
        </div>

        <!-- 右：注文の要約 -->
        <div class="col-md-5 bg-white rounded shadow p-4 mb-4">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h4 class="fw-bold">Summary</h4>
                <h4 class="fw-bold">$2175</h4>
            </div>
            <hr>
            <div class="d-flex justify-content-between mb-2">
                <span class="fw-medium">Air fare</span>
                <span>$1325</span>
            </div>
            <div class="d-flex justify-content-between mb-2">
                <span class="fw-medium">Fuel surcharge</span>
                <span>$550</span>
            </div>
            <div class="d-flex justify-content-between mb-3">
                <span class="fw-medium">Service fee</span>
                <span>$300</span>
            </div>
            <hr>
            <div class="d-flex justify-content-between fw-bold fs-5 mb-4">
                <span>Total</span>
                <span>$2175</span>
            </div>
            <button class="btn btn-lg fw-bold rounded-pill text-white payment-btn text-center d-block mx-auto">
                Complete
            </button>
        </div>
    </div>
</div>


  @endsection
