<?php

namespace App\Http\Controllers\Admin;

use Auth;
use Illuminate\Http\Request;
use App\User;
use Validator;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{

	public function __construct()
	{
		$this->middleware('guestApp', ['except' => 'logout']);
		$this->middleware('Validasi');
	}

	public function getLogin()
	{
		return view('admin.login.index');
	}

	public function logout()
	{
		Auth::logout();
		return redirect(url('/admin/login'));
	}
	public function postLogin(Request $request){

		if ( Auth::attempt( ['username' => $request->username, 'password' => $request->password], $request->remember ) ) {
			return redirect()->intended('/admin');
		} elseif ( Auth::attempt( ['email' => $request->username, 'password' => $request->password], $request->remember) ) {
			return redirect()->intended('/admin');
		} else {
			$request->session()->flash('gagal', 'User Name/Password Salah');
			return redirect(url('/admin/login'));
		}
	}
}