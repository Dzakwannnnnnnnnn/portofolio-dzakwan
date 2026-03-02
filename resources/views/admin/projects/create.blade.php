@extends('admin.layout')

@section('title','Tambah Project')

@section('content')

<form class="form" action="{{ route('projects.store') }}" method="POST" enctype="multipart/form-data">

  @csrf

  <label>Title</label>
  <input type="text" name="title" required>

  <label>Description</label>
  <textarea name="description"></textarea>

  <label>Image</label>
  <input type="file" name="image">

  <label>Link</label>
  <input type="text" name="link">

  <button class="btn">Simpan</button>

</form>

@endsection