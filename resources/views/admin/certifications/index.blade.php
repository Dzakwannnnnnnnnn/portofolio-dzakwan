@extends('admin.layout')

@section('title', 'Sertifikasi')

@section('content')

<style>
  .cert-top {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 24px;
  }

  .cert-btn {
    background: #16a34a;
    color: #fff;
    text-decoration: none;
    padding: 10px 14px;
    border-radius: 8px;
    font-weight: 600;
  }

  .cert-table-wrap {
    background: #fff;
    border-radius: 10px;
    box-shadow: 0 8px 24px rgba(15, 23, 42, 0.08);
    overflow-x: auto;
  }

  .cert-table {
    width: 100%;
    border-collapse: collapse;
  }

  .cert-table th,
  .cert-table td {
    padding: 12px;
    border-bottom: 1px solid #eef2f7;
    text-align: left;
    font-size: 14px;
    vertical-align: top;
  }

  .cert-table th {
    color: #475569;
    font-weight: 700;
    background: #f8fafc;
  }

  .cert-actions {
    display: flex;
    gap: 8px;
  }

  .cert-edit,
  .cert-delete {
    border: none;
    border-radius: 6px;
    padding: 8px 10px;
    font-size: 13px;
    cursor: pointer;
    color: #fff;
    text-decoration: none;
    display: inline-block;
  }

  .cert-edit {
    background: #0ea5e9;
  }

  .cert-delete {
    background: #ef4444;
  }
</style>

<div class="cert-top">
  <h1 style="margin:0;">Sertifikasi</h1>
  <a class="cert-btn" href="{{ route('certifications.create') }}">+ Tambah Sertifikasi</a>
</div>

@if($certifications->count())
<div class="cert-table-wrap">
  <table class="cert-table">
    <thead>
      <tr>
        <th>Tahun</th>
        <th>Pencapaian</th>
        <th>Lembaga</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody>
      @foreach($certifications as $certification)
      <tr>
        <td>{{ $certification->year }}</td>
        <td>{{ $certification->achievement }}</td>
        <td>{{ $certification->institution }}</td>
        <td>
          <div class="cert-actions">
            <a class="cert-edit" href="{{ route('certifications.edit', $certification->id) }}">Edit</a>
            <form action="{{ route('certifications.destroy', $certification->id) }}" method="POST">
              @csrf
              @method('DELETE')
              <button class="cert-delete" type="submit">Hapus</button>
            </form>
          </div>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
@else
<p>Belum ada data sertifikasi.</p>
@endif

@endsection
