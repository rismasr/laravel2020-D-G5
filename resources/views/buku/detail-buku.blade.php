@extends('main')

@section('title', 'Laravel - SI Perpustakaan')

@section('content')
    <div class="container">
        <div class="jumbotron">
        @if(session('msg'))
            <div class="alert alert-success alert-dismissible fade show mt-2" role="alert">
                {{session('msg')}}

                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
            <h1 class="display-6">Detail Buku</h1>
            <hr class="my-2">
            <button class="btn btn-danger float-left" onclick="history.go(-1)">Kembali</button>     

            <table class="table">
                @if($buku)
                <tr>
                    <th style="border:0">Id</th>
                    <td style="border:0">:</td>
                    <td style="border:0">{{ $buku['id_buku'] }}</td>
                </tr>
                <tr>
                    <th style="border:0">Judul</th>
                    <td style="border:0">:</td>
                    <td style="border:0">{{ $buku['judul'] }}</td>
                </tr>
                    <tr>
                    <th style="border:0">Deskripsi</th>
                    <td style="border:0">:</td>
                    <td style="border:0">{{ $buku['deskripsi'] }}</td>
                </tr>
                <tr>
                    <th style="border:0">Kategori</th>
                    <td style="border:0">:</td>
                    <td style="border:0">{{ $buku['id_kategori'] }}</td>
                </tr>
                <tr>
                    <th style="border:0">Cover Buku</th>
                    <td style="border:0">:</td>
                    <td><img src='image/{{ $buku->cover }}' style='width:80px; height:100px;'></td>
                    
                </tr>
                 @else
                    <td colspan="3">Tidak dapat menampilkan detail data</td>
                
                @endif
            </table>
        </div>
    </div>
@endsection