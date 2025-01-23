@extends('layouts.app')
@section('content')
    <section class="mb-5">
        <h2 class="mb-4">Trending</h2>
        <div class="trending-scroll d-flex gap-3">
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
        </div>
    </section>

    <section class="mb-5">
        <h2 class="mb-4">Latest Anime</h2>
        <div class="row row-cols-2 row-cols-md-3 row-cols-lg-5 g-3">
            @foreach ($latestReleases as $anime)
                <div class="col">
                    <a href="{{ route('anime.show', $anime->slug) }}" class="card anime-card h-100">
                        <img src="{{ asset('storage/' . $anime->image) }}" class="card-img-top" alt="Anime Title">
                        <div class="card-body p-2">
                            <h6 class="card-title mb-1 text-truncate">{{ $anime->title }}</h6>
                            <div class="rating mb-2">
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star"></i>
                                <span class="ms-1">{{ $anime->rating }}</span>
                            </div>
                            <small class="text-body-secondary">Episodes: {{ $anime->episodes }}</small>
                            <div class="mt-2">
                                @foreach ($anime->genres as $genre)
                                    <span class="genre-tag small">{{ $genre->name }}</span>
                                @endforeach
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
                    <a href="{{ route('anime.show', $anime->slug) }}" class="card anime-card h-100">
                        <img src="{{ asset('storage/' . $anime->image) }}" class="card-img-top" alt="Anime Title">
                        <div class="card-body p-2">
                            <h6 class="card-title mb-1 text-truncate">{{ $anime->title }}</h6>
                            <div class="rating mb-2">
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star"></i>
                                <span class="ms-1">{{ $anime->rating }}</span>
                            </div>
                            <small class="text-body-secondary">Episodes: {{ $anime->episodes }}</small>
                            <div class="mt-2">
                                @foreach ($anime->genres as $genre)
                                    <span class="genre-tag small">{{ $genre->name }}</span>
                                @endforeach
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </section>
@endsection
