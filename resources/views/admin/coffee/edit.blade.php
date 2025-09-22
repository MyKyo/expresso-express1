@extends('admin.layouts.app')

@section('content')
<div class="card-box mb-30">
    <div class="pd-20 d-flex justify-content-between align-items-center">
        <h4 class="text-blue h4">Edit Coffee Item</h4>
        <a href="{{ route('admin.coffee.index') }}" class="btn btn-secondary">Kembali</a>
    </div>
    <div class="pb-20 p-3">
        <form action="{{ route('admin.coffee.update', $item) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group mb-3">
                <label>Nama (gambar)</label>
                <input type="file" name="name" class="form-control" accept="image/*">
                @if($item->name)
                    <img src="{{ asset('storage/'.$item->name) }}" class="img-fluid mt-2" style="max-height:120px;" />
                @endif
            </div>
            <div class="form-group mb-3">
                <label>Deskripsi (gambar)</label>
                <input type="file" name="description" class="form-control" accept="image/*">
                @if($item->description)
                    <img src="{{ asset('storage/'.$item->description) }}" class="img-fluid mt-2" style="max-height:120px;" />
                @endif
            </div>
            <div class="form-group mb-3">
                <label>Gambar</label>
                <input type="file" name="image" class="form-control">
                @if($item->image_path)
                    <img src="{{ asset('storage/'.$item->image_path) }}" class="img-fluid mt-2" style="max-height:120px;" />
                @endif
            </div>
            <div class="form-group mb-3">
                <label>Aktif</label>
                <select name="is_active" class="form-control">
                    <option value="1" {{ $item->is_active ? 'selected' : '' }}>Ya</option>
                    <option value="0" {{ !$item->is_active ? 'selected' : '' }}>Tidak</option>
                </select>
            </div>
            <div class="form-group mb-3">
                <label>Urutan</label>
                <input type="number" name="sort_order" class="form-control" value="{{ $item->sort_order }}">
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
</div>
@endsection


