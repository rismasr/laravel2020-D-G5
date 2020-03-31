@extends('main')

@section('title', 'Laravel - SI Perpustakaan')

@section('content')
<div class="container">
        <div class="jumbotron">
            <h1 class="display-6">Pinjam Buku</h1>
            <hr class="my-4">     

            <form action="/transaksi" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                    <label for="type_transaksi">Type Transaksi</label>
                    <select class="form-control" id="type_transaksi" name="type_transaksi">
                        <option value="pinjam">Pinjam</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="id_buku">Kode Buku</label>
                    <input type="text" class="form-control" id="id_buku" name="id_buku" placeholder="ID Buku" data-url="{{ url('/') }}">
                </div>
                <div class="form-group">
                    <label for="judul_buku">Judul Buku</label>
                    <input type="text" class="form-control" id="judul" name="judul" placeholder="Judul Buku" readonly="true">
                </div>
                <div class="form-group">
                    <label for="deskripsi">Deskripsi Buku</label>
                    <input type="text" class="form-control" id="deskripsi" name="deskripsi" placeholder="Deskripsi Buku" readonly="true">
                </div>
                <div class="form-group">
                    <label for="kategori">Kategori Buku</label>
                    <input type="text" class="form-control" id="id_kategori" name="id_kategori" placeholder="Kategori Buku" readonly="true">
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-sm-6">
                            <label for="kategori">Tanggal Pinjam</label>
                            <input type="date" class="form-control" name="tgl_pinjam">
                        </div>
                        <div class="col-sm-6">
                            <label for="kategori">Tanggal Kembali</label>
                            <input type="date" class="form-control" name="tgl_kembali" readonly="true">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="id_anggota">ID Anggota Peminjam</label>
                    <input type="text" class="form-control" id="id_anggota" name="id_anggota" placeholder="ID Anggota" data-url="{{ url('/') }}">
                </div>
                <div class="form-group">
                    <label for="nama_anggota">Nama Peminjam</label>
                    <input type="text" class="form-control" id="nama" name="nama"  readonly="true">
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