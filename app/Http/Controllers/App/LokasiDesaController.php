<?php

namespace App\Http\Controllers\App;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB,Excel,PDF;
use App\User, App\Provinsi, App\Kabupaten, App\Desa;

class LokasiDesaController extends Controller
{

	public function getIndex()
	{
		return view ('app.master.lokasi.desa');
	}
	public function getAdd()
	{
		return view ('app.master.lokasi.desa');
	}
	public function getDelete()
	{
		return view ('app.master.lokasi.desa');
	}
	public function getEdit()
	{
		return view ('app.master.lokasi.desa');
	}
	public function getUpdate()
	{
		return view ('app.master.lokasi.desa');
	}
	
}