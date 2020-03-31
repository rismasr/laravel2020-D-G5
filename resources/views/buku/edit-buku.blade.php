@extends('main')

@section('title', 'Laravel - SI Perpustakaan')

@section('content')
<div class="container">
        <div class="jumbotron">
            <h1 class="display-6">Edit Data Buku</h1>
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

             @if ($buku)
           <form action="{{ route('buku.update', $buku['id_buku']) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="judul_buku">Judul Buku</label>
                    <input type="text" class="form-control" name="judul" placeholder="Judul Buku" value="{{ $buku['judul'] }}">
                </div>
                <div class="form-group">
                    <label for="deskripsi">Deskripsi Buku</label>
                    <input type="text" class="form-control" name="deskripsi" placeholder="Deskripsi Buku" value="{{ $buku['deskripsi'] }}">
                </div>
                <div class="form-group">
                    <label for="kategori">Kategori Buku</label>
                    <select class="form-control" id="kategori" name="id_kategori" value="{{ $buku['id_kategori'] }}>
                        @foreach ($kategori as $kat)
                            <option value="{{ $kat->id_kategori }}">{{ $kat->nama }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="cover_img">Cover Buku</label>
                    <input type="file" name="cover" value="{{ $buku['cover'] }}>
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