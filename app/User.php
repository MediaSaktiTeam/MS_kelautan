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
        return $this->belongsTo('App\Kelompok','id_kelompok','id');
    }

    public function jabatan()
    {
        return $this->belongsTo('App\Jabatan', 'id_jabatan');
    }

    public function usaha()
    {
        return $this->belongsTo('App\Usaha', 'id_usaha');
    }
}
