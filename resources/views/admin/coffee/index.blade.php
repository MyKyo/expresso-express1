@extends('admin.layouts.app')

@section('content')
<div class="card-box mb-30">
    <div class="pd-20 d-flex justify-content-between align-items-center">
        <h4 class="text-blue h4">Interactive Coffee Items</h4>
        <a href="{{ route('admin.coffee.add') }}" class="btn btn-primary">Tambah Item</a>
    </div>
    <div class="pb-20">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nama (Gambar)</th>
                    <th>Label (Gambar)</th>
                    <th>Aktif</th>
                    <th>Urutan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($items as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>
                        <img src="{{ asset('storage/' . $item->name) }}" alt="Coffee Item" style="max-width: 100px; height: auto;">
                    </td>
                    <td>
                        @if($item->label)
                            <img src="{{ asset('storage/' . $item->label) }}" alt="Label" style="max-width: 100px; height: auto;">
                        @else
                            No Label
                        @endif
                    </td>
                    <td>{{ $item->is_active ? 'Ya' : 'Tidak' }}</td>
                    <td>{{ $item->sort_order }}</td>
                    <td>
                        <a href="{{ route('admin.coffee.edit', $item) }}" class="btn btn-sm btn-warning">Edit</a>
                        <a href="{{ route('admin.coffee.delete', $item) }}" class="btn btn-sm btn-danger" onclick="return confirm('Hapus item ini?')">Hapus</a>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="text-center">Belum ada item</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection


