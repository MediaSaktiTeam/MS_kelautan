<?php namespace App\Http\Controllers\App;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;
use App\User;

class LoginController extends Controller
{

	public function __construct()
	{
       $this->middleware('guest', ['except' => 'getLogout']);
   	}

    public function getLogin()
    {
        return view('app.login.index');
    }

    public function postLogin(Request $r)
    {
    	if (Auth::attempt(['username' => $r->username, 'password' => $r->password])) {
            return redirect(url('/app/beranda'));
        } else {
        	$r->session()->flash('gagal', 'Username atau Password salah');
        	return redirect(url('/app/login'));
        }
    }

    public function getLogout()
    {
    	Auth::logout();
    	return redirect('/app/login');
    }
}