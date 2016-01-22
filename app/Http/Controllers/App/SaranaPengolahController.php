<?php

namespace App\Http\Controllers\App;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Sarana;

class SaranaPengolahController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function getIndex()
	{
		$data['saranapengolah'] = Sarana::where('tipe', 'Pengolah')->paginate(10);
		return view('app.master.saranapengolah', $data);
	}

	public function getTambah(Request $request)
	{
		$data['saranapengolah'] = Sarana::paginate(10);

		/* Validasi */

			$this->validate($request,[
					'sub' => 'required|unique:app_sarana',
					'jenis' => 'required',
				]);
		/* end validasi */
		
		$dt = new Sarana;
		$dt->jenis = $request->jenis;
		$dt->sub = $request->sub;
		$dt->tipe = 'Pengolah';
		$dt->save();
		return redirect()->route('saranapengolah', $data)->with(session()->flash('success','Data Berhasil Tersimpan !!'));
	}

	public function getHapus($id){

		$val = explode(",", $id);

		foreach ($val as $value) {
			Sarana::where('id', $value)->delete();            
		}
		return redirect()->route('saranapengolah')->with(session()->flash('delete','Data Berhasil Dihapus !!'));
	}

}
