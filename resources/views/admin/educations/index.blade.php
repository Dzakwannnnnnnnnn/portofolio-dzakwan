@extends('admin.layout')

@section('title', 'Perjalanan Karir')

@section('content')

<style>
  .edu-top {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 24px;
  }

  .edu-top h1 {
    margin: 0;
  }

  .edu-btn {
    background: #16a34a;
    color: #fff;
    text-decoration: none;
    padding: 10px 14px;
    border-radius: 8px;
    font-weight: 600;
  }

  .edu-table-wrap {
    background: #fff;
    border-radius: 10px;
    box-shadow: 0 8px 24px rgba(15, 23, 42, 0.08);
    overflow-x: auto;
  }

  .edu-table {
    width: 100%;
    border-collapse: collapse;
  }

  .edu-table th,
  .edu-table td {
    padding: 12px;
    border-bottom: 1px solid #eef2f7;
    text-align: left;
    font-size: 14px;
    vertical-align: top;
  }

  .edu-table th {
    color: #475569;
    font-weight: 700;
    background: #f8fafc;
  }

  .edu-actions {
    display: flex;
    gap: 8px;
  }

  .edu-edit,
  .edu-delete {
    border: none;
    border-radius: 6px;
    padding: 8px 10px;
    font-size: 13px;
    cursor: pointer;
    color: #fff;
    text-decoration: none;
    display: inline-block;
  }

  .edu-edit {
    background: #0ea5e9;
  }

  .edu-delete {
    background: #ef4444;
  }
</style>

<div class="edu-top">
  <h1>Perjalanan Karir</h1>
  <a class="edu-btn" href="{{ route('educations.create') }}">+ Tambah Data</a>
</div>

@if($educations->count())
<div class="edu-table-wrap">
  <table class="edu-table">
    <thead>
      <tr>
        <th>Tahun</th>
        <th>Tipe</th>
        <th>Tempat</th>
        <th>Jurusan/Prodi/Posisi</th>
        <th>Deskripsi</th>
        <th>Skill yang Dikuasai</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody>
      @foreach($educations as $education)
      <tr>
        <td>{{ $education->start_year }} - {{ $education->end_year ?? 'Sekarang' }}</td>
        <td>{{ $education->activity_type ?? 'Pendidikan' }}</td>
        <td>{{ $education->school }}</td>
        <td>{{ $education->major ?? '-' }}</td>
        <td>{{ $education->description ?? '-' }}</td>
        <td>{{ $education->developed_skills ?? '-' }}</td>
        <td>
          <div class="edu-actions">
            <a class="edu-edit" href="{{ route('educations.edit', $education->id) }}">Edit</a>
            <form action="{{ route('educations.destroy', $education->id) }}" method="POST">
              @csrf
              @method('DELETE')
              <button class="edu-delete" type="submit">Hapus</button>
            </form>
          </div>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
@else
<p>Belum ada data perjalanan karir.</p>
@endif

@endsection
