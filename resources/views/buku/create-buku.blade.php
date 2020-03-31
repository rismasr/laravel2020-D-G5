@extends('main')

@section('title', 'Laravel - SI Perpustakaan')

@section('content')
<div class="container">
        <div class="jumbotron">
            <h1 class="display-6">Tambah Data Buku</h1>
            <hr class="my-4">     

            <form action="/buku" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="judul_buku">Judul Buku</label>
                    <input type="text" class="form-control" name="judul" placeholder="Judul Buku" value="{{ old('judul_buku') }}">
                </div>
                <div class="form-group">
                    <label for="deskripsi">Deskripsi Buku</label>
                    <input type="text" class="form-control" name="deskripsi" placeholder="Deskripsi Buku" value="{{ old('deskripsi') }}">
                </div>
                <div class="form-group">
                    <label for="kategori">Kategori Buku</label>
                    <select class="form-control" id="kategori" name="id_kategori">
                        @foreach ($kategori as $kat)
                            <option value="{{ $kat->id_kategori }}">{{ $kat->nama }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="cover_img">Cover Buku</label>
                    <input type="file" name="cover">
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>
@endsection