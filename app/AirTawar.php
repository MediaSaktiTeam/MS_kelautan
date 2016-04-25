<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AirTawar extends Model
{
    protected $table = "app_air_tawar";
    
    public $timestamps = false;

    public function kecamatan(){
    	return $this->belongsTo('App\kecamatan', 'id');
    }

    public function desa(){
    	return $this->belongsTo('App\desa', 'id');
    }
}