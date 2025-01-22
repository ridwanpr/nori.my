@extends('layouts.app')

@section('content')
    @auth
        <div class="row g-2">
            <div class="col-12">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h5 class="mb-0">Bookmarks</h5>
                    <hr>
                    <div class="d-flex align-items-center">
                        <select class="form-select form-select-sm w-auto me-2">
                            <option>Recently Added</option>
                            <option>Title (A-Z)</option>
                            <option>Rating</option>
                        </select>
                        <form method="POST" action="{{ route('logout') }}" class="d-inline">
                            @csrf
                            <button type="submit" class="btn btn-sm btn-danger">Logout</button>
                        </form>
                    </div>
                </div>

                <!-- Compact Bookmarks Grid -->
                <div class="row row-cols-2 row-cols-sm-3 row-cols-md-4 row-cols-lg-6 g-2">
                    <!-- Bookmark Item -->
                    <div class="col">
                        <div class="card h-100  shadow-sm">
                            <img src="/placeholder-anime-1.jpg" class="card-img-top" alt="Anime Title 1">
                            <div class="card-body p-2">
                                <h6 class="card-title mb-1 text-truncate">Attack on Titan</h6>
                                <div class="d-flex justify-content-between align-items-center">
                                    <small class="text-muted">Ep: 24</small>
                                    <button type="button" class="btn btn-sm p-0 text-danger">
                                        <i class="bi bi-bookmark-x"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Bookmark Item -->
                    <div class="col">
                        <div class="card h-100  shadow-sm">
                            <img src="/placeholder-anime-2.jpg" class="card-img-top" alt="Anime Title 2">
                            <div class="card-body p-2">
                                <h6 class="card-title mb-1 text-truncate">Demon Slayer</h6>
                                <div class="d-flex justify-content-between align-items-center">
                                    <small class="text-muted">Ep: 26</small>
                                    <button type="button" class="btn btn-sm p-0 text-danger">
                                        <i class="bi bi-bookmark-x"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Bookmark Item -->
                    <div class="col">
                        <div class="card h-100  shadow-sm">
                            <img src="/placeholder-anime-3.jpg" class="card-img-top" alt="Anime Title 3">
                            <div class="card-body p-2">
                                <h6 class="card-title mb-1 text-truncate">My Hero Academia</h6>
                                <div class="d-flex justify-content-between align-items-center">
                                    <small class="text-muted">Ep: 25</small>
                                    <button type="button" class="btn btn-sm p-0 text-danger">
                                        <i class="bi bi-bookmark-x"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Bookmark Item -->
                    <div class="col">
                        <div class="card h-100  shadow-sm">
                            <img src="/placeholder-anime-4.jpg" class="card-img-top" alt="Anime Title 4">
                            <div class="card-body p-2">
                                <h6 class="card-title mb-1 text-truncate">Death Note</h6>
                                <div class="d-flex justify-content-between align-items-center">
                                    <small class="text-muted">Ep: 37</small>
                                    <button type="button" class="btn btn-sm p-0 text-danger">
                                        <i class="bi bi-bookmark-x"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Compact Empty State -->
                <div class="text-center py-4 d-none">
                    <i class="bi bi-bookmark-heart h3 text-muted"></i>
                    <p class="small text-muted mb-2">No bookmarks yet</p>
                    <a href="/anime-list" class="btn btn-sm btn-primary">Explore Anime</a>
                </div>
            </div>
        </div>
    @endauth
    @guest
        <div class="text-center py-4">
            <p class="mb-2">You need an account to use the bookmark feature</p>
            <a href="{{ route('login') }}" class="btn btn-login"><i class="bi bi-box-arrow-in-right me-1"></i> Login</a>
            <a href="{{ route('register') }}" class="btn btn-primary"><i class="bi bi-person-plus me-1"></i> Register</a>
        </div>
    @endguest
@endsection
