@extends('layouts.app')

@section('content')
    <div class="row g-3">
        @include('layouts.partials.admin_nav')

        <div class="col-12">
            <div class="card bg-body-tertiary">
                <div class="card-header">
                    <h5 class="card-title">Inquiry List</h5>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <a href="" class="btn btn-primary">Add Anime</a>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <td>#</td>
                                    <th>Title</th>
                                    <th>Content</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($inquiries as $index => $inquiry)
                                    <tr>
                                        <td>{{ ($inquiries->currentPage() - 1) * $inquiries->perPage() + $index + 1 }}</td>
                                        <td>{{ $inquiry->title }}</td>
                                        <td>{{ Str::limit($inquiry->content, 100) }}</td>
                                        <td>
                                            <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal"
                                                data-bs-target="#contentModal" data-inquiry-id="{{ $inquiry->id }}">
                                                <i class="bi bi-eye"></i> View More
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    {{ $inquiries->links() }}
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="contentModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="contentModalLabel"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        <i class="bi bi-x-lg"></i> Close
                    </button>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('js')
    <script>
        const modalTriggers = document.querySelectorAll('.btn[data-bs-toggle="modal"][data-inquiry-id]');
        const inquiriesData = @json($inquiries);

        modalTriggers.forEach(button => {
            button.addEventListener('click', function() {
                const inquiryId = this.getAttribute('data-inquiry-id');
                const inquiry = inquiriesData.data.find(item => item.id == inquiryId);

                if (inquiry) {
                    document.getElementById('contentModalLabel').textContent = inquiry.title;
                    document.querySelector('#contentModal .modal-body').textContent = inquiry.content;
                }
            });
        });
    </script>
@endpush
