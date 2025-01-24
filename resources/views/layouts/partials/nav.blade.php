<nav class="navbar navbar-expand-lg sticky-top bg-body-tertiary bg-opacity-75">
    <div class="container">
        <a class="navbar-brand me-4" href="{{ route('home') }}">Nori</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-center" id="navbarContent">
            <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                <li class="nav-item px-2">
                    <a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}">
                        <i class="bi bi-house me-2"></i>Home
                    </a>
                </li>
                <li class="nav-item px-2">
                    <a class="nav-link {{ request()->routeIs('anime.index') ? 'active' : '' }}"
                        href="{{ route('anime.index') }}">
                        <i class="bi bi-collection-play me-2"></i>Browse Anime
                    </a>
                </li>
                @guest
                    <li class="nav-item px-2">
                        <a class="nav-link" href="{{ route('bookmark.index') }}">Bookmark</a>
                    </li>
                @endguest
            </ul>
            <form class="d-flex search-bar me-3" role="search" method="GET" action="{{ route('anime.index') }}">
                <input class="form-control" type="search" placeholder="Search anime..." name="search"
                    value="{{ request('search') }}">
            </form>

            <div class="auth-buttons ms-lg-2">
                @guest
                    <a href="{{ route('login') }}" class="btn btn-auth btn-login">
                        <i class="bi bi-box-arrow-in-right"></i> Login
                    </a>
                    <a href="{{ route('register') }}" class="btn btn-auth btn-register">
                        <i class="bi bi-person-plus"></i> Register
                    </a>
                @endguest
                @auth
                    @if (auth()->user()->role_id == 2)
                        <a href="{{ route('bookmark.index') }}" class="btn btn-auth btn-primary text-white">
                            <i class="bi bi-bookmark-heart"></i> Bookmark
                        </a>
                    @elseif (auth()->user()->role_id == 1)
                        <a href="{{ route('dashboard.index') }}" class="btn btn-auth btn-primary text-white">
                            <i class="bi bi-bookmark-heart"></i> Dashboard
                        </a>
                    @endif
                @endauth
            </div>
            <button class="btn theme-toggle ms-3" onclick="toggleTheme()">
                <i class="bi bi-moon-stars"></i>
            </button>
        </div>
    </div>
</nav>
