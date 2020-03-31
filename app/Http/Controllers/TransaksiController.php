<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Buku;
use App\Kategori;
use App\Anggota;
use App\Transaksi;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transaksi = DB::table('transaksi')
        ->join('buku', 'buku.id_buku', '=', 'transaksi.id_buku')
        ->join('kategori', 'kategori.id_kategori', '=', 'buku.id_kategori')
        ->join('anggota', 'transaksi.id_anggota', '=', 'anggota.id_anggota')
        ->select('transaksi.id','anggota.nama','buku.id_buku',
                 'buku.judul', 
                 'buku.deskripsi', 'kategori.nama as id_kategori',
                 'transaksi.tgl_pinjam','transaksi.tgl_kembali')
        ->get();

        // return $transaksi;
        return view('transaksi.data-transaksi', compact('transaksi'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('transaksi.pinjam');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(Anggota::where('id_anggota', $request->id_anggota)->count() > 0){
            if(Buku::where('id_buku', $request->id_buku)->count() > 0){
                // return $request;
                $transaksi = new Transaksi;
                // $transaksi->type_transaksi = $request->type_transaksi;
                $transaksi->id_anggota = $request->id_anggota;
                $transaksi->id_buku = $request->id_buku;
                if($request->type_transaksi == 'pinjam'){
                    $transaksi->tgl_pinjam = $request->tgl_pinjam;
                    $transaksi->tgl_kembali = null;
                    $transaksi->save();
                    return redirect('transaksi')->with('msg','Data Berhasil di Simpan');
                }else{
                    $transaksi->tgl_kembali = $request->tgl_kembali;
                }

                // return $transaksi;
            }else{
                return json_encode('Buku tidak ditemukan!');
            }
        }else{
            return json_encode('Anggota tidak ditemukan');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pinjaman = DB::table('transaksi')
        ->join('buku', 'buku.id_buku', '=', 'transaksi.id_buku')
        ->join('anggota', 'anggota.id_anggota', '=', 'transaksi.id_anggota')
        ->join('kategori', 'kategori.id_kategori', '=', 'buku.id_kategori')
        ->select('transaksi.id','transaksi.id_anggota', 'anggota.nama',
                 'buku.id_buku', 'buku.judul','buku.deskripsi',
                 'kategori.nama as id_kategori','transaksi.tgl_pinjam',
                 'transaksi.tgl_kembali')
        ->where('transaksi.id', '=', $id)->first();

        return json_encode($pinjaman);
    }

    public function showBuku($id)
    {
        // $buku = Buku::where('id_buku', $id)->first();
        
        if(Buku::where('id_buku', $id)->count() > 0){
            $buku = DB::table('buku')
            ->join('kategori', 'buku.id_kategori', '=', 'kategori.id_kategori')
            ->select('buku.id_buku','buku.judul', 'buku.deskripsi', 
                    'kategori.nama as id_kategori', 'buku.cover')
            ->where('buku.id_buku', '=', $id)
            ->get();

            return $buku;
        }else{
            return 'false';
        }
    }

    public function getAnggota($id)
    {
        // $buku = Buku::where('id_buku', $id)->first();
        
        $anggota = Anggota::where('id_anggota', $id)->first();
        // return $anggota;
        if($anggota === null){
            return 'false';
        }else{
            return $anggota;
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pinjaman = DB::table('transaksi')
        ->join('buku', 'buku.id_buku', '=', 'transaksi.id_buku')
        ->join('anggota', 'anggota.id_anggota', '=', 'transaksi.id_anggota')
        ->join('kategori', 'kategori.id_kategori', '=', 'buku.id_kategori')
        ->select('transaksi.id','transaksi.id_anggota', 'anggota.nama',
                 'buku.id_buku', 'buku.judul','buku.deskripsi',
                 'kategori.nama as id_kategori','transaksi.tgl_pinjam',
                 'transaksi.tgl_kembali')
        ->where('transaksi.id', '=', $id)->first();

        return view('transaksi.kembali', compact('pinjaman'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Transaksi::where('id',$id)
        ->update(['tgl_kembali' => $request->tgl_kembali]);
        return redirect('transaksi')->with('msg','Buku Telah dikembalikan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
