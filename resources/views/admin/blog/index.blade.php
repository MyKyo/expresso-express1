@extends('admin.layouts.app')

@section('content')
<div class="card-box mb-30">
    <div class="pd-20 d-flex justify-content-between align-items-center">
        <h4 class="text-blue h4">Daftar Blog</h4>
        <a href="{{ route('admin.blog.add') }}" class="btn btn-primary">Tambah Artikel</a>
    </div>
    <div class="pb-20">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Judul</th>
                    <th>Terbit</th>
                    <th>Tanggal</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($posts as $post)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $post->title }}</td>
                    <td>
                        <span class="badge {{ $post->is_published ? 'badge-success' : 'badge-secondary' }}">
                            {{ $post->is_published ? 'Ya' : 'Tidak' }}
                        </span>
                    </td>
                    <td>{{ $post->published_at ? $post->published_at->format('Y-m-d H:i') : '-' }}</td>
                    <td>
                        <a href="{{ route('admin.blog.edit', $post) }}" class="btn btn-sm btn-warning">Edit</a>
                        <a href="{{ route('admin.blog.delete', $post) }}" class="btn btn-sm btn-danger" onclick="return confirm('Hapus artikel ini?')">Hapus</a>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="text-center">Belum ada artikel</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection


