@extends('admin.layout')

@section('title', 'Edit Kemampuan')

@section('content')

<style>
  .cap-form {
    max-width: 760px;
    margin: 0 auto;
    background: #fff;
    border-radius: 10px;
    box-shadow: 0 8px 24px rgba(15, 23, 42, 0.08);
    padding: 24px;
  }

  .cap-group {
    margin-bottom: 16px;
  }

  .cap-group label {
    display: block;
    margin-bottom: 6px;
    font-weight: 600;
    font-size: 14px;
  }

  .cap-group input,
  .cap-group textarea {
    width: 100%;
    border: 1px solid #dbe1ea;
    border-radius: 8px;
    padding: 10px 12px;
    box-sizing: border-box;
    font-size: 14px;
  }

  .cap-actions {
    display: flex;
    gap: 10px;
    margin-top: 20px;
  }

  .cap-save,
  .cap-back {
    border: none;
    border-radius: 8px;
    padding: 10px 14px;
    text-decoration: none;
    cursor: pointer;
    font-weight: 600;
    font-size: 14px;
  }

  .cap-save {
    background: #0ea5e9;
    color: #fff;
  }

  .cap-back {
    background: #e2e8f0;
    color: #0f172a;
  }

  .cap-error {
    color: #dc2626;
    font-size: 12px;
    margin-top: 4px;
    display: block;
  }
</style>

<form class="cap-form" action="{{ route('capabilities.update', $capability->id) }}" method="POST">
  @csrf
  @method('PUT')

  <div class="cap-group">
    <label for="title">Judul Kemampuan</label>
    <input id="title" type="text" name="title" value="{{ old('title', $capability->title) }}" placeholder="Contoh: Web Development" required>
    @error('title')
    <span class="cap-error">{{ $message }}</span>
    @enderror
  </div>

  <div class="cap-group">
    <label for="languages">Bahasa/Teknologi</label>
    <textarea id="languages" name="languages" rows="4" placeholder="Contoh: PHP, Laravel, JavaScript, MySQL">{{ old('languages', $capability->languages) }}</textarea>
    <small style="color:#64748b;">Pisahkan dengan koma (,).</small>
    @error('languages')
    <span class="cap-error">{{ $message }}</span>
    @enderror
  </div>

  <div class="cap-actions">
    <button type="submit" class="cap-save">Update</button>
    <a href="{{ route('capabilities.index') }}" class="cap-back">Batal</a>
  </div>
</form>

@endsection
