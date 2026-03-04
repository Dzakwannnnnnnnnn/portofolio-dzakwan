@extends('admin.layout')

@section('title','Dashboard')

@section('content')

<div class="cards">

  <div class="card">
    <h3>Projects</h3>
    <p>{{\App\Models\Project::count() }}</p>
    <a href="/admin/projects">Manage</a>
  </div>

  <div class="card">
    <h3>Kemampuan</h3>
    <p>{{ \App\Models\Capability::count() }}</p>
    <a href="/admin/capabilities">Manage</a>
  </div>

  <div class="card">
    <h3>Sertifikasi</h3>
    <p>{{ \App\Models\Certification::count() }}</p>
    <a href="/admin/certifications">Manage</a>
  </div>

  <div class="card">
    <h3>Education</h3>
    <p>{{\App\Models\Education::count() }}</p>
    <a href="/admin/educations">Manage</a>
  </div>

  <div class="card">
    <h3>Profile</h3>
    <p>1</p>
    <a href="/admin/profile">Edit</a>
  </div>

  <div class="card">
    <h3>Dokumentasi</h3>
    <p>{{ \App\Models\Documentation::count() }}</p>
    <a href="/admin/documentations">Manage</a>
  </div>

</div>

@endsection
