<?php

namespace App\Http\Controllers\App;

use Auth;
use Illuminate\Http\Request;
use App\User;
use Validator;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{

	/**
	 * Create a new authentication controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('guestApp', ['except' => 'logout']);
	}

	public function getLogin()
	{
		return view('app.login.index');
	}

	public function logout()
	{
		Auth::logout();
		return redirect(url('/app/login'));
	}
	public function postLogin(Request $request){

		if ( Auth::attempt( ['username' => $request->username, 'password' => $request->password], $request->remember ) ) {
			return redirect()->intended('/app/beranda');
		} elseif ( Auth::attempt( ['email' => $request->username, 'password' => $request->password], $request->remember) ) {
			return redirect()->intended('/app/beranda');
		} else {
			$request->session()->flash('gagal', 'User Name/Password Salah');
			return redirect(url('/app/login'));
		}
	}
}