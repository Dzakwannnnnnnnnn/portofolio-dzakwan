@extends('admin.layout')

@section('title','Tambah Project')

@section('content')

<form class="form" action="{{ route('projects.store') }}" method="POST" enctype="multipart/form-data">

  @csrf

  <label>Title</label>
  <input type="text" name="title" value="{{ old('title') }}" required>

  <label>Description</label>
  <textarea name="description">{{ old('description') }}</textarea>

  <label>Image</label>
  <input type="file" name="image" accept="image/*">
  <small>Maksimal 10 MB.</small>

  <label>GitHub Code URL</label>
  <input type="text" name="github_url" value="{{ old('github_url') }}" placeholder="https://github.com/username/repository">

  <label>Demo Website URL</label>
  <input type="text" name="demo_url" value="{{ old('demo_url') }}" placeholder="https://namaproject.com">

  <label>Bahasa / Teknologi</label>
  <textarea name="technologies" placeholder="Contoh: PHP, Laravel, JavaScript, MySQL">{{ old('technologies') }}</textarea>

  <label>Kategori / Peran Project</label>
  <input type="text" name="project_role" value="{{ old('project_role') }}" placeholder="Contoh: Project pribadi, Kolaborator backend, Tim pengembang">

  <button class="btn">Simpan</button>

</form>

@endsection
