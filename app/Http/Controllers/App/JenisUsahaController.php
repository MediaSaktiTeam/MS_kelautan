<?php

namespace App\Http\Controllers\App;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\JenisUsaha;

class JenisUsahaController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function getIndex()
	{
		$data['usaha'] = JenisUsaha::paginate(10);
		return view ('app.master.jenis-usaha',$data);
	}

	public function getTambah(Request $request)
	{		
		/* Validasi */
			$this->validate($request,[
					'nama' => 'required',
				]);

			$vb	=	JenisUsaha::where('nama',$request->nama)->count();
			if ($vb > 0 ) {
				return redirect()->route('jenis_usaha')->with(session()->flash('gagal','Data Sudah ada !!'));
			}
		/* end validasi */

		$dt = new JenisUsaha;
		$dt->nama = $request->nama;
		$dt->save();
		return redirect()->route('jenis_usaha')->with(session()->flash('success','Data Berhasil Tersimpan !!'));
	}

	public function getHapus($id){

		$val = explode(",", $id);

		foreach ($val as $value) {
			JenisUsaha::where('id', $value)->delete();           
		}
		return redirect()->route('jenis_usaha')->with(session()->flash('success','Data Berhasil Terhapus !!'));
	}

	public function getUpdate(Request $request)
	{

		$data = JenisUsaha::find($request->id);
		$data->nama = $request->nama;
		$data->save();
		return redirect()->route('jenis_usaha')->with(session()->flash('success','Data Berhasil diupdate !!'));
	}
}
