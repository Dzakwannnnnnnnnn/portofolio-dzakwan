@extends('admin.layout')

@section('title','Edit Profile')

@section('content')

<style>
  .form-container {
    max-width: 600px;
    margin: 0 auto;
  }

  .form-group {
    margin-bottom: 20px;
  }

  .form-group label {
    display: block;
    margin-bottom: 8px;
    font-weight: 600;
    color: #333;
    font-size: 14px;
  }

  .form-group input,
  .form-group textarea {
    width: 100%;
    padding: 10px 12px;
    border: 1px solid #ddd;
    border-radius: 5px;
    font-size: 14px;
    font-family: inherit;
    transition: border-color 0.3s, box-shadow 0.3s;
    box-sizing: border-box;
  }

  .form-group input:focus,
  .form-group textarea:focus {
    outline: none;
    border-color: #2196F3;
    box-shadow: 0 0 0 3px rgba(33, 150, 243, 0.1);
  }

  .form-group textarea {
    resize: vertical;
    min-height: 120px;
  }

  .form-group input[type="file"] {
    padding: 8px 0;
    cursor: pointer;
  }

  .help-text {
    display: block;
    font-size: 12px;
    color: #999;
    margin-top: 5px;
  }

  .photo-preview {
    margin-bottom: 15px;
    padding: 15px;
    background: #f9f9f9;
    border: 1px solid #eee;
    border-radius: 5px;
  }

  .photo-preview-label {
    font-size: 12px;
    color: #666;
    margin-bottom: 10px;
    font-weight: 600;
    text-transform: uppercase;
  }

  .photo-preview img {
    max-width: 200px;
    max-height: 200px;
    border-radius: 4px;
  }

  .form-actions {
    display: flex;
    gap: 10px;
    margin-top: 30px;
  }

  .btn-submit {
    flex: 1;
    background-color: #2196F3;
    color: white;
    padding: 12px 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    font-size: 15px;
    font-weight: 600;
    transition: background-color 0.3s;
  }

  .btn-submit:hover {
    background-color: #0b7dda;
  }

  .btn-cancel {
    flex: 1;
    background-color: #f0f0f0;
    color: #333;
    padding: 12px 20px;
    border: 1px solid #ddd;
    border-radius: 5px;
    cursor: pointer;
    font-size: 15px;
    font-weight: 600;
    text-decoration: none;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: background-color 0.3s;
  }

  .btn-cancel:hover {
    background-color: #e0e0e0;
  }

  .form-title {
    margin-bottom: 30px;
    padding-bottom: 15px;
    border-bottom: 2px solid #f0f0f0;
  }

  .form-title p {
    color: #666;
    font-size: 14px;
    margin: 10px 0 0 0;
  }
</style>

