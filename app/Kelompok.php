<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kelompok extends Model
{
    protected $table = "app_kelompok";
    
    public $timestamps = false;

    public function jenisusaha(){
    	return $this->belongsTo('App\JenisUsaha', 'tipe');
    }
}