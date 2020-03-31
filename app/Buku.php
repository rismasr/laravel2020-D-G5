<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
	protected $table = 'buku';
    protected $primaryKey = 'id_buku';
    protected $fillable = ['judul','deksripsi','id_kategori','cover'];

    public function get_kategori(){
        return $this->belongsTo('App\Kategori');
    }

    public function transaksi()
    {
    	return $this->hasMany(Transaksi::class);
    }
}
