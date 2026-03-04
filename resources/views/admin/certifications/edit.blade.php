@extends('admin.layout')

@section('title', 'Edit Sertifikasi')

@section('content')

<style>
  .cert-form {
    max-width: 760px;
    margin: 0 auto;
    background: #fff;
    border-radius: 10px;
    box-shadow: 0 8px 24px rgba(15, 23, 42, 0.08);
    padding: 24px;
  }

  .cert-group {
    margin-bottom: 16px;
  }

  .cert-group label {
    display: block;
    margin-bottom: 6px;
    font-weight: 600;
    font-size: 14px;
  }

  .cert-group input {
    width: 100%;
    border: 1px solid #dbe1ea;
    border-radius: 8px;
    padding: 10px 12px;
    box-sizing: border-box;
    font-size: 14px;
  }

  .cert-actions {
    display: flex;
    gap: 10px;
    margin-top: 20px;
  }

  .cert-save,
  .cert-back {
    border: none;
    border-radius: 8px;
    padding: 10px 14px;
    text-decoration: none;
    cursor: pointer;
    font-weight: 600;
    font-size: 14px;
  }

  .cert-save {
    background: #0ea5e9;
    color: #fff;
  }

  .cert-back {
    background: #e2e8f0;
    color: #0f172a;
  }

  .cert-error {
    color: #dc2626;
    font-size: 12px;
    margin-top: 4px;
    display: block;
  }
</style>

<form class="cert-form" action="{{ route('certifications.update', $certification->id) }}" method="POST">
  @csrf
  @method('PUT')

  <div class="cert-group">
    <label for="year">Tahun Dapat</label>
    <input id="year" type="number" name="year" min="1900" max="2100" value="{{ old('year', $certification->year) }}" required>
    @error('year')
    <span class="cert-error">{{ $message }}</span>
    @enderror
  </div>

  <div class="cert-group">
    <label for="achievement">Sertifikasi Atas Pencapaian Apa</label>
    <input id="achievement" type="text" name="achievement" value="{{ old('achievement', $certification->achievement) }}" required>
    @error('achievement')
    <span class="cert-error">{{ $message }}</span>
    @enderror
  </div>

  <div class="cert-group">
    <label for="institution">Lembaga</label>
    <input id="institution" type="text" name="institution" value="{{ old('institution', $certification->institution) }}" required>
    @error('institution')
    <span class="cert-error">{{ $message }}</span>
    @enderror
  </div>

  <div class="cert-actions">
    <button type="submit" class="cert-save">Update</button>
    <a href="{{ route('certifications.index') }}" class="cert-back">Batal</a>
  </div>
</form>

@endsection
