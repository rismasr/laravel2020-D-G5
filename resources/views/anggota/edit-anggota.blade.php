@extends('main')

@section('title', 'Laravel - SI Perpustakaan')

@section('content')
<div class="container">
        <div class="jumbotron">
            <h1 class="display-6">Edit Data Anggota</h1>
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

            
            @if ($dataAnggota)
            <form action="{{ route('anggota.update', $dataAnggota['id_anggota']) }}" method="POST">
                @csrf
                @method('put')
                <div class="form-group">
                    <label for="nama">Nama Anggota</label>
                    <input type="text" class="form-control" name="nama_anggota" placeholder="Nama Anggota" value="{{ $dataAnggota['nama'] }}">
                </div>
                <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <input type="text" class="form-control" name="alamat" placeholder="Alamat Anggota" value="{{ $dataAnggota['alamat'] }}">
                </div>
                <div class="form-group">
                    <label for="jenis_kelamin">Jenis Kelamin</label>
                    <select class="form-control" name="jenis_kelamin" value="{{ $dataAnggota['jk'] }}">
                        <option value="laki-laki">Laki-laki</option>
                        <option value="perempuan">Perempuan</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="email">Alamat Email</label>
                    <input type="email" class="form-control" name="email" aria-describedby="emailHelp" placeholder="Enter email" value="{{ $dataAnggota['email'] }}">
                </div>
                <div class="form-group">
                    <label for="no_telp">No. HP</label>
                    <input type="text" class="form-control" name="no_telp" placeholder="NO. HP" value="{{ $dataAnggota['nohp'] }}">
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