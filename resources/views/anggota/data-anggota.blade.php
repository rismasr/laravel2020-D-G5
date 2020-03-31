@extends('main')

@section('title', 'Laravel - SI Perpustakaan')

@section('content')
    <div class="container">
        <div class="jumbotron">

            @php
                $alamat = ['Tegal', 'Slawi', 'Brebes', 'Pemalang', "SEMUA"];
            @endphp
                    
                

                @if ($msg = Session::get('msg'))
                    <div class="alert alert-success">
                        <span>{{ $msg }}</span>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>   
                    </div>
                @endif


            <h1 class="display-6">Data Anggota</h1>
            <hr class="my-2">     

            <a href="{{ route('anggota.create') }}" class="btn btn-primary mb-1 my-3">Tambah Anggota</a>

            <form action="{{route('anggota.index')}}" class="row mb-4">
                    <div class="col-md-8">
                        <select name="alamat" class="form-control">
                            <option value="" disabled selected>Pilih Alamat</option>
                            @foreach ($alamat as $almt)
                            <option value="{{ $almt == "SEMUA" ? "" : $almt }}" >{{ $almt }} </option>
                            @endforeach 
                        </select>
                    </div>
                    <input type="submit" class="btn btn-success float-right mb-4" value="Cari">

            <table class="table">
                <thead class="thead-dark">
                    <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Alamat</th>
                    <th scope="col">Jenis Kelamin</th>
                    <th scope="col">Email</th>
                    <th scope="col">No. HP</th>
                    <th scope="col">Action</th>
                    <th></th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($dataAnggota as $ang)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $ang['nama'] }}</td>
                        <td>{{ $ang['alamat'] }}</td>
                        <td>{{ $ang['jk'] }}</td>
                        <td>{{ $ang['email'] }}</td>
                        <td>{{ $ang['nohp'] }}</td>
                        <td>
                            <form action="{{ route('anggota.destroy',$ang['id_anggota']) }}" method="POST">
                            <a href="{{ route('anggota.show',$ang['id_anggota']) }}" class="badge badge-primary">Detail</a>
                            <a href="{{ route('anggota.edit',$ang['id_anggota']) }}" class="badge badge-primary">Edit</a>
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
            var alamat = document.getElementById('alamat').value;
            window.location = "{{ url('anggota') }}/"+alamat;
        }
    </script>
@endsection