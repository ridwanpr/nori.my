@extends('layouts.app')

@section('content')
    <div class="row g-3">
        @include('layouts.partials.admin_nav')

        <div class="col-12">
            <div class="row">
                <div class="col-md-3">
                    <div class="card bg-body-tertiary">
                        <div class="card-header">
                            <h5 class="card-title">Create Genre</h5>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('genre.store') }}" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <label class="form-label">Genre Name</label>
                                    <input type="text" name="name" class="form-control"
                                        placeholder="Enter genre name">
                                </div>
                                <button type="submit" class="btn btn-primary">Create Genre</button>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="col-md-9">
                    <div class="card bg-body-tertiary">
                        <div class="card-header">
                            <h5 class="card-title">Genre List</h5>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($genres as $genre)
                                            <tr>
                                                <td>{{ $genre->name }}</td>
                                                <td>
                                                    <a href="{{ route('genre.edit', $genre->id) }}"
                                                        class="btn btn-sm btn-warning">
                                                        <i class="bi bi-pencil-square"></i> Edit
                                                    </a>
                                                    <form action="{{ route('genre.destroy', $genre->id) }}" method="POST"
                                                        style="display:inline-block;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-sm btn-danger">
                                                            <i class="bi bi-trash"></i> Delete
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>

                            <div class="pagination-wrapper">
                                {{ $genres->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
