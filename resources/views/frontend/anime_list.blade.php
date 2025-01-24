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
                <form action="{{ route('anime.index') }}" method="GET">
                    <div class="filter-sidebar p-3 rounded-3 border">
                        <h4>Filters</h4>
                        <div class="mb-3">
                            <label class="form-label">Genres</label>
                            @foreach ($genres as $genre)
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="genre-{{ $genre->id }}"
                                        name="genres[]" value="{{ $genre->id }}"
                                        {{ in_array($genre->id, request('genres', [])) ? 'checked' : '' }}>
                                    <label class="form-check-label"
                                        for="genre-{{ $genre->id }}">{{ $genre->name }}</label>
                                </div>
                            @endforeach
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Year</label>
                            <select class="form-select" name="year">
                                <option value="">All</option>
                                @for ($i = 2025; $i >= 2010; $i--)
                                    <option value="{{ $i }}" {{ request('year') == $i ? 'selected' : '' }}>
                                        {{ $i }}</option>
                                @endfor
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Status</label>
                            <select class="form-select" name="status">
                                <option value="">All</option>
                                <option value="ongoing" {{ request('status') == 'ongoing' ? 'selected' : '' }}>Ongoing
                                </option>
                                <option value="completed" {{ request('status') == 'completed' ? 'selected' : '' }}>
                                    Completed</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Sort By</label>
                            <select class="form-select" name="sort_by">
                                <option value="latest" {{ request('sort_by') == 'latest' ? 'selected' : '' }}>Latest
                                </option>
                                <option value="popularity" {{ request('sort_by') == 'popularity' ? 'selected' : '' }}>
                                    Popularity</option>
                            </select>
                        </div>

                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary">Apply</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-lg-9">
                <div class="row row-cols-2 row-cols-md-3 row-cols-lg-4 g-4">
                    @foreach ($animes as $anime)
                        <div class="col-6 col-md-4">
                            <a href="{{ route('anime.show', $anime->slug) }}" class="text-decoration-none">
                                <div class="card h-100 position-relative">
                                    <div class="card-image position-relative">
                                        <img src="{{ asset('storage/' . $anime->image) }}"
                                            class="card-img-top object-cover h-100 w-100" alt="{{ $anime->title }}">
                                        <span class="badge bg-warning text-dark position-absolute top-0 start-0 m-2">
                                            <i class="bi bi-star-fill me-1"></i> 8
                                        </span>
                                    </div>
                                    <div class="card-body text-center p-1">
                                        <h2 class="card-title fs-6 fw-bold text-truncate mb-0">{{ $anime->title }}</h2>
                                        <div class="my-1">
                                            <span class="badge bg-dark text-light">{{ $anime->year }}</span>
                                            @if ($anime->genres->count() > 0)
                                                <span
                                                    class="badge bg-dark text-light">{{ $anime->genres->first()->name }}</span>
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
                <div class="mt-4">
                    {{ $animes->links() }}
                </div>
            </div>
        </div>
    </section>
@endsection
