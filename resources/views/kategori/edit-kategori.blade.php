@extends('main')

@section('title', 'Laravel - SI Perpustakaan')

@section('content')
<div class="container">
        <div class="jumbotron">
            <h1 class="display-6">Edit Data Kategori</h1>
            <hr class="my-4">
            <div class="card-body">

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

             @if ($dataKategori)
            <form action="{{ route('kategori.update', $dataKategori['id_kategori']) }}" method="POST">
                @csrf
                @method('put')
                <div class="form-group">
                    <label for="nama">Nama Kategori</label>
                    <input type="text" class="form-control" name="nama_kategori" placeholder="Nama Kategori" value="{{ $dataKategori['nama'] }}">
                </div>
                <div class="form-group">
                    <label for="alamat">Deskripsi</label>
                    <input type="text" class="form-control" name="deskripsi" placeholder="Deskripsi Kategori" value="{{ $dataKategori['deskripsi'] }}">
                </div>
                <div class="form-group">
                    <label for="lokasi">Lokasi Buku</label>
                    <select class="form-control" name="lokasi" value="{{ $dataKategori['lokasi'] }}">
                        <option value="Rak 1">Rak 1</option>
                        <option value="Rak 2">Rak 2</option>
                        <option value="Rak 3">Rak 3</option>
                        <option value="Rak 4">Rak 4</option>
                        <option value="Rak 5">Rak 5</option>
                    </select>
                </div>
                
                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
            @else
                <p>Data tidak jelas, tidak dapat mengedit data</p>
            @endif
        </div>
    </div>
</div>
@endsection