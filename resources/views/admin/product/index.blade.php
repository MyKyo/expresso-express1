@extends('admin.layouts.app')

@section('content')
<div class="card-box mb-30">
    <div class="pd-20 d-flex justify-content-between align-items-center">
        <h4 class="text-blue h4">Produk Populer</h4>
        <a href="{{ route('admin.product.add') }}" class="btn btn-primary">Tambah Produk</a>
    </div>
    <div class="pb-20">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nama</th>
                    <th>Aktif</th>
                    <th>Urutan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($products as $product)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->is_active ? 'Ya' : 'Tidak' }}</td>
                    <td>{{ $product->sort_order }}</td>
                    <td>
                        <a href="{{ route('admin.product.edit', $product) }}" class="btn btn-sm btn-warning">Edit</a>
                        <a href="{{ route('admin.product.delete', $product) }}" class="btn btn-sm btn-danger" onclick="return confirm('Hapus produk ini?')">Hapus</a>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="text-center">Belum ada produk</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection


