@extends('layouts.app')
@section('content')
    <section id="anime-list">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item active">Anime List</li>
            </ol>
        </nav>

        <div class="row">
            <div class="col-lg-3 mb-4">
                <div class="filter-sidebar p-3 rounded-3 border">
                    <h4>Filters</h4>
                    <div class="mb-3">
                        <label class="form-label">Genres</label>
                        @foreach ($genres as $genre)
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="genre-{{ $genre->id }}">
                                <label class="form-check-label" for="genre-{{ $genre->id }}">{{ $genre->name }}</label>
                            </div>
                        @endforeach
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Season</label>
                        <select class="form-select">
                            <option>Winter 2024</option>
                            <option>Fall 2023</option>
                            <option>Summer 2023</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Status</label>
                        <select class="form-select">
                            <option>All</option>
                            <option>Ongoing</option>
                            <option>Completed</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Sort By</label>
                        <select class="form-select">
                            <option>Rating</option>
                            <option>Popularity</option>
                            <option>Latest</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="col-lg-9">
                <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-4">
                    @foreach ($animes as $anime)
                        <div class="col">
                            <a href="{{ route('anime.show', $anime->slug) }}" class="card anime-card h-100">
                                <img src="{{ asset('storage/' . $anime->image) }}" class="card-img-top"
                                    alt="{{ $anime->title }}">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $anime->title }}</h5>
                                    <div class="rating mb-2">
                                        @for ($i = 0; $i < 5; $i++)
                                            @if ($i < floor($anime->rating))
                                                <i class="bi bi-star-fill"></i>
                                            @else
                                                <i class="bi bi-star"></i>
                                            @endif
                                        @endfor
                                        <span class="ms-1">{{ $anime->rating }}</span>
                                    </div>
                                    <p class="card-text">
                                        <small class="text-body-secondary">Episodes: {{ $anime->episodes }}</small>
                                    </p>
                                    <div class="mb-3">
                                        @foreach ($anime->genres as $genre)
                                            <span class="genre-tag">{{ $genre->name }}</span>
                                        @endforeach
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>

              {{ $animes->links() }}
            </div>
        </div>
    </section>
@endsection
