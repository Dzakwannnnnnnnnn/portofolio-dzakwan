@extends('admin.layout')

@section('title','Edit Project')

@section('content')

<form class="form" action="{{ route('projects.update', $project->id) }}" method="POST" enctype="multipart/form-data">

  @csrf
  @method('PUT')

  <label>Title</label>
  <input type="text" name="title" value="{{ old('title', $project->title) }}" required>

  <label>Description</label>
  <textarea name="description">{{ old('description', $project->description) }}</textarea>

  <label>Image</label>
  <input type="file" name="image">

  <label>GitHub Code URL</label>
  <input type="text" name="github_url" value="{{ old('github_url', $project->github_url) }}" placeholder="https://github.com/username/repository">

  <label>Demo Website URL</label>
  <input type="text" name="demo_url" value="{{ old('demo_url', $project->demo_url) }}" placeholder="https://namaproject.com">

  <label>Bahasa / Teknologi</label>
  <textarea name="technologies" placeholder="Contoh: PHP, Laravel, JavaScript, MySQL">{{ old('technologies', $project->technologies) }}</textarea>

  <label>Kategori / Peran Project</label>
  <input type="text" name="project_role" value="{{ old('project_role', $project->project_role) }}" placeholder="Contoh: Project pribadi, Kolaborator backend, Tim pengembang">

  <button class="btn">Update</button>

</form>

@endsection
