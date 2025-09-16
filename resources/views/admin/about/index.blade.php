@extends('admin.layouts.app')

@section('content')
<div class="card-box mb-30">
    <div class="pd-20 d-flex justify-content-between align-items-center">
        <h4 class="text-blue h4">Tentang Kami</h4>
        <a href="{{ route('admin.about.add') }}" class="btn btn-primary">Tambah</a>
    </div>
    <div class="pb-20">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Judul</th>
                    <th>Publik</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($abouts as $about)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $about->title }}</td>
                    <td>{{ $about->is_published ? 'Ya' : 'Tidak' }}</td>
                    <td>
                        <a href="{{ route('admin.about.edit', $about) }}" class="btn btn-sm btn-warning">Edit</a>
                        <a href="{{ route('admin.about.delete', $about) }}" class="btn btn-sm btn-danger" onclick="return confirm('Hapus data ini?')">Hapus</a>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="text-center">Belum ada data</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection


