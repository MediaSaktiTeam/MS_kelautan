<?php

namespace App\Http\Controllers\App;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Jabatan;

class JabatanController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function getIndex()
	{
		$data['jabatan'] = Jabatan::paginate(10);
		return view ('app.master.jabatan',$data);
	}

	 public function getTambah(Request $request)
	{
		$data['jabatan'] = Jabatan::paginate(10);
		$dt = new Jabatan;
		$dt->nama = $request->nama;
		$dt->save();
		return redirect()->route('jabatan', $data);
	}

	public function getHapus($id)
	{
		$val = explode(",", $id);

		foreach ($val as $value) {
			Jabatan::where('id', $value)->delete();            
		}
		return redirect()->route('jabatan');
	}

	public function getUpdate(Request $request)
	{

		$data = Jabatan::find($request->id);
		$data->nama = $request->nama;
		$data->save();
		$data['jabatan'] = Jabatan::paginate(1);

		return redirect()->route('jabatan', $data);
	}

	
}
