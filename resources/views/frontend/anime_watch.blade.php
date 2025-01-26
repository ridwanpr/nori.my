@extends('layouts.app')
@push('meta_seo')
    <meta name="description"
        content="Nonton {{ $anime->title }} sub indo online streaming di Nori.my. Tersedia dalam kualitas HD, update harian, dan gratis. Nikmati anime terlengkap dan terbaru hanya di sini.">
@endpush
@push('css')
    <style>
        #video-player {
            width: 100%;
            aspect-ratio: 16 / 9;
            height: auto;
            display: block;
        }

        @media (min-width: 769px) {
            #video-player {
                width: 80%;
                margin: 0 auto;
            }
        }
    </style>
@endpush

@section('content')
    <div class="video-container">
        <div class="container-fluid px-0">
            <div class="video-wrapper">
                <iframe id="video-player" class="bg-dark" width="100%" height="100%" frameborder="0" style="display:block"
                    allowfullscreen data-src="{{ json_decode($episode->content)[0] }}" loading="lazy"></iframe>
            </div>
        </div>
        <div class="alert alert-info d-flex align-items-center mt-4" role="alert">
            <i class="bi bi-info-circle-fill me-2"></i>
            <div class="text-white">
                Jika video tidak dapat diputar, silakan pilih server lainnya.
            </div>
        </div>
        <div class="server-switcher mt-3">
            <ul class="nav nav-tabs" id="qualityTabs" role="tablist">
                @foreach ($groupedEpisodes as $quality => $episodes)
                    <li class="nav-item" role="presentation">
                        <button class="nav-link {{ $loop->first ? 'active' : '' }}" id="tab-{{ $quality }}"
                            data-bs-toggle="tab" data-bs-target="#content-{{ $quality }}" type="button" role="tab"
                            aria-controls="content-{{ $quality }}"
                            aria-selected="{{ $loop->first ? 'true' : 'false' }}">
                            {{ $quality }}
                        </button>
                    </li>
                @endforeach
            </ul>
            <div class="tab-content" id="qualityTabsContent">
                @foreach ($groupedEpisodes as $quality => $episodes)
                    <div class="tab-pane fade {{ $loop->first ? 'show active' : '' }}" id="content-{{ $quality }}"
                        role="tabpanel" aria-labelledby="tab-{{ $quality }}">
                        <div class="d-flex flex-wrap gap-2 mt-3">
                            @foreach ($episodes as $index => $episode)
                                <button class="btn {{ $index == 0 ? 'btn-primary' : 'btn-secondary' }} switch-server-btn"
                                    data-url="{{ json_decode($episode->content)[0] }}">
                                    Server {{ $index + 1 }}
                                </button>
                            @endforeach
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <div class="container py-4">
        <div class="row">
            <div class="col-lg-8">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item"><a
                                href="{{ route('anime.show', $anime->slug) }}">{{ $anime->title }}</a></li>
                        <li class="breadcrumb-item active">Episode {{ $episode->ep_number }}</li>
                    </ol>
                </nav>
                <div class="episode-info-card p-4 rounded-3">
                    <h1 class="h3 mb-3 text-capitalize">{{ $anime->title }} <br> {{ $episode->ep_title }}</h1>
                    <div class="d-flex gap-3 mb-4">
                        <span class="text-body-secondary">{{ $anime->duration }}m</span>
                        <span class="text-body-secondary">{{ $anime->year }}</span>
                    </div>
                    <p class="mb-4">
                        {{ $anime->synopsis }}
                    </p>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="episodes-sidebar">
                    <h4 class="mb-3">Episodes</h4>
                    <div class="episode-list">
                        @foreach ($allEps as $ep)
                            <a href="{{ route('watch-episode', [$anime->slug, $ep->ep_slug, $ep->ep_number]) }}"
                                class="episode-card">{{ $ep->ep_number }}</a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="bg-dark p-4 rounded mt-4">
        @include('layouts.partials.disqus-comment')
    </div>
@endsection

@push('js')
    @vite('resources/js/watch.js')
@endpush
