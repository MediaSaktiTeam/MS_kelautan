<?php

namespace App\Http\Controllers\App;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Sarana;

class SaranaPembudidayaController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function getIndex()
	{
		$data['sarana'] = Sarana::where('tipe', 'Pembudidaya')->paginate(10);
		return view('app.master.saranapembudidaya', $data);
	}

	public function getTambah(Request $request)
	{
		$data['sarana'] = Sarana::paginate(10);
		$dt = new Sarana;
		$dt->jenis = $request->jenis;
		$dt->sub = $request->sub;
		$dt->save();
		return redirect()->route('saranapembudidaya', $data);
	}

	public function getHapus($id){

		$val = explode(",", $id);

		foreach ($val as $value) {
			Sarana::where('id', $value)->delete();            
		}
		return redirect()->route('saranapembudidaya');
	}

	public function getUpdate(Request $request)
	{

		$data = Sarana::find($request->id);
		$data->jenis = $request->jenis;
		$data->sub = $request->sub;
		$data->save();
		$data['sarana'] = Sarana::paginate(1);

		return redirect()->route('saranapembudidaya', $data);
	}
}
