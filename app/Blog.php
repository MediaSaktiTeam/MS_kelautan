<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $table = "site_blog";
    
    public function kategori(){
    	return $this->belongsToMany('App\Kategori', 'site_blog_kategori', 'id_blog', 'id_kategori');
    }

    public function User(){
    	return $this->belongsTo('App\User','id_user');
    }

}