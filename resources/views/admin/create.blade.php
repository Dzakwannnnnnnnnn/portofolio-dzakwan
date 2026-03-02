@extends('admin.layout')

@section('title','Tambah Profile')

@section('content')

<form class="form" action="/admin/profile" method="POST" enctype="multipart/form-data">

  @csrf

  <label>Nama</label>
  <input type="text" name="name" required>

  <label>Bio</label>
  <textarea name="bio"></textarea>

  <label>Photo</label>
  <input type="file" name="photo">

  <button class="btn">Simpan</button>

</form>

@endsection