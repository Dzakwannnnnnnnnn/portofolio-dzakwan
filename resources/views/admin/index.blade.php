@extends('admin.layout')

@section('content')

<h1>Projects</h1>

<a href="{{ route('projects.create') }}">Tambah Project</a>

@if($projects->count())
@foreach($projects as $project)

<div style="margin-top:20px">
  <h3>{{ $project->name ?? $project->title }}</h3>
  <p>{{ $project->bio ?? $project->description }}</p>

  <a href="{{ isset($project->name) ? route('profile.edit',$project->id) : route('projects.edit',$project->id) }}">
    Edit
  </a>

  <form
    action="{{ isset($project->name) ? route('profile.destroy',$project->id) : route('projects.destroy',$project->id) }}"
    method="POST">
    @csrf
    @method('DELETE')
    <button>Hapus</button>
  </form>
</div>

@endforeach
@endif

@endsection