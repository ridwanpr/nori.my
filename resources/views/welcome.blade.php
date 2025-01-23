@extends('layouts.app')
@section('content')
    <section class="mb-5">
        <h2 class="mb-4">Trending</h2>
        <div class="trending-scroll d-flex gap-3">
            <div class="card anime-card border" style="min-width: 250px;">
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
        </div>
    </section>

    <section class="mb-5">
        <h2 class="mb-4">Latest Anime</h2>
        <div class="row row-cols-2 row-cols-md-3 row-cols-lg-5 g-3">
            @foreach ($latestReleases as $anime)
                <div class="col">
                    <a href="{{ route('anime.show', $anime->slug) }}" class="text-decoration-none">
                        <div class="card h-100 position-relative">
                            <div class="card-image position-relative">
                                <img src="{{ asset('storage/' . $anime->image) }}" class="card-img-top object-cover "
                                    alt="{{ $anime->title }}">
                                <span class="badge bg-warning text-dark position-absolute top-0 start-0 m-2">
                                    <i class="bi bi-star-fill me-1"></i> 8
                                </span>
                            </div>
                            <div class="card-body text-center p-1">
                                <h2 class="card-title fs-6 fw-bold text-truncate mb-0">{{ $anime->title }}</h2>
                                <div class="my-1">
                                    <span class="badge bg-dark text-light">{{ $anime->year }}</span>
                                    @if ($anime->genres->count() > 0)
                                        <span class="badge bg-dark text-light">{{ $anime->genres->first()->name }}</span>
                                    @endif
                                    <span class="badge bg-dark text-light">
                                        <i class="bi bi-star-fill"></i>
                                        9
                                    </span>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </section>

    <section class="mb-5">
        <h2 class="mb-4">Latest Episodes</h2>
        <div class="row row-cols-2 row-cols-md-3 row-cols-lg-5 g-3">
            @foreach ($latestReleases as $anime)
                <div class="col">
                    <a href="{{ route('anime.show', $anime->slug) }}" class="text-decoration-none">
                        <div class="card h-100 position-relative">
                            <div class="card-image position-relative">
                                <img src="{{ asset('storage/' . $anime->image) }}" class="card-img-top object-cover "
                                    alt="{{ $anime->title }}">
                                <span class="badge bg-warning text-dark position-absolute top-0 start-0 m-2">
                                    <i class="bi bi-star-fill me-1"></i> 8
                                </span>
                            </div>
                            <div class="card-body text-center p-1">
                                <h2 class="card-title fs-6 fw-bold text-truncate mb-0">{{ $anime->title }}</h2>
                                <div class="my-1">
                                    <span class="badge bg-dark text-light">{{ $anime->year }}</span>
                                    @if ($anime->genres->count() > 0)
                                        <span class="badge bg-dark text-light">{{ $anime->genres->first()->name }}</span>
                                    @endif
                                    <span class="badge bg-dark text-light">
                                        <i class="bi bi-star-fill"></i>
                                        9
                                    </span>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </section>
@endsection
