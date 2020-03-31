@extends('main')

@section('title', 'Laravel - SI Perpustakaan')

@section('content')
    <div class="container">
        <div class="jumbotron">
        
            <h1 class="display-6">Detail Anggota</h1>
            <hr class="my-2">
            <button class="btn btn-danger float-left" onclick="history.go(-1)">Kembali</button>

            <div class="card-body">     

            <table class="table">
                @if($dataAnggota)
                <tr>
                    <th style="border:0">Id Anggota</th>
                    <td style="border:0">:</td>
                    <td style="border:0">{{ $dataAnggota['id_anggota'] }}</td>
                </tr>
                <tr>
                    <th style="border:0">Nama</th>
                    <td style="border:0">:</td>
                    <td style="border:0">{{ $dataAnggota['nama'] }}</td>
                </tr>
                    <tr>
                    <th style="border:0">Alamat</th>
                    <td style="border:0">:</td>
                    <td style="border:0">{{ $dataAnggota['alamat'] }}</td>
                </tr>
                <tr>
                    <th style="border:0">Jenis Kelamin</th>
                    <td style="border:0">:</td>
                    <td style="border:0">{{ $dataAnggota['jk'] }}</td>
                </tr>
                <tr>
                    <th style="border:0">Email</th>
                    <td style="border:0">:</td>
                    <td style="border:0">{{ $dataAnggota['email'] }}</td>
                </tr>
                <tr>
                    <th style="border:0">No. Telp</th>
                    <td style="border:0">:</td>
                    <td style="border:0">{{ $dataAnggota['nohp'] }}</td>
                </tr>
                @else
                    <td colspan="3">Tidak dapat menampilkan detail data</td>
                
                @endif
            </table>
        </div>
    </div>
    </div>
@endsection