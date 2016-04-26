<?php

namespace App\Http\Controllers\App;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB,Excel,PDF;
use App\User,App\Mangrove;

class MangroveController extends Controller
{

	public function getIndex()
	{
		return view ('app.mangrove.index');
	}

public function getTambah(Request $request)
	{
		
		return redirect()->route('mangrove')->with(session()->flash('success','Data Berhasil Tersimpan !!'));
	}
	
}