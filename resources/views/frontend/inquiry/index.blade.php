@extends('layouts.app')
@push('meta_seo')
    <meta name="description"
        content="Nonton anime sub indo online streaming di Nori.my. Tersedia dalam kualitas HD, update harian, dan gratis. Nikmati anime terlengkap dan terbaru hanya di sini.">
@endpush

@section('content')
    <div class="card bg-body-tertiary">
        <div class="card-header">
            <h5 class="card-title">Contact Admin</h5>
        </div>
        <div class="card-body">
            <div class="alert alert-info mt-3" role="alert">
                Silakan gunakan form ini untuk melaporkan link yang mati atau request anime yang belum tersedia di Nori.
            </div>
            <form action="{{ route('inquiry.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" class="form-control" id="title" name="title" required>
                </div>
                <div class="mb-3">
                    <label for="content" class="form-label">Content</label>
                    <textarea class="form-control" id="content" name="content" required></textarea>
                </div>
                <div class="mb-3">
                    <x-turnstile />
                </div>
                <button type="submit" class="btn btn-primary">Send</button>
            </form>
        </div>
    </div>
@endsection

@push('js')
@endpush
