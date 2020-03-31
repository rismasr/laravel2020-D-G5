@extends('main')

@section('title', 'Laravel - SI Perpustakaan')

@section('content')
    <div class="container">
        <div class="jumbotron">

            <h1 class="display-6">Detail Kategori</h1>
            <hr class="my-2">
            <button class="btn btn-danger float-left" onclick="history.go(-1)">Kembali</button>

            <div class="card-body">     

            <table class="table">
               @if($dataKategori)
                <tr>
                    <th style="border:0">Id Kategori</th>
                    <td style="border:0">:</td>
                    <td style="border:0">{{ $dataKategori['id_kategori'] }}</td>
                </tr>
                <tr>
                    <th style="border:0">Nama</th>
                    <td style="border:0">:</td>
                    <td style="border:0">{{ $dataKategori['nama'] }}</td>
                </tr>
                <tr>
                    <th style="border:0">Deskripsi</th>
                    <td style="border:0">:</td>
                    <td style="border:0">{{ $dataKategori['deskripsi'] }}</td>
                </tr>
                <tr>
                    <th style="border:0">Lokasi Buku</th>
                    <td style="border:0">:</td>
                    <td style="border:0">{{ $dataKategori['lokasi'] }}</td>
                </tr>
                
                @else
                    <td colspan="3">Tidak dapat menampilkan detail data</td>
                
                @endif
            </table>
        </div>
        </div>
    </div>
@endsection