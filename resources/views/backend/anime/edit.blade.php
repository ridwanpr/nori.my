@extends('layouts.app')

@section('content')
    <div class="row g-3">
        @include('layouts.partials.admin_nav')

        <div class="col-12">
            <div class="card bg-body-tertiary">
                <div class="card-body">
                    <h5 class="card-title">Edit Anime</h5>

                    <form action="{{ route('anime-list.update', $anime->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label class="form-label">Title</label>
                            <input type="text" name="title" value="{{ old('title', $anime->title) }}"
                                class="form-control" placeholder="Anime Title">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Slug</label>
                            <input type="text" name="slug" value="{{ old('slug', $anime->slug) }}"
                                class="form-control" placeholder="Slug">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Image</label>
                            <input type="file" name="image" class="form-control">
                            @if ($anime->image)
                                <img src="{{ asset('storage/' . $anime->image) }}" class="mt-2" alt="Image" width="100">
                            @endif
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Status</label>
                            <input type="text" name="status" value="{{ old('status', $anime->status) }}"
                                class="form-control" placeholder="Status">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Studio</label>
                            <input type="text" name="studio" value="{{ old('studio', $anime->studio) }}"
                                class="form-control" placeholder="Studio">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Year</label>
                            <input type="number" name="year" value="{{ old('year', $anime->year) }}"
                                class="form-control" placeholder="Year">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Duration</label>
                            <input type="number" name="duration" value="{{ old('duration', $anime->duration) }}"
                                class="form-control" placeholder="Duration">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Synopsis</label>
                            <textarea name="synopsis" class="form-control" rows="4">{{ old('synopsis', $anime->synopsis) }}</textarea>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Genres</label>
                            <select name="genres[]" class="form-control" multiple>
                                @foreach ($genres as $genre)
                                    <option value="{{ $genre->id }}" @if ($anime->genres->contains($genre->id)) selected @endif>
                                        {{ $genre->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Update Anime</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
