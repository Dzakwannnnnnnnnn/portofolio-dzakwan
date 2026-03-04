@extends('admin.layout')

@section('title', 'Tambah Perjalanan Karir')

@section('content')

<style>
  .edu-form {
    max-width: 760px;
    margin: 0 auto;
    background: #fff;
    border-radius: 10px;
    box-shadow: 0 8px 24px rgba(15, 23, 42, 0.08);
    padding: 24px;
  }

  .edu-group {
    margin-bottom: 16px;
  }

  .edu-group label {
    display: block;
    margin-bottom: 6px;
    font-weight: 600;
    font-size: 14px;
  }

  .edu-group input,
  .edu-group select,
  .edu-group textarea {
    width: 100%;
    border: 1px solid #dbe1ea;
    border-radius: 8px;
    padding: 10px 12px;
    box-sizing: border-box;
    font-size: 14px;
  }

  .edu-row {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 12px;
  }

  .edu-actions {
    display: flex;
    gap: 10px;
    margin-top: 20px;
  }

  .edu-save,
  .edu-back {
    border: none;
    border-radius: 8px;
    padding: 10px 14px;
    text-decoration: none;
    cursor: pointer;
    font-weight: 600;
    font-size: 14px;
  }

  .edu-save {
    background: #16a34a;
    color: #fff;
  }

  .edu-back {
    background: #e2e8f0;
    color: #0f172a;
  }

  .edu-error {
    color: #dc2626;
    font-size: 12px;
    margin-top: 4px;
    display: block;
  }

  @media (max-width: 768px) {
    .edu-row {
      grid-template-columns: 1fr;
    }
  }
</style>

<form class="edu-form" action="{{ route('educations.store') }}" method="POST">
  @csrf

  <div class="edu-group">
    <label for="activity_type">Tipe Aktivitas</label>
    <select id="activity_type" name="activity_type" required>
      <option value="Pendidikan" {{ old('activity_type', 'Pendidikan') === 'Pendidikan' ? 'selected' : '' }}>Pendidikan</option>
      <option value="Kuliah" {{ old('activity_type') === 'Kuliah' ? 'selected' : '' }}>Kuliah</option>
      <option value="Kerja" {{ old('activity_type') === 'Kerja' ? 'selected' : '' }}>Kerja</option>
      <option value="Magang" {{ old('activity_type') === 'Magang' ? 'selected' : '' }}>Magang</option>
    </select>
    @error('activity_type')
    <span class="edu-error">{{ $message }}</span>
    @enderror
  </div>

  <div class="edu-group">
    <label for="school">Tempat (Sekolah/Kampus/Perusahaan)</label>
    <input id="school" type="text" name="school" value="{{ old('school') }}" required>
    @error('school')
    <span class="edu-error">{{ $message }}</span>
    @enderror
  </div>

  <div class="edu-group">
    <label for="major">Jurusan/Prodi/Posisi</label>
    <input id="major" type="text" name="major" value="{{ old('major') }}">
    @error('major')
    <span class="edu-error">{{ $message }}</span>
    @enderror
  </div>

  <div class="edu-row">
    <div class="edu-group">
      <label for="start_year">Tahun Mulai</label>
      <input id="start_year" type="number" name="start_year" min="1900" max="2100" value="{{ old('start_year') }}" required>
      @error('start_year')
      <span class="edu-error">{{ $message }}</span>
      @enderror
    </div>

    <div class="edu-group">
      <label for="end_year">Tahun Selesai (kosongkan jika masih berjalan)</label>
      <input id="end_year" type="number" name="end_year" min="1900" max="2100" value="{{ old('end_year') }}">
      @error('end_year')
      <span class="edu-error">{{ $message }}</span>
      @enderror
    </div>
  </div>

  <div class="edu-group">
    <label for="description">Deskripsi Singkat</label>
    <textarea id="description" name="description" rows="4">{{ old('description') }}</textarea>
    @error('description')
    <span class="edu-error">{{ $message }}</span>
    @enderror
  </div>

  <div class="edu-group">
    <label for="developed_skills">Skill yang Dikuasai</label>
    <input id="developed_skills" type="text" name="developed_skills" value="{{ old('developed_skills') }}" placeholder="Contoh: Public Speaking, Teamwork, PHP, Laravel">
    <small style="color:#64748b;">Pisahkan dengan koma (,) jika lebih dari satu skill.</small>
    @error('developed_skills')
    <span class="edu-error">{{ $message }}</span>
    @enderror
  </div>

  <div class="edu-actions">
    <button type="submit" class="edu-save">Simpan</button>
    <a href="{{ route('educations.index') }}" class="edu-back">Batal</a>
  </div>
</form>

@endsection
