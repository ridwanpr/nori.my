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
                    <a href="{{ route('anime.show', $anime->anime->slug) }}"
                        class="card shadow-sm overflow-hidden text-decoration-none">
                        <div class="position-relative">
                            <img src="{{ asset('storage/' . $anime->anime->image) }}" class="card-img-top object-fit-cover"
                                style="height: 250px;" alt="{{ $anime->anime->title }}">
                        </div>
                        <div class="card-body p-1">
                            <h6 class="card-title text-truncate text-center">{{ $anime->anime->title }}</h6>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </section>

    <section class="mb-4">
        <h2 class="h4 mb-3">Latest Anime</h2>
        <div class="row row-cols-3 row-cols-md-4 row-cols-lg-6 g-2">
            @foreach ($latestReleases as $anime)
                <div class="col-6 col-md-3">
                    <a href="{{ route('anime.show', $anime->slug) }}" class="text-decoration-none">
                        <div class="card border shadow-sm">
                            <div class="position-relative">
                                <img src="{{ asset('storage/' . $anime->image) }}"
                                    class="card-img-top ratio-2x3 object-fit-cover" alt="{{ $anime->title }}">
                            </div>
                            <div class="card-body p-2 text-center">
                                <h3 class="card-title fs-6 text-truncate mb-1">{{ $anime->title }}</h3>
                                <div class="d-flex justify-content-center small">
                                    <span class="badge bg-dark me-1">{{ $anime->year }}</span>
                                    @if ($anime->genres->count() > 0)
                                        <span class="badge bg-dark">
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
