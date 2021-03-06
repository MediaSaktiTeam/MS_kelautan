<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
// use App\Jabatan;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract
{
    use Authenticatable, CanResetPassword;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = "users";

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function kelompok()
    {
        return $this->belongsTo('App\Kelompok','id_kelompok','id_kelompok');
    }

    public function jabatan()
    {
        return $this->belongsTo('App\Jabatan', 'id_jabatan');
    }

     public function jenisusaha()
    {
        return $this->belongsTo('App\JenisUsaha', 'jenis_usaha');
    }

    public function produksi()
    {
        return $this->belongsTo('App\MasterProduksi', 'id_usaha');
    }

    public function sarana()
    {
        return $this->hasMany('App\KepemilikanSarana', 'id_user', 'id');
    }

    public function olahan()
    {
        return $this->belongsTo('App\JenisOlahan', 'id_jenis_olahan');
    }
    public function merekdagang()
    {
        return $this->belongsTo('App\MerekDagang', 'id_merek_dagang');
    }

    public function desa()
    {
        return $this->belongsTo('App\Desa', 'id_desa');
    }
}
