<?php

namespace App\Http\Controllers\App;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB,Excel,PDF;
use App\User,App\MangroveJenis;

class MangroveJenisController extends Controller
{

	public function getIndex()
	{
		return view ('app.mangrove.jenis.index');
	}

public function getTambah(Request $request)
	{
		
		return redirect()->route('mangrovejenis')->with(session()->flash('success','Data Berhasil Tersimpan !!'));
	}
	
}