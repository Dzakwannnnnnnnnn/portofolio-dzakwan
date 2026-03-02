@extends('admin.layout')
@section('title','Tambah Dokumentasi')
@section('content')
<div class="cards">
  <div class="card" style="width: 100%;">
    <h3 class="mb-4">Tambah Dokumentasi Kegiatan</h3>
    <form action="{{ route('documentations.store') }}" method="POST" enctype="multipart/form-data">
      @csrf
      <div class="mb-3">
        <label for="title" class="form-label">Judul</label>
        <input type="text" name="title" id="title" class="form-control" required>
      </div>
      <div class="mb-3">
        <label for="description" class="form-label">Deskripsi</label>
        <textarea name="description" id="description" class="form-control" rows="4" required></textarea>
      </div>
      <div class="mb-3">
        <label for="photos" class="form-label">Foto Dokumentasi (bisa lebih dari satu)</label>
        <input type="file" name="photos[]" id="photos" class="form-control" multiple accept="image/*">
      </div>
      <button type="submit" class="btn btn-primary">Simpan</button>
      <a href="{{ route('documentations.index') }}" class="btn btn-secondary" style="color: white;">Kembali</a>
    </form>
  </div>
</div>
@endsection