@extends('layouts.template')

@section('title', 'Homepage')

@section('content')
    <section class="hero position-relative text-center">
        <img src="/image/airplaneall.png" class="img-fluid w-100" alt="Aurora Airways Airplane">
        <div class="position-absolute top-50 start-50 translate-middle">
            <h1 class="display-4 mb-4">The finest experience for you</h1>
            <button class="btn btn-lg h1-btn">Book Now</button>
        </div>
    </section>

    <section class="promotions py-5">
        <div class="container">
            <div class="row g-4 text-center">
                <div class="col-md-6">
                    <div class="card bg-light rounded-4 overflow-hidden shadow-sm">
                        <img src="/image/Aurora.jpg" class="card-img-top" alt="Your venture for Aurora">
                        <div class="card-body">
                            <h3 class="card-title">Your venture for Aurora</h3>
                            <p class="card-text text-muted">Explore the breathtaking Northern Lights.</p>
                            <a href="#" class="btn stretched-link">Learn more</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card bg-light rounded-4 overflow-hidden shadow-sm">
                        <img src="/image/summer.jpg" class="card-img-top" alt="Book your summer trip now">
                        <div class="card-body">
                            <h3 class="card-title">Book your summer trip now</h3>
                            <p class="card-text text-muted">Find the best deals for your summer vacation.</p>
                            <a href="#" class="btn stretched-link">Book now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="featured-destinations py-5">
        <div class="container">
            <h2 class="text-center mb-4">Featured Destinations from Japan</h2>
            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-4">
                <div class="col">
                    <div class="card bg-light rounded-4 overflow-hidden shadow-sm">
                        <img src="/image/toronto.jpg" class="card-img-top" alt="Toronto">
                        <div class="card-body text-center">
                            <h5 class="card-title">Toronto</h5>
                            <a href="#" class="card-text text-muted small">Discover for yourself</a>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card bg-light rounded-4 overflow-hidden shadow-sm">
                        <img src="/image/vancouver2.jpg" class="card-img-top" alt="Vancouver">
                        <div class="card-body text-center">
                            <h5 class="card-title">Vancouver</h5>
                            <a href="#" class="card-text text-muted small">Discover for yourself</a>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card bg-light rounded-4 overflow-hidden shadow-sm">
                        <img src="/image/ottawa.jpg" class="card-img-top" alt="Ottawa">
                        <div class="card-body text-center">
                            <h5 class="card-title">Ottawa</h5>
                            <a href="#" class="card-text text-muted small">Discover for yourself</a>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card bg-light rounded-4 overflow-hidden shadow-sm">
                        <img src="/image/montreal.jpg" class="card-img-top" alt="Montreal">
                        <div class="card-body text-center">
                            <h5 class="card-title">Montreal</h5>
                            <a href="#" class="card-text text-muted small">Discover for yourself</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDxyJejXiSWCw5LPg9mY1bRYYyI" crossorigin="anonymous"></script>
    <script src="script.js"></script>
@endsection
