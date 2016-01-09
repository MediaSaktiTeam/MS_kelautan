<?php namespace App\Http\Middleware;

use Auth;
use Closure;

class MustLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        $user = Auth::user();
        if ( Auth::check() ) {

            return $next($request);
            
        } elseif ( Auth::viaRemember() ) {
            
            return $next($request);
            
        }

        return redirect('/app/login');
    }
}
