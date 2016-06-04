<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Desa extends Model
{
    protected $table = 'desa';
    public $timestamps = false;

    public function kecamatan(){
    	return $this->belongsTo('App\Kecamatan', 'id_kecamatan');
    }
    

}
