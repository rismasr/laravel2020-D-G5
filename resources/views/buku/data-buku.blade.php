@extends('main')

@section('title', 'Laravel - SI Perpustakaan')

@section('content')
    <div class="container">
        <div class="jumbotron">

            @php
                $judul = ['Geez & Ann', 'Buku Pemrograman Web PHP', 'Logika Pemrograman Python', 'Bang Gaber Eksis Abizz', "SEMUA"];
            @endphp

            @if(session('msg'))
                <div class="alert alert-success alert-dismissible fade show mt-2" role="alert">
                    {{session('msg')}}

                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            <h1 class="display-6">Data Buku</h1>
            <hr class="my-2">
            <a href="{{ route('buku.create') }}" class="btn btn-primary mb-1 my-3">Tambah Buku</a>
            <form action="{{route('buku.index')}}" class="row mb-4">
                    <div class="col-md-8">
                        <select name="judul" class="form-control" onchange="ubah()" id="id">
                            <option value="" disabled selected>Pilih Judul Buku</option>
                            @foreach ($judul as $jdl)
                            <option value="{{ $jdl == "SEMUA" ? "" : $jdl }}" >{{ $jdl }} </option>
                            @endforeach 
                        </select>
                    </div>
                    <input type="submit" class="btn btn-success float-right mb-4" value="Cari">     
  
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                    <th scope="col">No</th>
                    <th scope="col">Judul Buku</th>
                    <th scope="col">Deskripsi Buku</th>
                    <th scope="col">Kategori Buku</th>
                    <th scope="col">Cover Buku</th>
                    <th scope="col">Action</th>
                    <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($buku as $buku)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $buku->judul }}</td>
                        <td>{{ $buku->deskripsi }}</td>
                        <td>{{ $buku->id_kategori }}</td>
                        <td><img src='image/{{ $buku->cover }}' style='width:80px; height:100px;'></td>
                        <td>
                            <form action="{{ route('buku.destroy', $buku->id_buku) }}" method="POST">
                            <a href="{{ route('buku.show', $buku->id_buku) }}" class="badge badge-primary">Detail</a>
                            <a href="{{ route('buku.edit', $buku->id_buku) }}" class="badge badge-primary">Edit</a>
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <button type="submit" class="badge badge-danger" onclick="return confirm('Yakin ingin menghapus data?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <script>
        function ubah(){
            var judul = document.getElementById('judul').value;
            window.location.href = "{{ url('buku') }}/"+judul;
        }
    </script>
@endsection