@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="row">
        <div class="col-12">
            <h1 class="mb-4">Anime Genres</h1>
            
            <!-- Genre Grid -->
            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
                <!-- Action Genre -->
                <div class="col">
                    <div class="card h-100">
                        <div class="card-body">
                            <h5 class="card-title">Action</h5>
                            <p class="card-text text-muted">Physical feats, battles, and high-energy conflict.</p>
                            <p class="card-text"><small class="text-muted">1,234 titles</small></p>
                            <a href="#" class="stretched-link"></a>
                        </div>
                    </div>
                </div>

                <!-- Adventure Genre -->
                <div class="col">
                    <div class="card h-100">
                        <div class="card-body">
                            <h5 class="card-title">Adventure</h5>
                            <p class="card-text text-muted">Journey, exploration, and quest-driven stories.</p>
                            <p class="card-text"><small class="text-muted">987 titles</small></p>
                            <a href="#" class="stretched-link"></a>
                        </div>
                    </div>
                </div>

                <!-- Comedy Genre -->
                <div class="col">
                    <div class="card h-100">
                        <div class="card-body">
                            <h5 class="card-title">Comedy</h5>
                            <p class="card-text text-muted">Humorous situations and light-hearted entertainment.</p>
                            <p class="card-text"><small class="text-muted">1,567 titles</small></p>
                            <a href="#" class="stretched-link"></a>
                        </div>
                    </div>
                </div>

                <!-- Drama Genre -->
                <div class="col">
                    <div class="card h-100">
                        <div class="card-body">
                            <h5 class="card-title">Drama</h5>
                            <p class="card-text text-muted">Character-driven stories with emotional depth.</p>
                            <p class="card-text"><small class="text-muted">1,432 titles</small></p>
                            <a href="#" class="stretched-link"></a>
                        </div>
                    </div>
                </div>

                <!-- Fantasy Genre -->
                <div class="col">
                    <div class="card h-100">
                        <div class="card-body">
                            <h5 class="card-title">Fantasy</h5>
                            <p class="card-text text-muted">Magical worlds and supernatural elements.</p>
                            <p class="card-text"><small class="text-muted">876 titles</small></p>
                            <a href="#" class="stretched-link"></a>
                        </div>
                    </div>
                </div>

                <!-- Sci-Fi Genre -->
                <div class="col">
                    <div class="card h-100">
                        <div class="card-body">
                            <h5 class="card-title">Sci-Fi</h5>
                            <p class="card-text text-muted">Scientific concepts and futuristic settings.</p>
                            <p class="card-text"><small class="text-muted">654 titles</small></p>
                            <a href="#" class="stretched-link"></a>
                        </div>
                    </div>
                </div>

                <!-- Romance Genre -->
                <div class="col">
                    <div class="card h-100">
                        <div class="card-body">
                            <h5 class="card-title">Romance</h5>
                            <p class="card-text text-muted">Love stories and romantic relationships.</p>
                            <p class="card-text"><small class="text-muted">987 titles</small></p>
                            <a href="#" class="stretched-link"></a>
                        </div>
                    </div>
                </div>

                <!-- Slice of Life Genre -->
                <div class="col">
                    <div class="card h-100">
                        <div class="card-body">
                            <h5 class="card-title">Slice of Life</h5>
                            <p class="card-text text-muted">Daily life experiences and character interactions.</p>
                            <p class="card-text"><small class="text-muted">543 titles</small></p>
                            <a href="#" class="stretched-link"></a>
                        </div>
                    </div>
                </div>

                <!-- Horror Genre -->
                <div class="col">
                    <div class="card h-100">
                        <div class="card-body">
                            <h5 class="card-title">Horror</h5>
                            <p class="card-text text-muted">Scary and suspenseful content.</p>
                            <p class="card-text"><small class="text-muted">321 titles</small></p>
                            <a href="#" class="stretched-link"></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
