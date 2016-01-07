<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KepemilikanSarana extends Model
{
    protected $table = "app_kepemilikan_sarana";
    
    public $timestamps = false;

    public function sarana()
    {
    	return $this->belongsTo('App\Sarana', 'id_sarana', 'id');
    }
}