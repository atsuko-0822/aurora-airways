@extends('layouts.template')

@section('title', 'FAQ')

@section('content')

<div class="container-fluid d-flex align-items-center justify-content-center position-relative min-vh-100">
    <div class="faq-container">
        <img src="/image/image 16.png" alt="airport" class="airport-image mb-4">
        <h1 class="faq-title">Common Questions</h1>

        <div class="faq-item">
          How do I change my booking?
          <span><i class="fa-solid fa-chevron-down"></i></span>
        </div>
        <div class="faq-item">
          How do I book extra baggage?
          <span><i class="fa-solid fa-chevron-down"></i></span>
        </div>
        <div class="faq-item">
          Can I order some food in the cabin ?
          <span><i class="fa-solid fa-chevron-down"></i></span>
        </div>

        <button type="submit" class="btn d-block mx-auto px-4 py-2 rounded-pill fw-bold text-white show-more-btn mt-4">Show more</button>
      </div>

      </div>
  @endsection





