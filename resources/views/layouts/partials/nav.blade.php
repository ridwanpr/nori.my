<nav class="navbar navbar-expand-lg sticky-top bg-body-tertiary bg-opacity-75">
    <div class="container">
        <!-- Added me-4 to create more space after the logo -->
        <a class="navbar-brand me-4" href="#">Nori</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent">
            <span class="navbar-toggler-icon"></span>
        </button>
        <!-- Added justify-content-center to center the content -->
        <div class="collapse navbar-collapse justify-content-center" id="navbarContent">
            <!-- Added mx-auto to center the nav items and adjusted spacing -->
            <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                <li class="nav-item px-2">
                    <a class="nav-link active" href="/">Home</a>
                </li>
                <li class="nav-item px-2">
                    <a class="nav-link" href="/anime-list">Anime List</a>
                </li>
                <li class="nav-item px-2">
                    <a class="nav-link" href="/anime-detail">Anime Detail</a>
                </li>
                <li class="nav-item px-2">
                    <a class="nav-link" href="/anime-watch">Anime Watch</a>
                </li>
            </ul>
            <!-- Added me-3 to create space between search and auth buttons -->
            <form class="d-flex search-bar me-3" role="search">
                <input class="form-control" type="search" placeholder="Search anime...">
            </form>
            <div class="auth-buttons ms-lg-2">
                <a href="{{ route('login') }}" class="btn btn-auth btn-login me-2">Login</a>
                <a href="#" class="btn btn-auth btn-register">Register</a>
            </div>
            <button class="btn theme-toggle ms-3" onclick="toggleTheme()">
                <i class="bi bi-moon-stars"></i>
            </button>
        </div>
    </div>
</nav>
