<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
	protected $table = 'transaksi';
    protected $primaryKey = 'id_transaksi';
    protected $fillable = ['id_anggota', 'id_buku', 'tgl_pinjam'];

    public function anggota()
    {
    	return $this->belongsTo(Anggota::class);
    }

    public function buku()
    {
    	return $this->belongsTo(Buku::class);
    }
}
