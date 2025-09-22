@extends('admin.layouts.app')

@section('content')
<div class="card-box mb-30">
    <div class="pd-20 d-flex justify-content-between align-items-center">
        <h4 class="text-blue h4">Tim Kami</h4>
        <a href="{{ route('admin.team.add') }}" class="btn btn-primary">Tambah Anggota</a>
    </div>
    <div class="pb-20">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Foto</th>
                    <th>Nama</th>
                    <th>Posisi</th>
                    <th>Email</th>
                    <th>Publik</th>
                    <th>Urutan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($teams as $team)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>
                        @if($team->image_path)
                            <img src="{{ asset('storage/'.$team->image_path) }}" alt="{{ $team->name }}" class="rounded-circle" width="40" height="40" style="object-fit: cover;">
                        @else
                            <div class="rounded-circle bg-light d-flex align-items-center justify-content-center" style="width: 40px; height: 40px;">
                                <i class="fa fa-user text-muted"></i>
                            </div>
                        @endif
                    </td>
                    <td>{{ $team->name }}</td>
                    <td>{{ $team->position }}</td>
                    <td>{{ $team->email ?? '-' }}</td>
                    <td>
                        <span class="badge {{ $team->is_published ? 'badge-success' : 'badge-secondary' }}">
                            {{ $team->is_published ? 'Ya' : 'Tidak' }}
                        </span>
                    </td>
                    <td>{{ $team->sort_order }}</td>
                    <td>
                        <a href="{{ route('admin.team.edit', $team) }}" class="btn btn-sm btn-warning">Edit</a>
                        <a href="{{ route('admin.team.delete', $team) }}" class="btn btn-sm btn-danger" onclick="return confirm('Hapus anggota tim ini?')">Hapus</a>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="8" class="text-center">Belum ada anggota tim</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
