<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Buku;
use App\Kategori;
use DB;

class BukuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $buku = DB::table('buku')
        ->join('kategori', 'buku.id_kategori', '=', 'kategori.id_kategori')
        ->select('buku.id_buku','buku.judul', 'buku.deskripsi', 
                 'kategori.nama as id_kategori', 'buku.cover')
        ->get();


        return view('buku.data-buku', compact('buku'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kategori = Kategori::all();
        return view('buku.create-buku', compact('kategori'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
            $this->validate($request, [
            'judul' => 'required',
            'deskripsi'  => 'required',
        ]);
        
        $file = $request->file('cover');

        $buku = new Buku;
        $buku->judul = $request->judul;
        $buku->deskripsi  = $request->deskripsi;
        $buku->id_kategori   = $request->id_kategori;
        $buku->cover  = $file->getClientOriginalName();
        
        $tujuan_upload = 'image';
        $file->move($tujuan_upload,$file->getClientOriginalName());

        $buku->save();
        return redirect('buku')->with('msg','Data Berhasil di Simpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id_buku)
    {

        $buku = Buku::find($id_buku);
        return view('buku.detail-buku', compact('buku'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id_buku)
    {
        $buku = Buku::find($id_buku);
        return view('buku.edit-buku',compact('buku'));
    
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_buku)
    {

        $this->validate($request, [
            'judul' => 'required',
            'deskripsi'  => 'required',
        ]);
        
        $file = $request->file('cover');

        $buku = new Buku;
        $buku->judul = $request->judul;
        $buku->deskripsi  = $request->deskripsi;
        $buku->id_kategori   = $request->id_kategori;
        $buku->cover  = $file->getClientOriginalName();
        
        $tujuan_upload = 'image';
        $file->move($tujuan_upload,$file->getClientOriginalName());

        $buku->save();
        return redirect('buku')->with('msg','Data Berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_buku)
    {
        $buku = Buku::findOrFail($id_buku);
        $buku->delete();
        return redirect()->route('buku.index')->with('msg', 'Data anda telah dihapus!');
    }
}
