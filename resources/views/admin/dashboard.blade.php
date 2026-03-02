@extends('admin.layout')

@section('title','Dashboard')

@section('content')

<div class="cards">

  <div class="card">
    <h3>Projects</h3>
    <p>{{ \App\Models\Projects::count() }}</p>
    <a href="/admin/projects">Manage</a>
  </div>

  <div class="card">
    <h3>Education</h3>
    <p>{{ \App\Models\Educations::count() }}</p>
  </div>

  <div class="card">
    <h3>Profile</h3>
    <p>1</p>
    <a href="/admin/profile">Edit</a>
  </div>

</div>

@endsection