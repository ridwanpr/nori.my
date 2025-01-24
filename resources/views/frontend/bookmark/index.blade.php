@extends('layouts.app')
@push('meta_seo')
    <meta name="description"
        content="Kelola dan nonton anime favorit Anda di Nori.my. Akses bookmark anime sub indo dengan mudah, streaming kualitas HD, dan gratis.">
@endpush
@section('content')
    @auth
        <div class="row g-2">
            <div class="col-12">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h5 class="mb-0">Bookmarks</h5>
                    <hr>
                    <div class="d-flex align-items-center">
                        <form method="POST" action="{{ route('logout') }}" class="d-inline">
                            @csrf
                            <button type="submit" class="btn btn-sm btn-danger">Logout</button>
                        </form>
                    </div>
                </div>

                <div class="row row-cols-2 row-cols-sm-3 row-cols-md-4 row-cols-lg-6 g-2">
                    @forelse ($bookmarks as $bookmark)
                        <div class="flex-shrink-0" style="width: 180px;">
                            <a href="{{ route('anime.show', $bookmark->anime->slug) }}"
                                class="card shadow-sm overflow-hidden text-decoration-none">
                                <div class="position-relative">
                                    <img src="{{ asset('storage/' . $bookmark->anime->image) }}"
                                        class="card-img-top object-fit-cover" style="height: 250px;"
                                        alt="{{ $bookmark->anime->title }}">
                                    <span class="badge bg-warning text-dark position-absolute top-0 start-0 m-1">
                                        <i class="bi bi-star-fill me-1"></i>{{ $bookmark->rating ?? '8' }}
                                    </span>
                                </div>
                                <div class="card-body p-1">
                                    <h6 class="card-title text-truncate text-center">{{ $bookmark->anime->title }}</h6>
                                </div>
                                <div class="position-absolute top-0 end-0 m-1">
                                    <form action="{{ route('bookmark.delete', $bookmark->id) }}" method="POST"
                                        class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger"><i
                                                class="bi bi-bookmark-x"></i></button>
                                    </form>
                                </div>
                            </a>
                        </div>
                    @empty
                        <div class="alert alert-info text-center d-block" role="alert">
                            <i class="bi bi-info-circle-fill me-1"></i>
                            No bookmarks
                        </div>
                    @endforelse
                </div>
                <div class="text-center py-4 d-none">
                    <i class="bi bi-bookmark-heart h3 text-muted"></i>
                    <p class="small text-muted mb-2">No bookmarks yet</p>
                    <a href="" class="btn btn-sm btn-primary">Explore Anime</a>
                </div>
            </div>
        </div>
    @endauth
    @guest
        <div class="text-center py-4">
            <p class="mb-2">You need an account to use the bookmark feature</p>
            <a href="{{ route('login') }}" class="btn btn-login"><i class="bi bi-box-arrow-in-right me-1"></i> Login</a>
            <a href="{{ route('register') }}" class="btn btn-primary"><i class="bi bi-person-plus me-1"></i>
                Register</a>
        </div>
    @endguest
@endsection
