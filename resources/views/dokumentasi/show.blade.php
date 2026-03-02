@extends('layouts.layout')

@section('content')
<div class="container py-5" style="margin-top: 100px;">
  <div class="mb-4">
    <a href="{{ route('dokumentasi.index') }}" class="btn btn-secondary rounded-pill px-4"
      style="background-color: #6c757d; color: white; border: none;">
      &larr; Kembali
    </a>
  </div>

  <div class="card border-0 shadow-sm rounded-4 p-4 mb-5">
    <h2 class="fw-bold mb-3">{{ $documentation->title }}</h2>
    <p class="text-muted mb-4">
      <small>Diposting tanggal: {{ $documentation->created_at->format('d M Y') }}</small>
    </p>
    <div class="description" style="font-size: 1.1rem; line-height: 1.6; color: #333;">
      {!! nl2br(e($documentation->description)) !!}
    </div>
  </div>

  @if($documentation->photos->count() > 0)
  <h4 class="fw-bold mb-4">Galeri Foto</h4>
  <div class="row g-4">
    @foreach($documentation->photos as $photo)
    <div class="col-md-4 col-sm-6">
      <div class="card border-0 shadow-sm rounded-4 overflow-hidden h-100">
        <img src="{{ asset('storage/' . $photo->photo_path) }}" class="img-fluid w-100"
          style="height: 250px; object-fit: cover;" alt="Foto Dokumentasi">
      </div>
    </div>
    @endforeach
  </div>
  @endif
</div>
@endsection