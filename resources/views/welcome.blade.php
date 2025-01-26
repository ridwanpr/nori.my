@extends('layouts.app')
@section('content')
    <section class="trending-section mb-4">
        <div class="container-fluid px-3">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h2 class="h5 fw-bold text-light">Trending Now</h2>
            </div>
            <div class="row g-3 overflow-auto pb-3"
                style="display: grid; grid-template-columns: repeat(auto-fill, minmax(135px, 1fr)); gap: 0.75rem;">
                @foreach ($trendingAnime as $trending)
                    <div class="col-auto" style="width: 135px; height: 250px; overflow: hidden;">
                        <a href="{{ route('anime.show', $trending->anime->slug) }}" class="anime-card-link">
                            <div class="position-relative" style="width: 135px; height: 200px;">
                                <img src="{{ asset('storage/' . $trending->anime->image) }}"
                                    class="img-fluid object-cover w-100 h-100" style="object-fit: cover;" width="135"
                                    height="200" fetchpriority="high" alt="{{ $trending->anime->title }}">
                                <div class="position-absolute top-0 end-0 m-2">
                                    <span class="badge bg-danger text-white p-2">
                                        <i class="bi bi-fire"></i>
                                    </span>
                                </div>
                                <div class="position-absolute bottom-0 start-0 w-100 bg-dark bg-opacity-75 p-2 text-center">
                                    <h2 class="card-title fs-6 fw-bold text-truncate text-white mb-1">
                                        {{ $trending->anime->title }}
                                    </h2>
                                    <div class="d-flex justify-content-center gap-2 small">
                                        <span class="badge bg-secondary">{{ $trending->anime->year }}</span>
                                        <span class="badge bg-secondary">
                                            {{ $trending->anime->genres->first()->name ?? '' }}
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <section class="latest-anime mb-4">
        <div class="container-fluid px-3">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h2 class="h5 fw-bold text-light">Latest Update</h2>
                <a href="{{ route('anime.index') }}" class="text-decoration-none text-light">Browse All</a>
            </div>
            <div class="row row-cols-2 row-cols-md-4 row-cols-lg-6 g-3">
                @foreach ($latestReleases as $anime)
                    <div class="col-6 col-md-4">
                        <a href="{{ route('anime.show', $anime->slug) }}" class="anime-card-link">
                            <div class="anime-card position-relative">
                                <div class="anime-card-image position-relative">
                                    <img src="{{ asset('storage/' . $anime->image) }}" class="img-fluid object-cover w-100"
                                        style="aspect-ratio: 2/3;" alt="{{ $anime->title }}">
                                    <div style="right: 5px; top: 4px" class="position-absolute top-0 end-0">
                                        <span class="badge bg-warning text-dark">{{ $anime->rating ?? '' }}</span>
                                    </div>
                                    <div
                                        class="anime-card-overlay position-absolute bottom-0 start-0 w-100 bg-dark bg-opacity-75 p-2 text-center">
                                        <h2 class="card-title fs-6 fw-bold text-truncate text-white mb-1">
                                            {{ $anime->title }}</h2>
                                        <div class="d-flex justify-content-center gap-2 small">
                                            <span class="badge bg-secondary">{{ $anime->year }}</span>
                                            <span
                                                class="badge bg-secondary">{{ $anime->genres->first()->name ?? '' }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
