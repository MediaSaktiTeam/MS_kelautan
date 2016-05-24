<?php

namespace App\Http\Controllers\App;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class LokasiController extends Controller
{
	public function get_kabupaten($id){
		return view('app.lokasi.get-kabupaten', ['id' => $id]);
	}

	public function get_kecamatan($id){
		return view('app.lokasi.get-kecamatan', ['id' => $id]);
	}

	public function get_desa($id){
		return view('app.lokasi.get-desa', ['id' => $id]);
	}

}