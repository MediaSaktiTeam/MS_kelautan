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

	
}