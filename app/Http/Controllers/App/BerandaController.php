<?php

namespace App\Http\Controllers\app;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Custom, App\User;

class BerandaController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		$data['total_pembudidaya'] = User::where('profesi','Pembudidaya')->count();
		$data['total_nelayan'] = User::where('profesi','Nelayan')->count();
		$data['total_pengolah'] = User::where('profesi','Pengolah')->count();
		
		return view('app.beranda.index', $data);
	}

}
