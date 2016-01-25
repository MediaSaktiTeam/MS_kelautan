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
					'sub' => 'required',
					'jenis' => 'required',
				]);

			$vb	=	Sarana::where('sub',$request->sub)->where('jenis',$request->jenis)->count();
			if ($vb > 0 ) {
				return redirect()->route('saranapengolah')->with(session()->flash('gagal','Data Sudah ada !!'));
			}

		/* end validasi */
		
		$dt = new Sarana;
		$dt->jenis = $request->jenis;
		$dt->sub = $request->sub;
		$dt->tipe = 'Pengolah';
		$dt->save();
		return redirect()->route('saranapengolah', $data)->with(session()->flash('success','Data Berhasil Tersimpan !!'));
	}

	public function getUpdate(Request $request)
	{

		$data = Sarana::find($request->id);
		$data->jenis = $request->jenis;
		$data->sub = $request->sub;
		$data->tipe = 'Pengolah';
		$data->save();
		$data['sarana'] = Sarana::paginate(1);

		return redirect()->route('saranapengolah', $data)->with(session()->flash('success','Data Berhasil diupdate !!'));
	}

	public function getHapus($id){

		$val = explode(",", $id);

		foreach ($val as $value) {
			Sarana::where('id', $value)->delete();            
		}
		return redirect()->route('saranapengolah')->with(session()->flash('delete','Data Berhasil Dihapus !!'));
	}



}
