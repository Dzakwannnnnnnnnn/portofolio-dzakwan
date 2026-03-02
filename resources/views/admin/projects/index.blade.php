@extends('admin.layout')

@section('title','Kelola Project')

@section('content')

<div class="page-head">
  <div>
    <h1 class="page-title">Kelola Project</h1>
    <p class="page-subtitle">Atur daftar project yang ditampilkan pada halaman portfolio.</p>
  </div>
  <a class="btn" href="{{ route('projects.create') }}">+ Tambah Project</a>
</div>

@if($projects->count())
<div class="panel">
  <table class="table project-table">
    <thead>
      <tr>
        <th style="width: 90px;">Image</th>
        <th>Project</th>
        <th>Link</th>
        <th style="width: 170px;">Aksi</th>
      </tr>
    </thead>
    <tbody>
      @foreach($projects as $project)
      <tr>
        <td>
          @if($project->image)
          <img class="thumb" src="{{ asset('storage/'.$project->image) }}" alt="{{ $project->title }}">
          @else
          <div class="thumb thumb-empty">No Image</div>
          @endif
        </td>
        <td>
          <p class="project-title">{{ $project->title }}</p>
          <p class="project-desc">{{ $project->description ?: 'Belum ada deskripsi project.' }}</p>
        </td>
        <td>
          @if($project->link)
          <a class="project-link" href="{{ $project->link }}" target="_blank" rel="noopener noreferrer">Buka Link</a>
          @else
          <span class="muted">Tidak ada link</span>
          @endif
        </td>
        <td>
          <div class="actions">
            <a class="action-btn edit" href="{{ route('projects.edit',$project->id) }}">Edit</a>
            <form action="{{ route('projects.destroy',$project->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus project ini?');">
              @csrf
              @method('DELETE')
              <button class="action-btn delete" type="submit">Hapus</button>
            </form>
          </div>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
@else
<div class="empty-state">
  <h3>Belum ada project</h3>
  <p>Mulai tambahkan project pertama agar tampil di halaman utama portfolio.</p>
  <a class="btn" href="{{ route('projects.create') }}">Tambah Project Pertama</a>
</div>
@endif


@endsection
