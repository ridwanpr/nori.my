@extends('layouts.app')
@section('content')
    <section class="trending-section mb-4">
        <div class="container-fluid px-3">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h2 class="h5 fw-bold text-light">Trending Now</h2>
            </div>
            <div class="row g-3 overflow-auto pb-3">
                @foreach ($trendingAnime as $trending)
                    <div class="col-auto">
                        <a href="{{ route('anime.show', $trending->anime->slug) }}"
                            class="text-decoration-none anime-card-link">
                            <div class="card anime-card bg-dark border-0 shadow-lg">
                                <div class="card-image position-relative overflow-hidden">
                                    <img src="{{ asset('storage/' . $trending->anime->image) }}"
                                        class="card-img-top object-fit-cover" style="height: 200px; width: 135px;"
                                        alt="{{ $trending->anime->title }}">
                                    <div
                                        class="card-info-overlay position-absolute bottom-0 start-0 w-100 bg-dark bg-opacity-75 p-2 text-center">
                                        <h3 class="card-title fs-6 fw-semibold text-truncate mb-1 text-white">
                                            {{ $trending->anime->title }}</h3>
                                        <div class="text-white small">
                                            <span>{{ $trending->anime->year }}</span> •
                                            <span>{{ $trending->anime->genres->first()->name ?? '' }}</span>
                                        </div>
                                    </div>
                                    <div class="position-absolute top-2 end-2">
                                        <span class="badge bg-danger rounded-pill">Trending</span>
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
            <h2 class="h5 fw-bold text-light mb-3">Latest Update</h2>
            <div class="row row-cols-2 row-cols-md-4 row-cols-lg-6 g-3">
                @foreach ($latestReleases as $anime)
                    <div class="col">
                        <a href="{{ route('anime.show', $anime->slug) }}" class="text-decoration-none anime-card-link">
                            <div class="card anime-card bg-dark border-0 shadow-lg">
                                <div class="card-image position-relative">
                                    <img src="{{ asset('storage/' . $anime->image) }}" class="card-img-top object-fit-cover"
                                        style="aspect-ratio: 2/3;" alt="{{ $anime->title }}">
                                    <div
                                        class="card-info-overlay position-absolute bottom-0 start-0 w-100 bg-dark bg-opacity-75 p-2 text-center">
                                        <h3 class="card-title fs-6 fw-semibold text-truncate mb-1 text-white">
                                            {{ $anime->title }}</h3>
                                        <div class="text-white small">
                                            <span>{{ $anime->year }}</span> •
                                            <span>{{ $anime->genres->first()->name ?? '' }}</span>
                                        </div>
                                    </div>
                                    <div class="position-absolute top-2 end-2">
                                        <span class="badge bg-danger rounded-pill">Trending</span>
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
