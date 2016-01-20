<?php namespace App\Http\Middleware;

use Auth;
use Closure;
use DB;

class MustLogin
{

    public function handle($request, Closure $next)
    {

        if ( Auth::check() ) {

            return $next($request);
            
        } elseif ( Auth::viaRemember() ) {
            
            return $next($request);
            
        }

        if ( basename($_SERVER['REQUEST_URI']) == 'admin' ) {
            return redirect('/admin/login'); 
        } else {
            return redirect('/app/login'); 
        }
    }

}