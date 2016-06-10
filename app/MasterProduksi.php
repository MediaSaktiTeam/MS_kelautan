<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MasterProduksi extends Model
{
    protected $table = "app_master_produksi";

    public $timestamps = false;

    public function jenisusaha()
    {
    	return $this->belongsTo('App\JenisUsaha', 'nama');
    }
}