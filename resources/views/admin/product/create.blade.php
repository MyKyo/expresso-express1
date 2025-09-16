@extends('admin.layouts.app')

@section('content')
<div class="card-box mb-30">
    <div class="pd-20 d-flex justify-content-between align-items-center">
        <h4 class="text-blue h4">Tambah Produk</h4>
        <a href="{{ route('admin.product.index') }}" class="btn btn-secondary">Kembali</a>
    </div>
    <div class="pb-20 p-3">
        <form action="{{ route('admin.product.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group mb-3">
                <label>Nama</label>
                <input type="text" name="name" class="form-control" required>
            </div>
            <div class="form-group mb-3">
                <label>Gambar</label>
                <input type="file" name="image" class="form-control">
            </div>
            <div class="form-group mb-3">
                <label>Aktif</label>
                <select name="is_active" class="form-control">
                    <option value="1">Ya</option>
                    <option value="0">Tidak</option>
                </select>
            </div>
            <div class="form-group mb-3">
                <label>Urutan</label>
                <input type="number" name="sort_order" class="form-control" value="0">
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
</div>
@endsection


