@extends('admin.layout')

@section('title', 'Kemampuan')

@section('content')

<style>
  .cap-top {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 24px;
  }

  .cap-btn {
    background: #16a34a;
    color: #fff;
    text-decoration: none;
    padding: 10px 14px;
    border-radius: 8px;
    font-weight: 600;
  }

  .cap-table-wrap {
    background: #fff;
    border-radius: 10px;
    box-shadow: 0 8px 24px rgba(15, 23, 42, 0.08);
    overflow-x: auto;
  }

  .cap-table {
    width: 100%;
    border-collapse: collapse;
  }

  .cap-table th,
  .cap-table td {
    padding: 12px;
    border-bottom: 1px solid #eef2f7;
    text-align: left;
    font-size: 14px;
    vertical-align: top;
  }

  .cap-table th {
    color: #475569;
    font-weight: 700;
    background: #f8fafc;
  }

  .cap-actions {
    display: flex;
    gap: 8px;
  }

  .cap-edit,
  .cap-delete {
    border: none;
    border-radius: 6px;
    padding: 8px 10px;
    font-size: 13px;
    cursor: pointer;
    color: #fff;
    text-decoration: none;
    display: inline-block;
  }

  .cap-edit {
    background: #0ea5e9;
  }

  .cap-delete {
    background: #ef4444;
  }
</style>

<div class="cap-top">
  <h1 style="margin:0;">Kemampuan</h1>
  <a class="cap-btn" href="{{ route('capabilities.create') }}">+ Tambah Kemampuan</a>
</div>

@if($capabilities->count())
<div class="cap-table-wrap">
  <table class="cap-table">
    <thead>
      <tr>
        <th>Judul</th>
        <th>Bahasa/Teknologi</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody>
      @foreach($capabilities as $capability)
      <tr>
        <td>{{ $capability->title }}</td>
        <td>{{ $capability->languages ?? '-' }}</td>
        <td>
          <div class="cap-actions">
            <a class="cap-edit" href="{{ route('capabilities.edit', $capability->id) }}">Edit</a>
            <form action="{{ route('capabilities.destroy', $capability->id) }}" method="POST">
              @csrf
              @method('DELETE')
              <button class="cap-delete" type="submit">Hapus</button>
            </form>
          </div>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
@else
<p>Belum ada data kemampuan.</p>
@endif

@endsection
