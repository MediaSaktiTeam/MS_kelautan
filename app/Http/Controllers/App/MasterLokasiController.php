<?php

namespace App\Http\Controllers\App;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB,Excel,PDF;
use App\User,App\MasterLokasi;

class MasterLokasiController extends Controller
{

	public function getIndex()
	{
		return view ('app.master.lokasi');
	}

public function getTambah(Request $request)
	{
		
		return redirect()->route('lokasi')->with(session()->flash('success','Data Berhasil Tersimpan !!'));
	}
	
}