@extends('main')

@section('title', 'Laravel - SI Perpustakaan')

@section('content')
<div class="container">
        <div class="jumbotron">
            <h1 class="display-6">Pinjam Buku</h1>
            <hr class="my-4">     

            <form action="{{ action('TransaksiController@update', $pinjaman->id) }}" method="POST">
                @csrf

                <div class="form-group">
                    <label for="type_transaksi">Type Transaksi</label>
                    <select class="form-control" name="type_transaksi">
                        <option value="kembali">Kembali</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="id_buku">Kode Buku</label>
                    <input type="text" class="form-control" name="id_buku" value="{{ $pinjaman->id_buku }}" readonly="true">
                </div>
                <div class="form-group">
                    <label for="judul_buku">Judul Buku</label>
                    <input type="text" class="form-control" name="judul" value="{{ $pinjaman->judul }}" readonly="true">
                </div>
                <div class="form-group">
                    <label for="deskripsi">Deskripsi Buku</label>
                    <input type="text" class="form-control" id="deskripsi" name="deskripsi" value="{{ $pinjaman->deskripsi }}" readonly="true">
                </div>
                <div class="form-group">
                    <label for="kategori">Kategori Buku</label>
                    <input type="text" class="form-control" name="id_kategori" value="{{ $pinjaman->id_kategori }}" readonly="true">
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-sm-6">
                            <label for="kategori">Tanggal Pinjam</label>
                            <input type="date" class="form-control" name="tgl_pinjam" value="{{ $pinjaman->tgl_pinjam }}" readonly="true">
                        </div>
                        <div class="col-sm-6">
                            <label for="kategori">Tanggal Kembali</label>
                            <input type="date" class="form-control" name="tgl_kembali">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="id_anggota">ID Anggota Peminjam</label>
                    <input type="text" class="form-control" name="id_anggota" value="{{ $pinjaman->id_anggota }}" readonly="true">
                </div>
                <div class="form-group">
                    <label for="nama_anggota">Nama Peminjam</label>
                    <input type="text" class="form-control" name="nama"  readonly="true" value="{{ $pinjaman->nama }}">
                </div>

                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>

    <script>
        $(function(){
            $('#id_buku').on('change', function(e){
                let id_buku = $('#id_buku').val();
                console.log(id_buku);
                let url = $(this).data('url')+'/transaksi/showBuku/'+id_buku;
                console.log(url);
                getBuku(url);
            })
            $('#id_anggota').on('change', function(e){
                let id_anggota = $('#id_anggota').val();
                console.log(id_anggota);
                let url = $(this).data('url')+'/transaksi/getAnggota/'+id_anggota;
                console.log(url);
                getAnggota(url);
            })
        })
        function getBuku(url){
            $.getJSON(url, function(data){
                if(data === false){
                    alert('Buku tidak ditemukan!');
                    $('#id_buku').val("");
                }else{
                    $('#judul').val(data[0].judul);
                    $('#deskripsi').val(data[0].deskripsi);
                    $('#id_kategori').val(data[0].id_kategori);
                }
            });
        }
        function getAnggota(url){
            $.getJSON(url, function(data){
                if(data === false){
                    alert('Data anggota tidak ditemukan!');
                    $('#id_anggota').val("");
                    $('#nama').val("");
                }else{
                    $('#nama').val(data.nama);
                }
            });
        }
    </script>
@endsection