@extends('main')

@section('title', 'Laravel - SI Perpustakaan')

@section('content')
<div class="container">
        <div class="jumbotron">
            <h1 class="display-6">Tambah Data Anggota</h1>
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

            <form action="{{ route('anggota.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="nama">Nama Anggota</label>
                    <input type="text" class="form-control" name="nama_anggota" placeholder="Nama Anggota">
                </div>
                <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <input type="text" class="form-control" name="alamat" placeholder="Alamat Anggota">
                </div>
                <div class="form-group">
                    <label for="jenis_kelamin">Jenis Kelamin</label>
                    <select class="form-control" name="jenis_kelamin">
                        <option value="laki-laki">Laki-laki</option>
                        <option value="perempuan">Perempuan</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="email">Alamat Email</label>
                    <input type="email" class="form-control" name="email" aria-describedby="emailHelp" placeholder="Enter email">
                </div>
                <div class="form-group">
                    <label for="no_telp">No. HP</label>
                    <input type="text" class="form-control" name="no_telp" placeholder="NO. HP">
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>
    </div>
@endsection