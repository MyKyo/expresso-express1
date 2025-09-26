@extends('admin.layouts.app')

@section('content')
<div class="card-box mb-30">
    <div class="pd-20 d-flex justify-content-between align-items-center">
        <h4 class="text-blue h4">Edit Anggota Tim</h4>
        <a href="{{ route('admin.team.index') }}" class="btn btn-secondary">Kembali</a>
    </div>
    <div class="pb-20 p-3">
        <form action="{{ route('admin.team.update', $team) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group mb-3">
                        <label>Nama Lengkap <span class="text-danger">*</span></label>
                        <input type="text" name="name" class="form-control" value="{{ old('name', $team->name) }}" required>
                        @error('name')
                            <div class="text-danger small">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group mb-3">
                        <label>Posisi/Jabatan <span class="text-danger">*</span></label>
                        <input type="text" name="position" class="form-control" value="{{ old('position', $team->position) }}" required>
                        @error('position')
                            <div class="text-danger small">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="form-group mb-3">
                <label>Bio/Deskripsi</label>
                <textarea name="bio" class="form-control" rows="4" placeholder="Ceritakan tentang anggota tim ini...">{{ old('bio', $team->bio) }}</textarea>
                @error('bio')
                    <div class="text-danger small">{{ $message }}</div>
                @enderror
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group mb-3">
                        <!-- Field Email dihapus -->
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group mb-3">
                        <!-- Label Telepon dihapus -->
                        <!-- Field Telepon dihapus -->
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4">
                    <div class="form-group mb-3">
                        <label>LinkedIn URL</label>
                        <input type="url" name="social_linkedin" class="form-control" value="{{ old('social_linkedin', $team->social_linkedin) }}" placeholder="https://linkedin.com/in/username">
                        @error('social_linkedin')
                            <div class="text-danger small">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group mb-3">
                        <label>Instagram URL</label>
                        <input type="url" name="social_instagram" class="form-control" value="{{ old('social_instagram', $team->social_instagram) }}" placeholder="https://instagram.com/username">
                        @error('social_instagram')
                            <div class="text-danger small">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group mb-3">
                        <label>Twitter URL</label>
                        <input type="url" name="social_twitter" class="form-control" value="{{ old('social_twitter', $team->social_twitter) }}" placeholder="https://twitter.com/username">
                        @error('social_twitter')
                            <div class="text-danger small">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="form-group mb-3">
                <label>Foto Profil</label>
                <input type="file" name="image" class="form-control" accept="image/*">
                @if($team->image_path)
                    <div class="mt-2">
                        <img src="{{ asset('storage/'.$team->image_path) }}" alt="{{ $team->name }}" class="img-fluid" style="max-height: 120px;">
                        <small class="text-muted d-block">Foto saat ini</small>
                    </div>
                @endif
                <small class="text-muted">Format: JPG, PNG, WEBP. Maksimal 4MB. Rekomendasi: 400x400px</small>
                @error('image')
                    <div class="text-danger small">{{ $message }}</div>
                @enderror
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group mb-3">
                        <label>Urutan Tampil</label>
                        <input type="number" name="sort_order" class="form-control" value="{{ old('sort_order', $team->sort_order) }}" min="0">
                        <small class="text-muted">Angka lebih kecil akan tampil lebih dulu</small>
                        @error('sort_order')
                            <div class="text-danger small">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group mb-3">
                        <label>Publikasikan?</label>
                        <select name="is_published" class="form-control">
                            <option value="1" {{ old('is_published', $team->is_published) ? 'selected' : '' }}>Ya</option>
                            <option value="0" {{ !old('is_published', $team->is_published) ? 'selected' : '' }}>Tidak</option>
                        </select>
                        @error('is_published')
                            <div class="text-danger small">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        </form>
    </div>
</div>
@endsection
