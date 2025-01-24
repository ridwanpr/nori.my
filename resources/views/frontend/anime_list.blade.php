@extends('layouts.app')
@push('meta_seo')
    @push('meta_seo')
        <meta name="description"
            content="Temukan anime sub indo terlengkap di Nori.my. Streaming dan download anime terbaru, klasik, dan populer dengan kualitas HD, gratis tanpa biaya.">
    @endpush
@endpush
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
                            <a href="{{ route('anime.show', $anime->slug) }}" class="anime-card-link">
                                <div class="anime-card position-relative">
                                    <div class="anime-card-image position-relative">
                                        <img src="{{ asset('storage/' . $anime->image) }}"
                                            class="img-fluid object-cover w-100" style="aspect-ratio: 2/3;"
                                            alt="{{ $anime->title }}">
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
                {{ $animes->links() }}
            </div>
        </div>
    </section>
@endsection
