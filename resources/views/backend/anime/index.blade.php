@extends('layouts.app')

@section('content')
    <div class="row g-3">
        @include('layouts.partials.admin_nav')

        <div class="col-12">
            <div class="card bg-body-tertiary">
                <div class="card-header">
                    <h5 class="card-title">Anime List</h5>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <a href="{{ route('anime-list.create') }}" class="btn btn-primary">Add Anime</a>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <td>#</td>
                                    <th>Title</th>
                                    <th>Genres</th>
                                    <th>Year</th>
                                    <th>Status</th>
                                    <th>Created At</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($animes as $index => $anime)
                                    <tr>
                                        <td>{{ ($animes->currentPage() - 1) * $animes->perPage() + $index + 1 }}</td>
                                        <td>{{ $anime->title }}</td>
                                        <td>
                                            @foreach ($anime->genres as $genre)
                                                <span class="badge bg-secondary">{{ $genre->name }}</span>
                                            @endforeach
                                        </td>
                                        <td>{{ $anime->year }}</td>
                                        <td>{{ ucfirst($anime->status) }}</td>
                                        <td>{{ $anime->created_at->format('Y-m-d') }}</td>
                                        <td>
                                            <a href="{{ route('episode-list.index', $anime->id) }}" class="btn btn-sm btn-info"><i class="bi bi-eye"></i> Episode</a>
                                            <a href="{{ route('anime-list.edit', $anime->id) }}"
                                                class="btn btn-sm btn-warning"><i class="bi bi-pencil-square"></i> Edit</a>
                                            <form action="{{ route('anime-list.destroy', $anime->id) }}" method="POST"
                                                style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger"><i
                                                        class="bi bi-trash"></i> Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                    {{ $animes->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
