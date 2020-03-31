<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Anggota;

class AnggotaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $dataAnggota = Anggota::all();


        if($request->query('alamat')){
            $dataAnggota = Anggota::where('alamat', request()->alamat)->get();
        }

        return view('anggota.data-anggota', compact('dataAnggota'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('anggota.create-anggota');
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
            'nama_anggota' => 'required|max:30',
            'alamat' => 'required|max:255',
            'email' => 'required|max:30|unique:anggota',
            'jenis_kelamin' => 'required',
            'no_telp' => 'required|max:13',
        ]);
        Anggota::create([
            'nama' => $request->nama_anggota,
            'alamat' => $request->alamat,
            'jk' => $request->jenis_kelamin,
            'email' => $request->email,
            'nohp' => $request->no_telp,
        ]);
        
        return redirect()->route('anggota.index')->with('msg', 'Data anda telah diinputkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id_anggota)
    {
        $dataAnggota = Anggota::find($id_anggota);
        return view('anggota.detail-anggota', compact('dataAnggota'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id_anggota)
    {
         $dataAnggota = Anggota::find($id_anggota);
        return view('anggota.edit-anggota',compact('dataAnggota'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_anggota)
    {
        $request->validate([
            'nama_anggota' => 'required|max:30',
            'alamat' => 'required|max:255',
            'email' => 'required|max:30|unique:anggota',
            'jenis_kelamin' => 'required',
            'no_telp' => 'required|max:13',
        ]);


        $anggota = Anggota::find($id_anggota);
        $anggota->nama = $request->nama_anggota;
        $anggota->alamat = $request->alamat;
        $anggota->jk = $request->jenis_kelamin;
        $anggota->email = $request->email;
        $anggota->nohp = $request->no_telp;
        $anggota->save();

        return redirect()->route('anggota.index')->with('msg', 'Data anda telah diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_anggota)
    {
        $anggota = Anggota::findOrFail($id_anggota);
        $anggota->delete();
        return redirect()->route('anggota.index')->with('msg', 'Data anda telah dihapus!');
    }
}
