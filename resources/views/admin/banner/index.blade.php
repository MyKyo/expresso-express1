@extends('admin.layouts.app')

@section('content')
<div class="card-box mb-30">
    <div class="pd-20 d-flex justify-content-between align-items-center">
        <h4 class="text-blue h4">Data Banner</h4>
        <a href="{{ route('admin.banner.add') }}" class="btn btn-primary">Tambah Banner</a>
    </div>
    <div class="pb-20">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Judul</th>
                    <th>Tipe</th>
                    <th>Aktif</th>
                    <th>Urutan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($banners as $banner)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $banner->title }}</td>
                    <td>{{ strtoupper($banner->type) }}</td>
                    <td>
                        <form action="{{ route('admin.banner.toggle', $banner) }}" method="POST" style="display:inline">
                            @csrf
                            <button type="submit" class="btn btn-sm {{ $banner->is_active ? 'btn-success' : 'btn-secondary' }}">
                                {{ $banner->is_active ? 'Digunakan' : 'Tidak' }}
                            </button>
                        </form>
                    </td>
                    <td>{{ $banner->sort_order }}</td>
                    <td>
                        <a href="{{ route('admin.banner.edit', $banner) }}" class="btn btn-sm btn-warning">Edit</a>
                        <a href="{{ route('admin.banner.delete', $banner) }}" class="btn btn-sm btn-danger" onclick="return confirm('Hapus banner ini?')">Hapus</a>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="text-center">Belum ada data</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection


