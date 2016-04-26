<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produksi extends Model
{
    protected $table = "produksi";

    public function user()
    {
    	return $this->belongsTo('App\User', 'id_user');
    }
}