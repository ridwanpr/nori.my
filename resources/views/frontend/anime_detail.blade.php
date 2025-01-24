@extends('layouts.app')
@section('content')
    <div class="row gy-4 align-items-center">
        <div class="col-md-4">
            <img src="{{ asset('storage/' . $anime->image) }}" class="img-fluid anime-image rounded shadow-sm"
                alt="{{ $anime->title }}">
        </div>

        <div class="col-md-8">
            <h1 class="fw-bold mb-3">{{ $anime->title }}</h1>

            <div class="mb-4">
                @foreach ($anime->genres as $genre)
                    <span class="badge bg-primary me-2">{{ $genre->name }}</span>
                @endforeach
            </div>

            <p class="text-muted mb-4">{{ $anime->synopsis }}</p>

            <div class="d-flex gap-3 flex-wrap">
                <a href="{{ route('watch-episode', [$anime->slug, $anime->episode[0]->ep_slug]) }}"
                    class="btn btn-primary btn-lg btn-sm-md">
                    <i class="bi bi-play-fill me-2"></i>Watch Episode 1
                </a>
                @guest
                    <a href="{{ route('bookmark.index') }}" class="btn btn-outline-secondary text-white btn-lg btn-sm-md">
                        <i class="bi bi-bookmark-heart me-2"></i>Add to Bookmark
                    </a>
                @else
                    <button type="button" id="bookmark-btn"
                        class="btn btn-outline-secondary btn-lg btn-sm-md text-white bookmark-btn"
                        data-is-bookmarked="{{ $isBookmarked ? 'true' : 'false' }}" data-id="{{ $anime->id }}">
                        <i
                            class="bi bi-bookmark-heart me-2"></i>{{ $isBookmarked ? 'Remove from Bookmark' : 'Add to Bookmark' }}
                    </button>
                @endguest
            </div>
        </div>
    </div>

    <div class="row gy-5 mt-2">
        <div class="col-lg-4">
            <div class="p-4 rounded shadow-sm">
                <h4 class="fw-semibold mb-3">Information</h4>
                <ul class="list-unstyled">
                    <li class="d-flex justify-content-between py-2">
                        <span class="text-muted">Studio:</span>
                        <span class="fw-semibold">{{ $anime->studio }}</span>
                    </li>
                    <li class="d-flex justify-content-between py-2">
                        <span class="text-muted">Year:</span>
                        <span class="fw-semibold">{{ $anime->year }}</span>
                    </li>
                    <li class="d-flex justify-content-between py-2">
                        <span class="text-muted">Duration:</span>
                        <span class="fw-semibold">{{ $anime->duration }} min per ep</span>
                    </li>
                </ul>
            </div>
        </div>

        <div class="col-lg-8">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h3 class="fw-bold">Episodes</h3>
            </div>
            <div class="row g-3">
                @foreach ($anime->episode as $episode)
                    <div class="col-6 col-sm-4 col-md-3">
                        <a href="{{ route('watch-episode', [$anime->slug, $episode->ep_slug]) }}"
                            class="btn btn-outline-secondary text-white btn-sm w-100 py-3">
                            Episode {{ $episode->ep_number }}
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <div class="bg-dark p-4 rounded mt-4">
        @include('layouts.partials.disqus-comment')
    </div>
@endsection
@push('js')
    @auth
        @vite('resources/js/detail.js')
    @endauth
@endpush
