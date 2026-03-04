@extends('admin.layout')

@section('title','Tambah Profile Baru')

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

  .form-actions {
    display: flex;
    gap: 10px;
    margin-top: 30px;
  }

  .btn-submit {
    flex: 1;
    background-color: #4CAF50;
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
    background-color: #45a049;
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
    <h2 style="margin: 0;">Buat Profile Baru</h2>
    <p>Lengkapi informasi profil Anda di bawah ini</p>
  </div>

  <form action="{{ route('profile.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="form-group">
      <label for="name">Nama Lengkap</label>
      <input type="text" id="name" name="name" placeholder="Masukkan nama lengkap Anda" required value="{{ old('name') }}">
      @error('name')
      <span class="help-text" style="color: #f44336;">{{ $message }}</span>
      @enderror
    </div>

    <div class="form-group">
      <label for="role">Role/Posisi</label>
      <input type="text" id="role" name="role" placeholder="e.g. Web Developer, Designer, Manager" value="{{ old('role') }}">
      <span class="help-text">Posisi atau peran Anda</span>
      @error('role')
      <span class="help-text" style="color: #f44336;">{{ $message }}</span>
      @enderror
    </div>

    <div class="form-group">
      <label for="about">Bio/Tentang</label>
      <textarea id="about" name="about" placeholder="Jelaskan tentang diri Anda, pengalaman, dan keahlian...">{{ old('about') }}</textarea>
      <span class="help-text">Deskripsi singkat tentang diri Anda (opsional)</span>
      @error('about')
      <span class="help-text" style="color: #f44336;">{{ $message }}</span>
      @enderror
    </div>

    <div class="form-group">
      <label for="phone">Nomor Telepon</label>
      <input type="tel" id="phone" name="phone" placeholder="e.g. +62812345678" value="{{ old('phone') }}">
      <span class="help-text">Nomor telepon Anda</span>
      @error('phone')
      <span class="help-text" style="color: #f44336;">{{ $message }}</span>
      @enderror
    </div>

    <div class="form-group">
      <label for="whatsapp">WhatsApp</label>
      <input type="text" id="whatsapp" name="whatsapp" placeholder="e.g. 08123456789 atau +628123456789" value="{{ old('whatsapp') }}">
      <span class="help-text">Nomor WhatsApp untuk tautan kontak</span>
      @error('whatsapp')
      <span class="help-text" style="color: #f44336;">{{ $message }}</span>
      @enderror
    </div>

    <div class="form-group">
      <label for="email">Email</label>
      <input type="email" id="email" name="email" placeholder="e.g. kamu@email.com" value="{{ old('email') }}">
      @error('email')
      <span class="help-text" style="color: #f44336;">{{ $message }}</span>
      @enderror
    </div>

    <div class="form-group">
      <label for="github">GitHub URL</label>
      <input type="text" id="github" name="github" placeholder="e.g. https://github.com/username" value="{{ old('github') }}">
      <span class="help-text">Tautan profil GitHub Anda</span>
      @error('github')
      <span class="help-text" style="color: #f44336;">{{ $message }}</span>
      @enderror
    </div>

    <div class="form-group">
      <label for="instagram">Instagram URL</label>
      <input type="text" id="instagram" name="instagram" placeholder="e.g. https://instagram.com/username" value="{{ old('instagram') }}">
      <span class="help-text">Tautan profil Instagram Anda</span>
      @error('instagram')
      <span class="help-text" style="color: #f44336;">{{ $message }}</span>
      @enderror
    </div>

    <div class="form-group">
      <label for="birth_place">Tempat Lahir</label>
      <input type="text" id="birth_place" name="birth_place" placeholder="e.g. Jakarta" value="{{ old('birth_place') }}">
      <span class="help-text">Kota/tempat lahir Anda</span>
      @error('birth_place')
      <span class="help-text" style="color: #f44336;">{{ $message }}</span>
      @enderror
    </div>

    <div class="form-group">
      <label for="birth_date">Tanggal Lahir</label>
      <input type="date" id="birth_date" name="birth_date" value="{{ old('birth_date') }}">
      @error('birth_date')
      <span class="help-text" style="color: #f44336;">{{ $message }}</span>
      @enderror
    </div>

    <div class="form-group">
      <label for="address">Alamat</label>
      <textarea id="address" name="address" placeholder="Masukkan alamat lengkap Anda...">{{ old('address') }}</textarea>
      <span class="help-text">Alamat tempat tinggal</span>
      @error('address')
      <span class="help-text" style="color: #f44336;">{{ $message }}</span>
      @enderror
    </div>

    <div class="form-group">
      <label for="last_education">Pendidikan Terakhir</label>
      <input type="text" id="last_education" name="last_education" placeholder="e.g. S1 Teknik Informatika" value="{{ old('last_education') }}">
      <span class="help-text">Pendidikan/gelar terakhir Anda</span>
      @error('last_education')
      <span class="help-text" style="color: #f44336;">{{ $message }}</span>
      @enderror
    </div>

    <div class="form-group">
      <label for="location">Lokasi Saat Ini</label>
      <input type="text" id="location" name="location" placeholder="e.g. Indonesia" value="{{ old('location') }}">
      <span class="help-text">Negara/lokasi saat ini (opsional)</span>
      @error('location')
      <span class="help-text" style="color: #f44336;">{{ $message }}</span>
      @enderror
    </div>

    <div class="form-group">
      <label for="experience_years">Jumlah Pengalaman (Tahun)</label>
      <input type="number" id="experience_years" name="experience_years" min="0" placeholder="e.g. 2" value="{{ old('experience_years', 0) }}">
      <span class="help-text">Jumlah tahun pengalaman programming</span>
      @error('experience_years')
      <span class="help-text" style="color: #f44336;">{{ $message }}</span>
      @enderror
    </div>

    <div class="form-group">
      <label for="total_projects">Jumlah Project</label>
      <input type="number" id="total_projects" name="total_projects" min="0" placeholder="e.g. 12" value="{{ old('total_projects', 0) }}">
      <span class="help-text">Total project yang pernah dikerjakan</span>
      @error('total_projects')
      <span class="help-text" style="color: #f44336;">{{ $message }}</span>
      @enderror
    </div>

    <div class="form-group">
      <label for="total_certifications">Jumlah Sertifikasi</label>
      <input type="number" id="total_certifications" name="total_certifications" min="0" placeholder="e.g. 5" value="{{ old('total_certifications', 0) }}">
      <span class="help-text">Total sertifikasi yang dimiliki</span>
      @error('total_certifications')
      <span class="help-text" style="color: #f44336;">{{ $message }}</span>
      @enderror
    </div>

    <div class="form-group">
      <label for="photo">Foto Profil</label>
      <input type="file" id="photo" name="photo" accept="image/*">
      <span class="help-text">Upload foto profil (JPG, PNG, GIF). Maksimal 5MB</span>
      <span id="photo-size-warning" class="help-text" style="color: #f44336; display: none;">Ukuran foto maksimal 5MB.</span>
      @error('photo')
      <span class="help-text" style="color: #f44336;">{{ $message }}</span>
      @enderror
    </div>

    <div class="form-actions">
      <button type="submit" class="btn-submit">Simpan Profile</button>
      <a href="{{ route('profile.index') }}" class="btn-cancel">Batal</a>
    </div>
  </form>
</div>

<script>
  document.addEventListener('DOMContentLoaded', function() {
    const photoInput = document.getElementById('photo');
    const warning = document.getElementById('photo-size-warning');

    if (!photoInput || !warning) return;

    photoInput.addEventListener('change', function() {
      const file = this.files && this.files[0];
      const maxSize = 5 * 1024 * 1024;

      if (file && file.size > maxSize) {
        warning.style.display = 'block';
        this.value = '';
      } else {
        warning.style.display = 'none';
      }
    });
  });
</script>

@endsection
