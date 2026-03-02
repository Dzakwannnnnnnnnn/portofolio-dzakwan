@extends('admin.layout')
@section('title','Dokumentasi')
@section('content')
<div class="cards">
  <div class="card" style="width:100%;">
    <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:20px;">
      <h3 style="margin:0;">Daftar Dokumentasi Kegiatan</h3>
      <a href="{{ route('documentations.create') }}" class="btn btn-primary"
        style="background-color: #007bff; color: white; padding: 10px 20px; text-decoration: none; border-radius: 5px; display: inline-block;">Tambah
        Dokumentasi</a>
    </div>

    <table style="width:100%;border-collapse:collapse;">
      <thead>
        <tr style="border-bottom:1px solid #eee;text-align:left;">
          <th style="padding:12px;">No</th>
          <th style="padding:12px;">Judul</th>
          <th style="padding:12px;">Deskripsi</th>
          <th style="padding:12px;">Foto</th>
          <th style="padding:12px;">Aksi</th>
        </tr>
      </thead>
      <tbody>
        @forelse($documentations as $documentation)
        <tr style="border-bottom:1px solid #eee;">
          <td style="padding:12px;">{{ $loop->iteration }}</td>
          <td style="padding:12px;font-weight:600;">{{ $documentation->title }}</td>
          <td style="padding:12px;color:#666;">{{ Str::limit($documentation->description, 60) }}</td>
          <td style="padding:12px;">
            @if($documentation->photos->count() > 0)
            <img src="{{ asset('storage/' . $documentation->photos->first()->photo_path) }}" alt="Foto"
              style="width:60px;height:40px;object-fit:cover;border-radius:4px;">
            @else
            <span style="color:#ccc;">-</span>
            @endif
          </td>
          <td style="padding:12px;">
            <div style="display:flex;gap:8px;">
              <a href="{{ route('documentations.edit', $documentation) }}" class="btn btn-warning"
                style="padding:4px 12px;font-size:14px;color:white;">Edit</a>
              <form action="{{ route('documentations.destroy', $documentation) }}" method="POST"
                style="display:inline-block;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger" style="padding:4px 12px;font-size:14px;"
                  onclick="return confirm('Yakin ingin menghapus dokumentasi ini?')">Hapus</button>
              </form>
            </div>
          </td>
        </tr>
        @empty
        <tr>
          <td colspan="5" style="padding:24px;text-align:center;color:#888;">Belum ada dokumentasi.</td>
        </tr>
        @endforelse
      </tbody>
    </table>
  </div>
</div>
@endsection