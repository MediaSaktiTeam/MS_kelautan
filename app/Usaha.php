<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Usaha extends Model
{
    protected $table = "app_usaha";

    public $timestamps = false;

    public function jenisusaha()
    {
    	return $this->belongsTo('App\JenisUsaha', 'jenis_usaha');
    }
}