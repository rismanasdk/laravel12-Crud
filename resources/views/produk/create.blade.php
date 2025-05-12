@extends('layout')

@section('content')

<form action="{{ route('produk.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label>Nama</label>
        <input type="text" name="nama" class="form-control" required>
    </div>
    <div class="form-group">
        <label>Harga</label>
        <input type="number" name="harga" class="form-control" required>
    </div>
    <div class="form-group">
        <label>Deskripsi</label>
        <input type="text" name="deskripsi" class="form-control" required>
    </div>
    <div class="form-group">
        <label>Foto</label>
        <input type="file" name="gambar" class="form-control" required>
        <button type="submit" class="btn btn-success mt-2">Simpan</button>
    </div>
</form>
@endsection