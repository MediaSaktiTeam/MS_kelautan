<?php namespace App\Http\Middleware;

use Auth;
use Closure;
use DB;

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

            if($request->ajax()){
                return $next($request);
            }

            if ( !$this->validated() ) {
                return redirect(url('/mediasakti/validasi-app'));
                exit;
            } else {
                return $next($request);
            }
            
        } elseif ( Auth::viaRemember() ) {
            
            if($request->ajax()){
                return $next($request);
            }

            if ( !$this->validated() ) {
                return redirect(url('/mediasakti/validasi-app'));
                exit;
            } else {
            
                return $next($request);

            }
            
        }

        if ( basename($_SERVER['REQUEST_URI']) == 'admin' ) {
            return redirect('/admin/login'); 
        } else {
            return redirect('/app/login'); 
        }
    }

    public function validated()
    {
        $driver = $this->dek($this->get_driver());
        $key_app = $this->enk($driver."_MS");

        $dt = DB::table('validasi')->where('id',1)->first();

        $key = $dt->key;

        if ( $key == $key_app ) {
            return true;
        } else {
            return false;
        }

    }

    public function get_driver()
    {
        $db_host = env('DB_HOST');
        $db_user = env('DB_USERNAME');
        $db_name = env('DB_DATABASE');
        $db_pass = env('DB_PASSWORD');

        $data = $this->enk($db_host."-".$db_user."-".$db_name."-".$db_pass);
        return $data;
    }

    public function enk($string) {
        $output = false;

        $encrypt_method = "AES-256-CBC";
        $secret_key = 'M-Sakti';
        $secret_iv = 'M-Sakti';

        // hash
        $key = hash('sha256', $secret_key);
        
        // iv - encrypt method AES-256-CBC expects 16 bytes - else you will get a warning
        $iv = substr(hash('sha256', $secret_iv), 0, 16);

        $output = openssl_encrypt($string, $encrypt_method, $key, 0, $iv);
        $output = base64_encode($output);

        return $output;
    }

    public function dek($string) {
        $output = false;

        $encrypt_method = "AES-256-CBC";
        $secret_key = 'M-Sakti';
        $secret_iv = 'M-Sakti';

        // hash
        $key = hash('sha256', $secret_key);
        
        // iv - encrypt method AES-256-CBC expects 16 bytes - else you will get a warning
        $iv = substr(hash('sha256', $secret_iv), 0, 16);

        $output = openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $iv);

        return $output;
    }
}
