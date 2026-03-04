@extends('admin.layout')

@section('title', 'Profile Management')

@section('content')

<style>
  .profile-container {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 30px;
  }

  .profile-header h1 {
    margin: 0;
    color: #333;
    font-size: 28px;
    font-weight: 600;
  }

  .btn-primary {
    background-color: #4CAF50;
    color: white;
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    text-decoration: none;
    font-weight: 500;
    transition: background-color 0.3s;
  }

  .btn-primary:hover {
    background-color: #45a049;
  }

  .profile-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(350px, 1fr));
    gap: 25px;
    margin-top: 20px;
  }

  .profile-card {
    background: white;
    border-radius: 8px;
    padding: 20px;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
    transition: box-shadow 0.3s;
  }

  .profile-card:hover {
    box-shadow: 0 4px 16px rgba(0, 0, 0, 0.15);
  }

  .profile-photo {
    width: 100%;
    height: 200px;
    background: #f5f5f5;
    border-radius: 6px;
    overflow: hidden;
    margin-bottom: 15px;
    display: flex;
    align-items: center;
    justify-content: center;
  }

  .profile-photo img {
    width: 100%;
    height: 100%;
    object-fit: cover;
  }

  .profile-info h3 {
    margin: 0 0 5px 0;
    color: #333;
    font-size: 20px;
  }

  .profile-role {
    color: #666;
    font-size: 14px;
    margin-bottom: 10px;
    font-style: italic;
  }

  .profile-divider {
    height: 1px;
    background: #eee;
    margin: 12px 0;
  }

  .profile-about {
    color: #555;
    font-size: 13px;
    line-height: 1.5;
    margin-bottom: 15px;
    max-height: 80px;
    overflow-y: auto;
  }

  .profile-stats {
    display: grid;
    grid-template-columns: repeat(3, minmax(0, 1fr));
    gap: 8px;
    margin-bottom: 15px;
  }

  .profile-stat {
    background: #f7f9ff;
    border: 1px solid #e3e8ff;
    border-radius: 6px;
    padding: 8px 6px;
    text-align: center;
  }

  .profile-stat-number {
    display: block;
    color: #1d4ed8;
    font-weight: 700;
    font-size: 15px;
  }

  .profile-stat-label {
    display: block;
    color: #666;
    font-size: 10px;
    text-transform: uppercase;
    margin-top: 4px;
  }

  .about-label {
    font-weight: 600;
    color: #333;
    font-size: 12px;
    text-transform: uppercase;
    margin-bottom: 5px;
  }

  .profile-actions {
    display: flex;
    gap: 10px;
    margin-top: 15px;
  }

  .btn-edit {
    flex: 1;
    background-color: #2196F3;
    color: white;
    padding: 8px 12px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    text-decoration: none;
    font-size: 13px;
    font-weight: 500;
    transition: background-color 0.3s;
  }

  .btn-edit:hover {
    background-color: #0b7dda;
  }

  .btn-delete {
    flex: 1;
    background-color: #f44336;
    color: white;
    padding: 8px 12px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    font-size: 13px;
    font-weight: 500;
    transition: background-color 0.3s;
  }

  .btn-delete:hover {
    background-color: #da190b;
  }

  .empty-state {
    text-align: center;
    padding: 50px 20px;
    color: #999;
  }

  .empty-state-icon {
    font-size: 48px;
    margin-bottom: 15px;
  }

  .empty-state p {
    margin-bottom: 20px;
  }
</style>

<div class="profile-container">
  <div class="profile-header">
    <h1>👤 Profile Management</h1>
  </div>
  <a href="{{ route('profile.create') }}" class="btn-primary">+ Tambah Profile</a>
</div>

@if($profiles->count())
<div class="profile-grid">
  @foreach($profiles as $profile)
  <div class="profile-card">
    {{-- Photo --}}
    <div class="profile-photo">
      @if($profile->photo)
      <img src="{{ asset('storage/' . $profile->photo) }}" alt="{{ $profile->name }}">
      @else
      <div style="color: #ccc; font-size: 48px;">📷</div>
      @endif
    </div>

    {{-- Info --}}
    <div class="profile-info">
      <h3>{{ $profile->name }}</h3>
      <div class="profile-role">
        {{ $profile->role ?? 'No role specified' }}
      </div>

      <div class="profile-divider"></div>

      <div class="about-label">About</div>
      <div class="profile-about">
        {{ $profile->about ? Str::limit($profile->about, 150) : 'No about information' }}
      </div>

      <div class="profile-stats">
        <div class="profile-stat">
          <span class="profile-stat-number">{{ $profile->experience_years ?? 0 }}</span>
          <span class="profile-stat-label">Pengalaman</span>
        </div>
        <div class="profile-stat">
          <span class="profile-stat-number">{{ $profile->total_projects ?? 0 }}</span>
          <span class="profile-stat-label">Project</span>
        </div>
        <div class="profile-stat">
          <span class="profile-stat-number">{{ $profile->total_certifications ?? 0 }}</span>
          <span class="profile-stat-label">Sertifikasi</span>
        </div>
      </div>
    </div>

    {{-- Actions --}}
    <div class="profile-actions">
      <a href="{{ route('profile.edit', $profile->id) }}" class="btn-edit">✏️ Edit</a>

      <form action="{{ route('profile.destroy', $profile->id) }}" method="POST" style="flex: 1;">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn-delete" style="width: 100; cursor: pointer;">🗑️ Hapus</button>
      </form>
    </div>
  </div>
  @endforeach
</div>
@else
<div class="empty-state">
  <div class="empty-state-icon">📭</div>
  <p>Belum ada profile. <a href="{{ route('profile.create') }}" style="color: #2196F3; text-decoration: none;">Buat yang
      pertama sekarang</a></p>
</div>
@endif

@endsection
