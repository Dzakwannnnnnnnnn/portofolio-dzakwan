@extends('admin.layout')

@section('title','Edit Profile')

@section('content')

<form class="form" action="{{ route('profile.update', $project->id) }}" method="POST" enctype="multipart/form-data">

  @csrf
  @method('PUT')

  <label>Nama</label>
  <input type="text" name="name" value="{{ $project->name }}" required>

  <label>Bio</label>
  <textarea name="bio">{{ $project->bio }}</textarea>

  <label>Photo</label>
  <input type="file" name="photo">

  <button class="btn">Update</button>

</form>

@endsection