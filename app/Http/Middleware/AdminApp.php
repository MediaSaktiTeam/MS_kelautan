<?php namespace App\Http\Middleware;

use Auth;
use Closure;
use DB;

class AdminApp
{

    public function handle($request, Closure $next)
    {

        $sql = DB::table('permissions')->where('id_user', Auth::user()->id)->first();

        if ( $sql->pesisir == 1 || $sql->pembudidaya == 1 || $sql->nelayan || $sql->pengolah ) {
            return $next($request);
        }

        echo "<center><h2>Anda tidak memiliki cukup izin untuk mengakses halaman ini</h2></center>";
    }

}