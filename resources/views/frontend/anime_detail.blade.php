@extends('layouts.app')
@section('content')
    <!-- Anime Banner -->
    <div class="anime-banner position-relative">
        <div class="banner-overlay"></div>
        <div class="container position-relative py-5">
            <div class="row align-items-end">
                <div class="col-md-3 mb-4 mb-md-0">
                    <img src="https://via.placeholder.com/300x450" class="anime-cover rounded-3 w-100" alt="One Piece">
                </div>
                <div class="col-md-9">
                    <h1 class="text-white mb-3">One Piece</h1>
                    <div class="d-flex align-items-center gap-3 mb-3">
                        <div class="rating">
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star"></i>
                            <span class="ms-1 text-white">4.0</span>
                        </div>
                        <span class="badge bg-success">Ongoing</span>
                        <span class="text-white">Episodes: 1000+</span>
                    </div>
                    <div class="mb-4">
                        <span class="genre-tag">Adventure</span>
                        <span class="genre-tag">Action</span>
                        <span class="genre-tag">Fantasy</span>
                    </div>
                    <p class="text-white mb-4">Monkey D. Luffy wants to become the King of all pirates. Along his quest
                        he meets many different people, making friends and enemies along the way. Will he be able to gather
                        the strongest crew and find the legendary One Piece?</p>
                    <a href="watch.html" class="btn btn-watch">
                        <i class="bi bi-play-fill me-2"></i>Watch Episode 1
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Episode List -->
    <div class="container py-5">
        <div class="row">
            <div class="col-lg-8">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h3>Episodes</h3>
                    <div class="dropdown">
                        <button class="btn btn-outline-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                            Sort by: Newest First
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Newest First</a></li>
                            <li><a class="dropdown-item" href="#">Oldest First</a></li>
                        </ul>
                    </div>
                </div>
                <div class="episode-grid">
                    <a href="watch.html" class="episode-card active">1</a>
                    <a href="watch.html" class="episode-card">2</a>
                    <a href="watch.html" class="episode-card">3</a>
                    <a href="watch.html" class="episode-card">4</a>
                    <a href="watch.html" class="episode-card">5</a>
                    <a href="watch.html" class="episode-card">6</a>
                    <a href="watch.html" class="episode-card">7</a>
                    <a href="watch.html" class="episode-card">8</a>
                    <a href="watch.html" class="episode-card">9</a>
                    <a href="watch.html" class="episode-card">10</a>
                    <!-- More episodes -->
                </div>
            </div>
            <div class="col-lg-4">
                <div class="info-sidebar rounded-3 p-4">
                    <h4 class="mb-4">Information</h4>
                    <div class="info-item">
                        <span class="info-label">Status</span>
                        <span class="info-value">Ongoing</span>
                    </div>
                    <div class="info-item">
                        <span class="info-label">Studios</span>
                        <span class="info-value">Toei Animation</span>
                    </div>
                    <div class="info-item">
                        <span class="info-label">Premiered</span>
                        <span class="info-value">Fall 1999</span>
                    </div>
                    <div class="info-item">
                        <span class="info-label">Duration</span>
                        <span class="info-value">23 min per ep</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
