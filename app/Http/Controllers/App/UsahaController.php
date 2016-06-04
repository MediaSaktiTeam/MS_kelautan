<?php

namespace App\Http\Controllers\App;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Usaha;

class UsahaController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function getIndex()
	{
		$data['usaha'] = Usaha::paginate(10);
		return view ('app.master.usaha',$data);
	}

	public function getTambah(Request $request)
	{
		$data['usaha'] = Usaha::paginate(10);
		
		/* Validasi */

			$this->validate($request,[
					'nama' => 'required',
					'jenis' => 'required',
				]);

			$vb	=	Usaha::where('nama',$request->nama)->where('jenis_usaha',$request->jenis)->count();
			if ($vb > 0 ) {
				return redirect()->route('usaha')->with(session()->flash('gagal','Data Sudah ada !!'));
			}
		/* end validasi */

		$dt = new Usaha;
		$dt->nama = $request->nama;
		$dt->jenis_usaha = $request->jenis;
		$dt->save();
		return redirect()->route('usaha', $data)->with(session()->flash('success','Data Berhasil Tersimpan !!'));
	}

	public function getHapus($id){

		$val = explode(",", $id);

		foreach ($val as $value) {
			Usaha::where('id', $value)->delete();           
		}
		return redirect()->route('usaha')->with(session()->flash('success','Data Berhasil Terhapus !!'));
	}

	public function getUpdate(Request $request)
	{

		$data = Usaha::find($request->id);
		$data->jenis_usaha = $request->jenis;
		$data->nama = $request->nama;
		$data->save();
		$data['usaha'] = Usaha::paginate(1);

		return redirect()->route('usaha', $data)->with(session()->flash('success','Data Berhasil diupdate !!'));
	}
}
