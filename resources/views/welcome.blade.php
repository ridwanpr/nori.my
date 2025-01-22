@extends('layouts.app')
@section('content')
    <section class="mb-5">
        <h2 class="mb-4">Trending Now</h2>
        <div class="trending-scroll d-flex gap-3">
            <!-- Trending Anime Cards -->
            <div class="card anime-card" style="min-width: 250px;">
                <img src="https://via.placeholder.com/250x141" class="card-img-top" alt="Anime Title">
                <div class="card-body">
                    <h5 class="card-title">Demon Slayer</h5>
                    <div class="rating mb-2">
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-half"></i>
                        <span class="ms-1">4.5</span>
                    </div>
                    <span class="genre-tag">Action</span>
                    <span class="genre-tag">Fantasy</span>
                </div>
            </div>
            <!-- More trending cards -->
        </div>
    </section>

    <!-- Latest Releases -->
    <section class="mb-5">
        <h2 class="mb-4">Latest Releases</h2>
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-4">
            <!-- Anime Card -->
            <div class="col">
                <a href="anime-detail.html" class="card anime-card h-100">
                    <img src="https://via.placeholder.com/250x141" class="card-img-top" alt="Anime Title">
                    <div class="card-body">
                        <h5 class="card-title">One Piece</h5>
                        <div class="rating mb-2">
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star"></i>
                            <span class="ms-1">4.0</span>
                        </div>
                        <p class="card-text">
                            <small class="text-body-secondary">Episodes: 1000+</small>
                        </p>
                        <div class="mb-3">
                            <span class="genre-tag">Adventure</span>
                            <span class="genre-tag">Action</span>
                        </div>
                    </div>
                </a>
            </div>
            <!-- More anime cards -->
        </div>
    </section>
@endsection
