<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AirTawar extends Model
{
    protected $table = "app_air_tawar";

     public function dataprovinsi(){
    	return $this->belongsTo('App\Provinsi', 'provinsi');
    }

    public function datakabupaten(){
    	return $this->belongsTo('App\Kabupaten', 'kabupaten');
    }

    public function datakecamatan(){
    	return $this->belongsTo('App\Kecamatan', 'kecamatan');
    }

    public function datadesa(){
    	return $this->belongsTo('App\Desa', 'desa');
    }

}