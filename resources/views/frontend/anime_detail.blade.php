@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-md-4 mb-4 mb-md-0">
            <img src="{{ asset('storage/' . $anime->image) }}" class="img-fluid rounded-3 shadow" alt="{{ $anime->title }}">
        </div>
        <div class="col-md-8">
            <h1 class="mb-3">{{ $anime->title }}</h1>
            <div class="mb-3">
                @foreach ($anime->genres as $genre)
                    <span class="badge bg-success me-1">{{ $genre->name }}</span>
                @endforeach
            </div>
            <p class="mb-5">{{ $anime->synopsis }}</p>
            <div class="d-flex gap-2 justify-content-start">
                @if ($anime->episode->count() > 0)
                    <a href="{{ route('watch-episode', [$anime->slug, $anime->episode[0]->ep_slug]) }}"
                        class="btn btn-primary">
                        <i class="bi bi-play-fill me-2"></i>Watch Episode 1
                    </a>
                @endif
                @auth
                    @if (auth()->user()->role_id == 2)
                        <button type="button"
                            class="btn {{ $isBookmarked ? 'bg-success text-white bookmarked' : 'bg-warning text-dark' }}"
                            id="bookmark-btn" data-id="{{ $anime->id }}">
                            <i class="bi {{ $isBookmarked ? 'bi-bookmark-heart-fill' : 'bi-bookmark-heart' }} me-2"></i>
                            {{ $isBookmarked ? 'Remove Bookmark' : 'Add to Bookmark' }}
                        </button>
                    @endif
                @endauth
            </div>
        </div>
    </div>
    <div class="py-5">
        <div class="row">
            <div class="col-lg-4">
                <div class="info-sidebar rounded-3">
                    <h4 class="mb-2">Information</h4>
                    <div class="info-item">
                        <span class="info-label">Studio:</span>
                        <span class="info-value">{{ $anime->studio }}</span>
                    </div>
                    <div class="info-item">
                        <span class="info-label">Year:</span>
                        <span class="info-value">{{ $anime->year }}</span>
                    </div>
                    <div class="info-item">
                        <span class="info-label">Duration:</span>
                        <span class="info-value">{{ $anime->duration }} min per ep</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="d-flex justify-content-between align-items-center mt-4 mb-4">
                    <h3>Episodes</h3>
                </div>
                <div class="episode-grid">
                    @foreach ($anime->episode as $episode)
                        <a href="{{ route('watch-episode', [$anime->slug, $episode->ep_slug]) }}"
                            class="episode-card">{{ $episode->ep_number }}</a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
@push('js')
    @if (auth()->user()->role_id == 2)
        @vite('resources/js/detail.js')
    @endif
@endpush
