@extends('layouts.app')

@section('content')
    <div class="row g-3">
        @include('layouts.partials.admin_nav')

        <div class="col-12">
            <div class="card bg-body-tertiary">
                <div class="card-body">
                    <h5 class="card-title">Create Anime</h5>
                    <form action="{{ route('anime-list.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Title</label>
                            <input type="text" class="form-control" name="title" placeholder="Anime Title">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Slug</label>
                            <input type="text" class="form-control" name="slug" placeholder="Slug">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Image</label>
                            <input type="file" class="form-control" name="image">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Status</label>
                            <select class="form-control" name="status">
                                <option value="ongoing">Ongoing</option>
                                <option value="completed">Completed</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Studio</label>
                            <input type="text" class="form-control" name="studio" placeholder="Studio">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Year</label>
                            <input type="number" class="form-control" name="year" placeholder="Year">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Duration</label>
                            <input type="number" class="form-control" name="duration" placeholder="Duration">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Synopsis</label>
                            <textarea class="form-control" name="synopsis" rows="4"></textarea>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Genres</label>
                            <select class="form-control" multiple name="genres[]">
                                @foreach ($genres as $genre)
                                    <option value="{{ $genre->id }}">{{ $genre->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary float-end">Create Anime</button>
                        <a href="{{ route('anime-list.index') }}" class="btn btn-secondary float-end me-2">Back</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
