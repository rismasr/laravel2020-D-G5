@extends('main')

@section('title', 'Laravel - SI Perpustakaan')

@section('content')
    <div class="container">
        <div class="jumbotron">
                @if ($msg = Session::get('msg'))
                    <div class="alert alert-success">
                        <span>{{ $msg }}</span>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>   
                    </div>
                @endif

                @php
                    $nama = ['Komik', 'Biologi', 'Novel','Pemrogramman','Ekonomi Bisnis', "SEMUA"];
                @endphp


            <h1 class="display-6">Data Kategori</h1>
            <hr class="my-2">     

            <a href="{{ route('kategori.create') }}" class="btn btn-primary mb-1 my-3">Tambah Kategori</a>
            <form action="{{route('kategori.index')}}" class="row mb-4">
                    <div class="col-md-8">
                        <select name="nama" class="form-control">
                            <option value="" disabled selected>Pilih Kategori</option>
                            @foreach ($nama as $ktgr)
                            <option value="{{ $ktgr == "SEMUA" ? "" : $ktgr }}" >{{ $ktgr }} </option>
                            @endforeach 
                        </select>
                    </div>
                    <input type="submit" class="btn btn-success float-right mb-4" value="Cari">

            <table class="table">
                <thead class="thead-dark">
                    <tr>
                    <th scope="col">No</th>
                    <th scope="col">Kategori Buku</th>
                    <th scope="col">Deskripsi</th>
                    <th scope="col">Lokasi Buku</th>
                    <th scope="col">Action</th>
                    <th></th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($dataKategori as $kt)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $kt['nama'] }}</td>
                        <td>{{ $kt['deskripsi'] }}</td>
                        <td>{{ $kt['lokasi'] }}</td>
                        <td>
                            <form action="{{ route('kategori.destroy',$kt['id_kategori']) }}" method="POST">
                            <a href="{{ route('kategori.show',$kt['id_kategori']) }}" class="badge badge-primary">Detail</a>
                            <a href="{{ route('kategori.edit',$kt['id_kategori']) }}" class="badge badge-primary">Edit</a>

                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <button type="submit" class="badge badge-danger" onclick="return confirm('Yakin ingin menghapus data?')">Hapus</button>
                        </form>
                        </td>
                    </tr>
                    @empty
                        <td colspan="3"> Tidak ada Data</td>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    <script>
        function action(){  
            var nama = document.getElementById('nama').value;
            window.location = "{{ url('kategori') }}/"+nama;
        }
    </script>
@endsection