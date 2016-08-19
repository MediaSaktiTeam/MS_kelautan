<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JenisUsaha extends Model
{
    protected $table = "app_jenis_usaha";
    
    public $timestamps = false;

    public function kelompok(){
    	return $this->hasMany('App\Kelompok', 'tipe');
    }
}