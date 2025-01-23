@extends('layouts.app')

@section('content')
    <div class="row g-3">
        @include('layouts.partials.admin_nav')

        <div class="col-12">
            <div class="card bg-body-tertiary">
                <div class="card-header">
                    <h5 class="card-title">Episode List</h5>
                </div>
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <span class="fw-bold bg-dark rounded py-1 px-2">{{ $anime->title }}</span>
                        <a href="{{ route('episode-list.create', $anime->id) }}" class="btn btn-primary">Add Episode</a>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>Episode Number</th>
                                    <th>Episode Title</th>
                                    <th>Episode Slug</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($episodes as $episode)
                                    <tr>
                                        <td>{{ $episode->ep_number }}</td>
                                        <td>{{ $episode->ep_title }}</td>
                                        <td>{{ $episode->ep_slug }}</td>
                                        <td>
                                            <a href="{{ route('episode-list.edit', $episode->id) }}" class="btn btn-sm btn-warning"><i class="bi bi-pencil-square"></i> Edit</a>
                                            <form action="" method="POST" style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger"><i class="bi bi-trash"></i> Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    {{-- pagination --}}
                </div>
            </div>
        </div>
    </div>
@endsection
