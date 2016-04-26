<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kecamatan extends Model
{
    protected $table = 'kecamatan';
    public $timestamps = false;

    public function kabupaten(){
    	return $this->belongsTo('App\kabupaten', 'id_kabupaten');
    }

    public function kecamatan(){
    	return $this->hasMany('App\Desa', 'id_kecamatan');
    }
}
