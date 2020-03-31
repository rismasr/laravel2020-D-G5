@extends('main')

@section('title', 'Laravel - SI Perpustakaan')

@section('content')
<div class="container">
        <div class="jumbotron">
            <h1 class="display-6">Tambah Data Kategori</h1>
            <hr class="my-4">
            <div class="card-body">
                    
                @if ($msg = Session::get('msg'))
                    <div class="alert alert-success">
                        <span>{{ $msg }}</span>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>   
                    </div>
                @endif    

            <form action="{{ route('kategori.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="id">Nama Kategori</label>
                    <input type="text" class="form-control" name="nama_kategori" placeholder="Nama Kategori">
                </div>
                <div class="form-group">
                    <label for="nama">Deskripsi</label>
                    <input type="text" class="form-control" name="deskripsi" placeholder="Deskripsi Kategori Buku">
                </div>
                <div class="form-group">
                    <label for="lokasi">Lokasi Buku</label>
                    <select class="form-control" name="lokasi">
                        <option value="Rak 1">Rak 1</option>
                        <option value="Rak 2">Rak 2</option>
                        <option value="Rak 3">Rak 3</option>
                        <option value="Rak 4">Rak 4</option>
                        <option value="Rak 5">Rak 5</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>
    </div>
@endsection