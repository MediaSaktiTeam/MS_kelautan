<?php namespace App\Http\Middleware;

use Auth;
use Closure;
use DB;

class Blog
{

    public function handle($request, Closure $next)
    {

        $sql = DB::table('permissions')->where('id_user', Auth::user()->id)->first();

        if ( $sql->blog == 1 ) {
            return $next($request);
        }

        echo "<center><h2>Anda tidak memiliki cukup izin untuk mengakses halaman ini</h2></center>";
    }

}