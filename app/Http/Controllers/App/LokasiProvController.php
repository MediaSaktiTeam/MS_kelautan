<?php

namespace App\Http\Controllers\App;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB,Excel,PDF;
use App\User, App\Kecamatan;

class LokasiController extends Controller
{

	public function getIndex()
	{
		$data['kecamatan'] = Kecamatan::paginate(10);
		return view ('app.master.lokasi.kec',$data);
	}
	public function getAdd()
	{
		return view ('app.master.lokasi.kec');
	}
	public function getDelete()
	{
		return view ('app.master.lokasi.kec');
	}
	public function getEdit()
	{
		return view ('app.master.lokasi.kec');
	}
	public function getUpdate()
	{
		return view ('app.master.lokasi.kec');
	}
	
}