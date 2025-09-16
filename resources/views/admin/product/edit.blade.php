@extends('admin.layouts.app')

@section('content')
<div class="card-box mb-30">
    <div class="pd-20 d-flex justify-content-between align-items-center">
        <h4 class="text-blue h4">Edit Produk</h4>
        <a href="{{ route('admin.product.index') }}" class="btn btn-secondary">Kembali</a>
    </div>
    <div class="pb-20 p-3">
        <form action="{{ route('admin.product.update', $product) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group mb-3">
                <label>Nama</label>
                <input type="text" name="name" class="form-control" value="{{ $product->name }}" required>
            </div>
            <div class="form-group mb-3">
                <label>Gambar</label>
                <input type="file" name="image" class="form-control">
                @if($product->image_path)
                    <img src="{{ asset('storage/'.$product->image_path) }}" class="img-fluid mt-2" style="max-height:120px;" />
                @endif
            </div>
            <div class="form-group mb-3">
                <label>Aktif</label>
                <select name="is_active" class="form-control">
                    <option value="1" {{ $product->is_active ? 'selected' : '' }}>Ya</option>
                    <option value="0" {{ !$product->is_active ? 'selected' : '' }}>Tidak</option>
                </select>
            </div>
            <div class="form-group mb-3">
                <label>Urutan</label>
                <input type="number" name="sort_order" class="form-control" value="{{ $product->sort_order }}">
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
</div>
@endsection


