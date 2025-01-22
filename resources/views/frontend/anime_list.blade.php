@extends('layouts.app')
@section('content')
    <section id="anime-list">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item active">Anime List</li>
            </ol>
        </nav>

        <div class="row">
            <!-- Filters Sidebar -->
            <div class="col-lg-3 mb-4">
                <div class="filter-sidebar p-3 rounded-3 border">
                    <h4>Filters</h4>
                    <div class="mb-3">
                        <label class="form-label">Genres</label>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="action">
                            <label class="form-check-label" for="action">Action</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="romance">
                            <label class="form-check-label" for="romance">Romance</label>
                        </div>
                        <!-- Add more genres -->
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Season</label>
                        <select class="form-select">
                            <option>Winter 2024</option>
                            <option>Fall 2023</option>
                            <option>Summer 2023</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Status</label>
                        <select class="form-select">
                            <option>All</option>
                            <option>Ongoing</option>
                            <option>Completed</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Sort By</label>
                        <select class="form-select">
                            <option>Rating</option>
                            <option>Popularity</option>
                            <option>Latest</option>
                        </select>
                    </div>
                </div>
            </div>

            <!-- Anime Grid -->
            <div class="col-lg-9">
                <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-4">
                    <!-- Anime Card -->
                    <div class="col">
                        <a href="anime-detail.html" class="card anime-card h-100">
                            <img src="https://via.placeholder.com/250x141" class="card-img-top" alt="Anime Title">
                            <div class="card-body">
                                <h5 class="card-title">One Piece</h5>
                                <div class="rating mb-2">
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star"></i>
                                    <span class="ms-1">4.0</span>
                                </div>
                                <p class="card-text">
                                    <small class="text-body-secondary">Episodes: 1000+</small>
                                </p>
                                <div class="mb-3">
                                    <span class="genre-tag">Adventure</span>
                                    <span class="genre-tag">Action</span>
                                </div>
                            </div>
                        </a>
                    </div>
                    <!-- More anime cards -->
                </div>

                <!-- Pagination -->
                <nav class="mt-4">
                    <ul class="pagination justify-content-center">
                        <li class="page-item disabled">
                            <a class="page-link" href="#" tabindex="-1">Previous</a>
                        </li>
                        <li class="page-item active"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item">
                            <a class="page-link" href="#">Next</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </section>
@endsection
