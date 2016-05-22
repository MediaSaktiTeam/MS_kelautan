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
		return view ('app.master.lokasi.prov',$data);
	}
	public function getAdd()
	{
		return view ('app.master.lokasi.prov');
	}
	public function getDelete()
	{
		return view ('app.master.lokasi.prov');
	}
	public function getEdit()
	{
		return view ('app.master.lokasi.prov');
	}
	public function getUpdate()
	{
		return view ('app.master.lokasi.prov');
	}
	
}