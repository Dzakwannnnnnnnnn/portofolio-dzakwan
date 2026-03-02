@extends('admin.layout')
@section('content')
<div class="container py-5">
  <a href="{{ route('documentations.index') }}" class="btn btn-secondary mb-3">Kembali ke Daftar</a>
  <div class="card mb-4">
    <div class="card-body">
      <h2>{{ $documentation->title }}</h2>
      <p>{{ $documentation->description }}</p>
    </div>
  </div>
  <div class="row">
    @forelse($documentation->photos as $photo)
    <div class="col-md-4 mb-4">
      <div class="card">
        <img src="{{ asset('storage/' . $photo->photo_path) }}" class="card-img-top" alt="Foto Dokumentasi">
      </div>
    </div>
    @empty
    <div class="col-12">
      <div class="alert alert-warning">Belum ada foto dokumentasi.</div>
    </div>
    @endforelse
  </div>
</div>
@endsection