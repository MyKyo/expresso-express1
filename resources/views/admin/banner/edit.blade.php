@extends('admin.layouts.app')

@section('content')
<div class="card-box mb-30">
    <div class="pd-20 d-flex justify-content-between align-items-center">
        <h4 class="text-blue h4">Edit Banner</h4>
        <a href="{{ route('admin.banner.index') }}" class="btn btn-secondary">Kembali</a>
    </div>
    <div class="pb-20 p-3">
        <form action="{{ route('admin.banner.update', $banner) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group mb-3">
                <label>Judul</label>
                <input type="text" name="title" class="form-control" value="{{ old('title', $banner->title) }}">
            </div>
            
            <div class="form-group mb-3">
                <label>Gambar Desktop</label>
                <input type="file" name="image_desktop" class="form-control">
                @if($banner->image_desktop_path)
                    <img src="{{ asset('storage/'.$banner->image_desktop_path) }}" class="img-fluid mt-2" style="max-height:120px;" />
                @endif
            </div>
            <div class="form-group mb-3">
                <label>Gambar Mobile</label>
                <input type="file" name="image_mobile" class="form-control">
                @if($banner->image_mobile_path)
                    <img src="{{ asset('storage/'.$banner->image_mobile_path) }}" class="img-fluid mt-2" style="max-height:120px;" />
                @endif
            </div>
            
            <div class="form-group mb-3">
                <label>Aktif</label>
                <select name="is_active" class="form-control">
                    <option value="1" {{ $banner->is_active ? 'selected' : '' }}>Digunakan</option>
                    <option value="0" {{ !$banner->is_active ? 'selected' : '' }}>Tidak</option>
                </select>
            </div>
            <div class="form-group mb-3">
                <label>Urutan</label>
                <input type="number" name="sort_order" class="form-control" value="{{ old('sort_order', $banner->sort_order) }}">
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
</div>
@endsection


