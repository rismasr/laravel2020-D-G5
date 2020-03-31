<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kategori;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $dataKategori = Kategori::all();


        if($request->query('nama')){
            $dataKategori = Kategori::where('nama', request()->nama)->get();
        }

        return view('kategori.data-kategori', compact('dataKategori'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('kategori.create-kategori');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_kategori' => 'required|max:30',
            'deskripsi' => 'required|max:255',
            'lokasi' => 'required|max:100',
            
        ]);
        Kategori::create([
            'nama' => $request->nama_kategori,
            'deskripsi' => $request->deskripsi,
            'lokasi' => $request->lokasi,
            
        ]);
        
        return redirect()->route('kategori.index')->with('msg', 'Data anda telah diinputkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id_kategori)
    {
        $dataKategori = Kategori::find($id_kategori);
        return view('kategori.detail-kategori', compact('dataKategori'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id_kategori)
    {
        $dataKategori = Kategori::find($id_kategori);
        return view('kategori.edit-kategori',compact('dataKategori'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_kategori)
    {
        $request->validate([
            'nama_kategori' => 'required|max:30',
            'deskripsi' => 'required|max:255',
            'lokasi' => 'required|max:100',
        ]);


        $kategori = Kategori::find($id_kategori);
        $kategori->nama = $request->nama_kategori;
        $kategori->deskripsi = $request->deskripsi;
        $kategori->lokasi = $request->lokasi;
        $kategori->save();

        return redirect()->route('kategori.index')->with('msg', 'Data anda telah diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_kategori)
    {
        $kategori = Kategori::findOrFail($id_kategori);
        $kategori->delete();
        return redirect()->route('kategori.index')->with('msg', 'Data anda telah dihapus!');
    }
}
