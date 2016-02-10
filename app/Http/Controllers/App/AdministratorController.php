<?php

namespace App\Http\Controllers\App;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Administrator;
use DB;

class AdministratorController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */

	 public function getIndex()
	{
		$limit = 10;
		$data['bantuan'] = Administrator::paginate($limit);
		return view('app.administrator.index', $data)->with('limit', $limit);
	}

	public function getTambah(Request $request)
	{

		/* Validasi */

			
	}

	public function getHapus($id){

	}

	public function getUpdate(Request $request)
	{

	}

}