<div class="form-container">
  <div class="form-title">
    <h2 style="margin: 0;">Edit Profile</h2>
    <p>Perbarui informasi profil Anda</p>
  </div>

  <form action="{{ route('profile.update', $profile->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="form-group">
      <label for="name">Nama Lengkap</label>
      <input type="text" id="name" name="name" placeholder="Masukkan nama lengkap Anda" required value="{{ $profile->name }}">
      @error('name')
      <span class="help-text" style="color: #f44336;">{{ $message }}</span>
      @enderror
    </div>

    <div class="form-group">
      <label for="role">Role/Posisi</label>
      <input type="text" id="role" name="role" placeholder="e.g. Web Developer, Designer, Manager" value="{{ $profile->role }}">
      <span class="help-text">Posisi atau peran Anda</span>
      @error('role')
      <span class="help-text" style="color: #f44336;">{{ $message }}</span>
      @enderror
    </div>

    <div class="form-group">
      <label for="about">Bio/Tentang</label>
      <textarea id="about" name="about" placeholder="Jelaskan tentang diri Anda, pengalaman, dan keahlian...">{{ $profile->about }}</textarea>
      <span class="help-text">Deskripsi singkat tentang diri Anda</span>
      @error('about')
      <span class="help-text" style="color: #f44336;">{{ $message }}</span>
      @enderror
    </div>

    <div class="form-group">
      <label for="phone">Nomor Telepon</label>
      <input type="tel" id="phone" name="phone" placeholder="e.g. +62812345678" value="{{ $profile->phone }}">
      <span class="help-text">Nomor telepon Anda</span>
      @error('phone')
      <span class="help-text" style="color: #f44336;">{{ $message }}</span>
      @enderror
    </div>

    <div class="form-group">
      <label for="whatsapp">WhatsApp</label>
      <input type="text" id="whatsapp" name="whatsapp" placeholder="e.g. 08123456789 atau +628123456789" value="{{ old('whatsapp', $profile->whatsapp) }}">
      <span class="help-text">Nomor WhatsApp untuk tautan kontak</span>
      @error('whatsapp')
      <span class="help-text" style="color: #f44336;">{{ $message }}</span>
      @enderror
    </div>

    <div class="form-group">
      <label for="email">Email</label>
      <input type="email" id="email" name="email" placeholder="e.g. kamu@email.com" value="{{ old('email', $profile->email) }}">
      @error('email')
      <span class="help-text" style="color: #f44336;">{{ $message }}</span>
      @enderror
    </div>

    <div class="form-group">
      <label for="github">GitHub URL</label>
      <input type="text" id="github" name="github" placeholder="e.g. https://github.com/username" value="{{ old('github', $profile->github) }}">
      <span class="help-text">Tautan profil GitHub Anda</span>
      @error('github')
      <span class="help-text" style="color: #f44336;">{{ $message }}</span>
      @enderror
    </div>

    <div class="form-group">
      <label for="instagram">Instagram URL</label>
      <input type="text" id="instagram" name="instagram" placeholder="e.g. https://instagram.com/username" value="{{ old('instagram', $profile->instagram) }}">
      <span class="help-text">Tautan profil Instagram Anda</span>
      @error('instagram')
      <span class="help-text" style="color: #f44336;">{{ $message }}</span>
      @enderror
    </div>

    <div class="form-group">
      <label for="birth_place">Tempat Lahir</label>
      <input type="text" id="birth_place" name="birth_place" placeholder="e.g. Jakarta" value="{{ $profile->birth_place }}">
      <span class="help-text">Kota/tempat lahir Anda</span>
      @error('birth_place')
      <span class="help-text" style="color: #f44336;">{{ $message }}</span>
      @enderror
    </div>

    <div class="form-group">
      <label for="birth_date">Tanggal Lahir</label>
      <input type="date" id="birth_date" name="birth_date" value="{{ $profile->birth_date }}">
      @error('birth_date')
      <span class="help-text" style="color: #f44336;">{{ $message }}</span>
      @enderror
    </div>

    <div class="form-group">
      <label for="address">Alamat</label>
      <textarea id="address" name="address" placeholder="Masukkan alamat lengkap Anda...">{{ $profile->address }}</textarea>
      <span class="help-text">Alamat tempat tinggal</span>
      @error('address')
      <span class="help-text" style="color: #f44336;">{{ $message }}</span>
      @enderror
    </div>

    <div class="form-group">
      <label for="last_education">Pendidikan Terakhir</label>
      <input type="text" id="last_education" name="last_education" placeholder="e.g. S1 Teknik Informatika" value="{{ $profile->last_education }}">
      <span class="help-text">Pendidikan/gelar terakhir Anda</span>
      @error('last_education')
      <span class="help-text" style="color: #f44336;">{{ $message }}</span>
      @enderror
    </div>

    <div class="form-group">
      <label for="location">Lokasi Saat Ini</label>
      <input type="text" id="location" name="location" placeholder="e.g. Indonesia" value="{{ $profile->location }}">
      <span class="help-text">Negara/lokasi saat ini (opsional)</span>
      @error('location')
      <span class="help-text" style="color: #f44336;">{{ $message }}</span>
      @enderror
    </div>

    <div class="form-group">
      <label for="photo">Foto Profil</label>

      @if($profile->photo)
      <div class="photo-preview">
        <div class="photo-preview-label">Foto Saat Ini</div>
        <img src="{{ asset('storage/' . $profile->photo) }}" alt="{{ $profile->name }}">
      </div>
      @endif

      <input type="file" id="photo" name="photo" accept="image/*">
      <span class="help-text">Upload foto profil baru (JPG, PNG, GIF). Maksimal 5MB</span>
      @error('photo')
      <span class="help-text" style="color: #f44336;">{{ $message }}</span>
      @enderror
    </div>

    <div class="form-actions">
      <button type="submit" class="btn-submit">Update Profile</button>
      <a href="{{ route('profile.index') }}" class="btn-cancel">Batal</a>
    </div>
  </form>
</div>

@endsection

