<?php

namespace App\Http\Controllers\App;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Sarana;

class SaranaNelayanController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function getIndex()
	{
		$data['sarana'] = Sarana::where('tipe', 'Nelayan')->paginate(10);
		return view('app.master.sarananelayan', $data);
	}

	public function getTambah(Request $request)
	{
		$data['sarana'] = Sarana::paginate(10);
		$dt = new Sarana;
		$dt->jenis = $request->jenis;
		$dt->sub = $request->sub;
		$dt->tipe = 'Nelayan';
		$dt->save();
		return redirect()->route('sarananelayan', $data);
	}

	public function getHapus($id){

		$val = explode(",", $id);

		foreach ($val as $value) {
			Sarana::where('id', $value)->delete();            
		}
		return redirect()->route('sarananelayan');
	}
}
