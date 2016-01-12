<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;

class ValidasiController extends Controller
{
    public function index()
    {

    	if ( $this->validated() ) {
    		return redirect(url('/'));
    		exit;
    	}


    	$data['validasi'] = $this->get_driver();

    	return view('validasi.index', $data);
    }

    public function validasi(Request $r)
    {
    	$driver = $this->dek($this->get_driver());
    	$key_app = $this->enk($driver."_MS");

    	$key_from_user = $r->key;

    	if ( $key_from_user == $key_app ) {

    		DB::table('validasi')->where('id',1)
                    ->update(['key' => $key_from_user]);

    		echo "<center><h2>Berhasil Mengaktifkan Aplikasi</h2>
    				<a href=".url('/').">Home</a></center>";

    	} else {
    		$r->session()->flash('gagal', 'Key yang anda masukkan salah');
    		return redirect('/mediasakti/validasi-app');
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
