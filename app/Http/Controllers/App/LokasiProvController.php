<?php

namespace App\Http\Controllers\App;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB,Excel,PDF;
use App\User,App\Provinsi, App\Kecamatan;

class LokasiProvController extends Controller
{

	public function getIndex()
	{
		return view ('app.master.lokasi.prov');
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