<nav class="navbar navbar-expand-lg border-0 shadow-sm rounded-3">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#adminNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="adminNavbar">
            <div class="navbar-nav">
                <a href="{{ route('dashboard.index') }}"
                    class="nav-item nav-link {{ request()->url() == route('dashboard.index') ? 'active' : '' }}">
                    <i class="bi bi-speedometer2 me-2"></i>Dashboard
                </a>
                <a href="{{ route('anime-list.index') }}" class="nav-item nav-link">
                    <i class="bi bi-collection-play me-2"></i>Anime
                </a>
                <a href="{{ route('genre.index') }}"
                    class="nav-item nav-link {{ request()->url() == route('genre.index') ? 'active' : '' }}">
                    <i class="bi bi-tags me-2"></i>Genres
                </a>
                <a href="#" class="nav-item nav-link">
                    <i class="bi bi-people me-2"></i>Users
                </a>
            </div>
        </div>
    </div>
</nav>
