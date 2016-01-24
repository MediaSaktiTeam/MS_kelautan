<?php

namespace App\Http\Controllers\App;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB,Excel,PDF;
use App\User, App\Kelompok, App\Jabatan, App\Usaha, App\Sarana, App\KepemilikanSarana;
use App\RefBantuan;

class PengolahController extends Controller
{

	public function __construct()
	{
		$this->middleware('Pengolah');
	}

	public function getIndex()
	{
		$data['pengolah'] = User::where('profesi','Pengolah')->orderBy('id','desc')->get();
		$data['kelompok'] = Kelompok::where('tipe','Pengolah')->get();
		$data['jabatan'] = Jabatan::all();
		return view ('app.pengolah.index',$data);
	}

	public function postStore(Request $r)
	{

	}

	public function getEdit(Request $r, $id)
	{

	}

	public function postUpdate()
	{

	}

	public function getHapus($id)
	{

	}

}