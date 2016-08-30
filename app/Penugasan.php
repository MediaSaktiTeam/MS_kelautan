<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Penugasan extends Model
{
    protected $table = 'app_laporan_penugasan';

    public $timestamps = false;

    public function ttdkanan()
    {
    	return $this->belongsTo('App\Laporan','kolom_kanan');
    }

    public function ttdkiri()
    {
    	return $this->belongsTo('App\Laporan','kolom_kiri');
    }
}
