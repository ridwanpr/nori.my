@extends('layouts.app')

@section('content')
    <div class="row g-3">

        @include('layouts.partials.admin_nav')

        <div class="col-12 col-md-9 col-lg-10">
            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h5 class="mb-0">Dashboard</h5>
                        <div class="btn-group">
                            <form method="POST" action="{{ route('logout') }}" class="d-inline">
                                @csrf
                                <button type="submit" class="btn btn-sm btn-danger">Logout</button>
                            </form>
                        </div>
                    </div>

                    <div class="row g-3">
                        <div class="col-12 col-sm-6 col-lg-3">
                            <div class="card bg-body-tertiary border-0">
                                <div class="card-body">
                                    <h6 class="text-muted">Total Anime</h6>
                                    <h3 class="mb-0">0</h3>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-lg-3">
                            <div class="card bg-body-tertiary border-0">
                                <div class="card-body">
                                    <h6 class="text-muted">Total Users</h6>
                                    <h3 class="mb-0">{{ $totalUser }}</h3>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-lg-3">
                            <div class="card bg-body-tertiary border-0">
                                <div class="card-body">
                                    <h6 class="text-muted">Total Genre</h6>
                                    <h3 class="mb-0">{{ $totalGenre }}</h3>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-lg-3">
                            <div class="card bg-body-tertiary border-0">
                                <div class="card-body">
                                    <h6 class="text-muted">Total Episode</h6>
                                    <h3 class="mb-0">0</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
