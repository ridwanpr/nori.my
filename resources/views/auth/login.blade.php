@extends('layouts.app')
@section('content')
    <section>
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="col-12 col-md-8 col-lg-6">
                    <div class="card sticky-top bg-body-tertiary bg-opacity-75">
                        <div class="card-body">
                            <h4 class="card-title text-center">Login</h4>
                            <form>
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email address</label>
                                    <input type="email" class="form-control" id="email" aria-describedby="emailHelp">
                                </div>
                                <div class="mb-3">
                                    <label for="password" class="form-label">Password</label>
                                    <input type="password" class="form-control" id="password">
                                </div>
                                <div class="d-grid gap-2">
                                    <button type="submit" class="btn btn-primary">Login</button>
                                </div>
                                <p class="text-center mt-3">Don't have an account? <a href="#">Register</a></p>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
