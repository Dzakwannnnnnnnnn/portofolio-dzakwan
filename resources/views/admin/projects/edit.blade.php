@extends('admin.layout')

@section('title','Edit Project')

@section('content')

<form class="form" action="{{ route('projects.update', $project->id) }}" method="POST" enctype="multipart/form-data">

  @csrf
  @method('PUT')

  <label>Title</label>
  <input type="text" name="title" value="{{ $project->title }}" required>

  <label>Description</label>
  <textarea name="description">{{ $project->description }}</textarea>

  <label>Image</label>
  <input type="file" name="image">

  <label>Link</label>
  <input type="text" name="link" value="{{ $project->link }}">

  <button class="btn">Update</button>

</form>

@endsection