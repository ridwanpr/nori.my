@extends('layouts.app')

@section('content')
    <div class="row g-3">
        @include('layouts.partials.admin_nav')

        <div class="col-12">
            <div class="card bg-body-tertiary">
                <div class="card-body">
                    <h5 class="card-title">Edit Genre</h5>

                    <form action="{{ route('genre.update', $genre->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label class="form-label">Genre Name</label>
                            <input type="text" name="name" value="{{ $genre->name }}" class="form-control"
                                placeholder="Enter genre name">
                        </div>
                        <button type="submit" class="btn btn-primary">Update Genre</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
