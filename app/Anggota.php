<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Anggota extends Model
{
    protected $table = 'anggota';
    protected $primaryKey = 'id_anggota';
    protected $fillable = ['nama','alamat','jk','email','nohp'];

    public function transaksi()
    {
    	return $this->hasMany(Transaksi::class);
    }
}
