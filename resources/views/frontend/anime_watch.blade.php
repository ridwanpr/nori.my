@extends('layouts.app')
@push('css')
    <style>

    </style>
@endpush
@section('content')
    <div class="video-container">
        <div class="container-fluid px-0">
            <div class="video-wrapper">
                <iframe id="video-player" width="100%" height="100%" frameborder="0" style="display:block" allowfullscreen
                    src="{{ $episode->content[0] }}"></iframe>
            </div>
        </div>

        <div class="server-switcher mt-3">
            <h5>Switch Server:</h5>
            <div class="d-flex flex-wrap gap-2">
                @foreach ($episode->content as $index => $url)
                    <button class="btn btn-secondary switch-server-btn" data-url="{{ $url }}">
                        Server {{ $index + 1 }}
                    </button>
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
                    <h1 class="h3 mb-3">Episode {{ $episode->ep_number }} {{ $episode->ep_title }}</h1>
                    <div class="d-flex gap-3 mb-4">
                        <span class="text-body-secondary">{{ $anime->duration }}m</span>
                        <span class="text-body-secondary">{{ $anime->year }}</span>
                    </div>
                    <p class="mb-4">
                        {{ $anime->synopsis }}
                    </p>

                    <div class="episode-navigation">
                        <button class="btn btn-outline-secondary" disabled>
                            <i class="bi bi-chevron-left"></i>
                            <span>Ep. 1</span>
                        </button>
                        <button class="btn btn-next ms-auto">
                            <span>Ep. 2</span>
                            <i class="bi bi-chevron-right"></i>
                        </button>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="episodes-sidebar">
                    <h4 class="mb-3">Episodes</h4>
                    <div class="episode-list">
                        @foreach ($anime->episode as $ep)
                            <a href="{{ route('watch-episode', [$anime->slug, $ep->ep_slug]) }}"
                                class="episode-card">{{ $ep->ep_number }}</a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const videoPlayer = document.getElementById('video-player');

            if (!videoPlayer) {
                console.error('Video player iframe not found!');
                return;
            }

            document.querySelectorAll('.switch-server-btn').forEach(button => {
                button.addEventListener('click', function() {
                    const newUrl = this.getAttribute('data-url');
                    videoPlayer.src = newUrl;
                    document.querySelectorAll('.switch-server-btn').forEach(btn => {
                        btn.classList.remove('btn-primary');
                        btn.classList.add('btn-secondary');
                    });
                    this.classList.remove('btn-secondary');
                    this.classList.add('btn-primary');
                });
            });
        });

        document.addEventListener('DOMContentLoaded', function() {
            const iframe = document.getElementById('video-player');
            const wrapper = iframe.parentElement;

            function adjustIframe() {
                const wrapperWidth = wrapper.offsetWidth;
                const wrapperHeight = wrapperWidth * 9 / 16;
                iframe.style.height = `${wrapperHeight}px`;
            }

            adjustIframe();
            window.addEventListener('resize', adjustIframe);
        });
    </script>
@endpush
