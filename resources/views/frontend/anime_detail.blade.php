@extends('layouts.app')
@section('content')
    <!-- Anime Banner -->
    <div class="row">
        <div class="col-md-4 mb-4 mb-md-0">
            <img src="{{ asset('storage/' . $anime->image) }}" class="img-fluid rounded-3 shadow" alt="{{ $anime->title }}">
        </div>
        <div class="col-md-8">
            <h1 class="mb-3">{{ $anime->title }}</h1>

            <div class="d-flex align-items-center gap-3 mb-3">
                <div class="rating">
                    @for ($i = 0; $i < 5; $i++)
                        @if ($i < floor($anime->rating))
                            <i class="bi bi-star-fill text-warning"></i>
                        @else
                            <i class="bi bi-star text-muted"></i>
                        @endif
                    @endfor
                    <span class="ms-2">{{ $anime->rating }}/ 5</span>
                </div>
                <span class="badge bg-success">{{ $anime->status }}</span>
                <span>Episodes: {{ $anime->episodes }}</span>
            </div>

            <div class="mb-3">
                @foreach ($anime->genres as $genre)
                    <span class="badge bg-secondary me-1">{{ $genre->name }}</span>
                @endforeach
            </div>

            <p class="mb-4">{{ $anime->synopsis }}</p>

            <div class="d-flex gap-2">
                <a href="" class="btn btn-primary">
                    <i class="bi bi-play-fill me-2"></i>Watch Episode 1
                </a>
            </div>
        </div>
    </div>

    <!-- Episode List -->
    <div class="container py-5">
        <div class="row">
            <div class="col-lg-4">
                <div class="info-sidebar rounded-3">
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
            <div class="col-lg-8">
                <div class="d-flex justify-content-between align-items-center mt-4 mb-4">
                    <h3>Episodes</h3>
                </div>
                <div class="episode-grid">
                    <a href="#" class="episode-card active">1</a>
                    <a href="#" class="episode-card">2</a>
                    <a href="#" class="episode-card">3</a>
                    <a href="#" class="episode-card">4</a>
                    <a href="#" class="episode-card">5</a>
                    <a href="#" class="episode-card">6</a>
                </div>
            </div>
        </div>
    </div>
@endsection
