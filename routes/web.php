<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('index');
});

Route::resource('anggota', 'AnggotaController');

Route::resource('kategori', 'KategoriController');

Route::resource('buku', 'BukuController');

// Route::get('/Kategori', function(){
//         $data = App\BukuController::find(1);
//         echo $data->name.''.'kategori : <br/>';

//         foreach ($data-> get_kategori as $list) {
//             echo '<li>'.$list->kategori;
//         }
//     });

Route::resource('transaksi','TransaksiController');

Route::get('transaksi/edit/{id}', 'TransaksiController@edit');
Route::get('transaksi/showBuku/{id}', 'TransaksiController@showBuku');
Route::get('transaksi/getAnggota/{id}', 'TransaksiController@getAnggota');
Route::post('/transaksi/update/{id}', 'TransaksiController@update');