@extends('layout')

@section('content')

<a href="{{ route('produk.create') }}" class="btn btn-success mt-2">Tambah</a>

<table class="table table-bordered mt-2">
    <thead>
        <tr>
            <td>Nama</td>
            <td>Harga</td>
            <td>Deskripsi</td>
            <td>Foto</td>
            <td>Aksi</td>
        </tr>
    </thead>
    <tbody>
        @foreach ($produk as $item )
            <tr>
                <td>{{ $item->nama }}</td>
                <td>{{ $item->harga }}</td>
                <td>{{ $item->deskripsi }}</td>
                <td>
                    @if ($item->gambar)
                        <img src="{{ asset('storage/'. $item->gambar) }}" width="80" alt="gambar">
                    @else
                        <span>Tidak Ada Gambar</span>
                    @endif
                </td>
                <td>
                    <a href="{{ route('produk.edit', $item->id) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('produk.destroy', $item->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Anda Yakin?')">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection