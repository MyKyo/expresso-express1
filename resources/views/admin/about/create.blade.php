@extends('admin.layouts.app')

@section('content')
<div class="card-box mb-30">
    <div class="pd-20 d-flex justify-content-between align-items-center">
        <h4 class="text-blue h4">Tambah Tentang Kami</h4>
        <a href="{{ route('admin.about.index') }}" class="btn btn-secondary">Kembali</a>
    </div>
    <div class="pb-20 p-3">
        <form action="{{ route('admin.about.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group mb-3">
                <label>Judul</label>
                <input type="text" name="title" class="form-control" required>
            </div>
            <div class="form-group mb-3">
                <label>Konten</label>
                <textarea name="content" class="form-control" rows="8"></textarea>
            </div>
            <div class="form-group mb-3">
                <label>Gambar</label>
                <input type="file" name="image" class="form-control">
            </div>
            <div class="form-group mb-3">
                <label>Publikasikan?</label>
                <select name="is_published" class="form-control">
                    <option value="1">Ya</option>
                    <option value="0">Tidak</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
</div>
@endsection


