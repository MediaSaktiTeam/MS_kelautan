<?php

namespace App\Http\Controllers\App;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB,Excel,PDF;
use App\User ;
use App\Permissions;

class PemasarController extends Controller
{

	public function getIndex()
	{
		$limit = 10;
		return view ('app.pemasar.index');
	}


}