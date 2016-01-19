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

		/* Validasi */

			$this->validate($request,[
					'sub' => 'required|unique:app_sarana',
					'jenis' => 'required',
				]);
		/* end validasi */
		
		$dt = new Sarana;
		$dt->jenis = $request->jenis;
		$dt->sub = $request->sub;
		$dt->tipe = 'Nelayan';
		$dt->save();
		return redirect()->route('sarananelayan', $data)->with(session()->flash('success','Data Berhasil Tersimpan !!'));
	}

	public function getHapus($id){

		$val = explode(",", $id);

		foreach ($val as $value) {
			Sarana::where('id', $value)->delete();            
		}
		return redirect()->route('sarananelayan')->with(session()->flash('delete','Data Berhasil Dihapus !!'));
	}

	public function getUpdate(Request $request)
	{

		$data = Sarana::find($request->id);
		$data->jenis = $request->jenis;
		$data->sub = $request->sub;
		$data->save();
		$data['sarana'] = Sarana::paginate(1);

		return redirect()->route('sarananelayan', $data)->with(session()->flash('success','Data Berhasil diupdate !!'));
	}
}
