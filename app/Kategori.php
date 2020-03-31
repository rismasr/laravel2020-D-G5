<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    protected $table = 'kategori';
    protected $primaryKey = 'id_kategori';
    protected $fillable = ['nama','deskripsi','lokasi'];


    public function get_buku(){
        return $this->hasMany('App\Kategori');
    }
}
