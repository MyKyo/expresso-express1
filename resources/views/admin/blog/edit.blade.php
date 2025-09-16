@extends('admin.layouts.app')

@section('content')
<div class="card-box mb-30">
    <div class="pd-20 d-flex justify-content-between align-items-center">
        <h4 class="text-blue h4">Edit Artikel</h4>
        <a href="{{ route('admin.blog.index') }}" class="btn btn-secondary">Kembali</a>
    </div>
    <div class="pb-20 p-3">
        <form action="{{ route('admin.blog.update', $post) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group mb-3">
                <label>Judul</label>
                <input type="text" name="title" class="form-control" value="{{ old('title', $post->title) }}" required>
            </div>
            <div class="form-group mb-3">
                <label>Excerpt</label>
                <input type="text" name="excerpt" class="form-control" value="{{ old('excerpt', $post->excerpt) }}">
            </div>
            <div class="form-group mb-3">
                <label>Konten</label>
                <textarea name="content" class="form-control" rows="8">{{ old('content', $post->content) }}</textarea>
            </div>
            <div class="form-group mb-3">
                <label>Cover</label>
                <input type="file" name="cover" class="form-control">
                @if($post->cover_path)
                    <img src="{{ asset('storage/'.$post->cover_path) }}" class="img-fluid mt-2" style="max-height:120px;" />
                @endif
            </div>
            <div class="form-group mb-3">
                <label>Publikasikan?</label>
                <select name="is_published" class="form-control">
                    <option value="1" {{ $post->is_published ? 'selected' : '' }}>Ya</option>
                    <option value="0" {{ !$post->is_published ? 'selected' : '' }}>Tidak</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
</div>
@endsection


