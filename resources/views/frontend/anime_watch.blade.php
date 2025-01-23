@extends('layouts.app')
@section('content')
    <div class="video-container">
        <div class="container-fluid px-0">
            <div class="video-wrapper">
                <video id="video-player" controls class="w-100">
                    <source src="https://commondatastorage.googleapis.com/gtv-videos-bucket/sample/BigBuckBunny.mp4"
                        type="video/mp4">
                    Your browser does not support the video tag.
                </video>
            </div>
        </div>
    </div>

    <div class="container py-4">
        <div class="row">
            <div class="col-lg-8">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item"><a href="anime-detail.html">One Piece</a></li>
                        <li class="breadcrumb-item active">Episode 1</li>
                    </ol>
                </nav>

                <div class="episode-info-card p-4 rounded-3">
                    <h1 class="h3 mb-3">Episode 1: I'm Luffy! The Man Who's Gonna Be King of the Pirates!</h1>
                    <div class="d-flex gap-3 mb-4">
                        <span class="text-body-secondary">TV-14</span>
                        <span class="text-body-secondary">23m</span>
                        <span class="text-body-secondary">Oct 20, 1999</span>
                    </div>
                    <p class="mb-4">Young Monkey D. Luffy, inspired by the pirate Red-Haired Shanks, begins his journey
                        to become the King of the Pirates. The episode introduces Luffy's unique ability gained from eating
                        the Gum-Gum Devil Fruit.</p>

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
                        <a href="#" class="episode-item active">1</a>
                        <a href="#" class="episode-item">2</a>
                        <a href="#" class="episode-item">3</a>
                        <a href="#" class="episode-item">4</a>
                        <a href="#" class="episode-item">5</a>
                        <a href="#" class="episode-item">6</a>
                        <a href="#" class="episode-item">7</a>
                        <a href="#" class="episode-item">8</a>
                        <a href="#" class="episode-item">9</a>
                        <a href="#" class="episode-item">10</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
