@extends('admin.layout')
@section('content')
<div class="container py-5">
  <h2 class="mb-4">Edit Dokumentasi Kegiatan</h2>
  <form action="{{ route('documentations.update', $documentation) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="mb-3">
      <label for="title" class="form-label">Judul</label>
      <input type="text" name="title" id="title" class="form-control" value="{{ $documentation->title }}" required>
    </div>
    <div class="mb-3">
      <label for="description" class="form-label">Deskripsi</label>
      <textarea name="description" id="description" class="form-control" rows="4"
        required>{{ $documentation->description }}</textarea>
    </div>
    <div class="mb-3">
      <label for="photos" class="form-label">Tambah Foto Dokumentasi (bisa lebih dari satu)</label>
      <input type="file" name="photos[]" id="photos" class="form-control" multiple accept="image/*">
    </div>
    <button type="submit" class="btn btn-primary">Update Dokumentasi</button>
  </form>
  <hr>
  <h4>Foto Dokumentasi Saat Ini</h4>
  <div class="row">
    @forelse($documentation->photos as $photo)
    <div class="col-md-3 mb-3">
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