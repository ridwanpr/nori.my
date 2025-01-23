@extends('layouts.app')

@section('content')
    <div class="row g-3">
        @include('layouts.partials.admin_nav')

        <div class="col-12">
            <div class="card bg-body-tertiary">
                <div class="card-header">
                    <h5 class="card-title">Add Episode</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('episode-list.store', $anime->id) }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="ep_number" class="form-label">Episode Number</label>
                                <input type="number" class="form-control" id="ep_number" name="ep_number" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="ep_title" class="form-label">Episode Title</label>
                                <input type="text" class="form-control" id="ep_title" name="ep_title" required>
                            </div>
                        </div>

                        <div class="mb-3" id="content-urls-container">
                            <label class="form-label">Content URLs</label>
                            <div class="input-group mb-2">
                                <input type="url" class="form-control content-url" name="content_urls[]"
                                    placeholder="Enter embed URL" required>
                                <button type="button" class="btn btn-success add-url-btn">+</button>
                            </div>
                        </div>

                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary">Save Episode</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('js')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const container = document.getElementById('content-urls-container');
            const addUrlBtn = document.querySelector('.add-url-btn');

            addUrlBtn.addEventListener('click', function() {
                const newUrlInput = document.createElement('div');
                newUrlInput.className = 'input-group mb-2';
                newUrlInput.innerHTML = `
                <input type="url" class="form-control content-url" name="content_urls[]" placeholder="Enter embed URL" required>
                <button type="button" class="btn btn-danger remove-url-btn">-</button>
            `;
                container.appendChild(newUrlInput);

                newUrlInput.querySelector('.remove-url-btn').addEventListener('click', function() {
                    newUrlInput.remove();
                });
            });
        });
    </script>
@endpush
