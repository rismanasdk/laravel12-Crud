@extends('layout')

@section('content')

<form action="{{ route('produk.update', $produk->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="form-group">
        <label>Nama</label>
        <input type="text" name="nama" value="{{ $produk->nama }}" class="form-control" required>
    </div>
    <div class="form-group">
        <label>Harga</label>
        <input type="number" name="harga" value="{{ $produk->harga }}" class="form-control" required>
    </div>
    <div class="form-group">
        <label>Deskripsi</label>
        <input type="text" name="deskripsi" value="{{ $produk->deskripsi }}" class="form-control" required>
    </div>
    <div class="form-group">
        <label>Foto</label>
        <input type="file" name="gambar" value="{{ $produk->gambar }}" class="form-control">
        @if ($produk->gambar)
            <img src="{{ asset('storage/'. $produk->gambar) }}" width="80" alt="gambar">
        @endif
    </div>
    <button type="submit" class="btn btn-primary mt-2">Simpan</button>
</form>
@endsection