@extends('layouts.layout')
@section('content')
<div class="container py-4" style="margin-top: 80px;">
  <div class="text-center mb-5">
    <h2 class="fw-bold">Dokumentasi Kegiatan</h2>
    <p class="text-muted">Galeri foto dan dokumentasi kegiatan terbaru</p>
  </div>
  <div class="row g-4">
    @forelse($documentations as $documentation)
    <div class="col-md-4">
      <div class="card h-100 border-0 shadow-sm rounded-4 overflow-hidden">
        @if($documentation->photos->count() > 0)
        <img src="{{ asset('storage/' . $documentation->photos->first()->photo_path) }}" class="card-img-top"
          alt="{{ $documentation->title }}" style="height: 240px; object-fit: cover;">
        @else
        <div class="bg-light d-flex align-items-center justify-content-center" style="height: 240px; color: #aaa;">No
          Image</div>
        @endif
        <div class="card-body p-4 d-flex flex-column">
          <h5 class="card-title fw-bold">{{ $documentation->title }}</h5>
          <p class="card-text text-muted flex-grow-1" style="font-size: 14px;">{{
            Str::limit($documentation->description, 100) }}</p>
          <a href="{{ route('dokumentasi.show', $documentation) }}" class="btn btn-primary rounded-pill w-100 mt-3"
            style="background-color: #007bff; color: white; border: none;">Lihat Detail</a>
        </div>
      </div>
    </div>
    @empty
    <div class="col-12">
      <div class="alert alert-info">Belum ada dokumentasi.</div>
    </div>
    @endforelse
  </div>
</div>
@endsection