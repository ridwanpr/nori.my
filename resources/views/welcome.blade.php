@extends('layouts.app')
@push('css')
    <style>
        .ratio-2x3 {
            aspect-ratio: 2/3;
        }
    </style>
@endpush
@section('content')
    <section class="trending-section mb-4">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h2 class="h4 mb-0">Trending</h2>
        </div>
        <div class="trending-scroll d-flex overflow-auto gap-3 pb-3">
            @foreach ($trendingAnime as $anime)
                <div class="trending-card flex-shrink-0" style="width: 180px;">
                    <div class="card shadow-sm overflow-hidden">
                        <div class="position-relative">
                            <img src="{{ asset('storage/' . $anime->anime->image) }}" class="card-img-top object-fit-cover"
                                style="height: 250px;" alt="{{ $anime->anime->title }}">
                            <span class="badge bg-warning text-dark position-absolute top-0 start-0 m-1">
                                <i class="bi bi-star-fill me-1"></i>{{ $anime->rating ?? '8' }}
                            </span>
                        </div>
                        <div class="card-body p-2">
                            <h5 class="card-title text-truncate mb-1">{{ $anime->anime->title }}</h5>
                            <div class="d-flex justify-content-between small text-muted">
                                <span>{{ $anime->anime->year }}</span>
                                <span>{{ $anime->anime->status }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>

    <section class="mb-4">
        <h2 class="h4 mb-3">Latest Anime</h2>
        <div class="row row-cols-3 row-cols-md-4 row-cols-lg-6 g-2">
            @foreach ($latestReleases as $anime)
                <div class="col">
                    <a href="{{ route('anime.show', $anime->slug) }}" class="text-decoration-none">
                        <div class="card border shadow-sm">
                            <div class="position-relative">
                                <img src="{{ asset('storage/' . $anime->image) }}"
                                    class="card-img-top ratio-2x3 object-fit-cover" alt="{{ $anime->title }}">
                                <span class="badge bg-warning text-dark position-absolute top-0 start-0 m-1">
                                    <i class="bi bi-star-fill me-1"></i>{{ $anime->rating ?? '8' }}
                                </span>
                            </div>
                            <div class="card-body p-2 text-center">
                                <h3 class="card-title fs-6 text-truncate mb-1">{{ $anime->title }}</h3>
                                <div class="d-flex justify-content-center small">
                                    <span class="badge bg-secondary me-1">{{ $anime->year }}</span>
                                    @if ($anime->genres->count() > 0)
                                        <span class="badge bg-secondary">
                                            {{ $anime->genres->first()->name }}
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </section>
@endsection
