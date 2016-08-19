<?php

namespace App\Http\Controllers\App;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\JenisUsaha;

class MasterUsahaController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function getIndex()
	{
		$data['masterusaha'] = JenisUsaha::paginate(10);
		return view ('app.master.usaha',$data);
	}

	public function getTambah(Request $request)
	{
		$data['masterusaha'] = JenisUsaha::paginate(10);
		
		/* Validasi */

			$this->validate($request,[
					'nama' => 'required',
				]);

			$vb	=	JenisUsaha::where('nama',$request->nama)->count();
			if ($vb > 0 ) {
				return redirect()->back()->with(session()->flash('gagal','Data Sudah ada !!'));
			}
		/* end validasi */

		$dt = new JenisUsaha;
		$dt->nama = $request->nama;
		$dt->kelompok_bidang = $request->kelompok_bidang;
		$dt->save();
		return redirect()->route('usaha', $data)->with(session()->flash('success','Data Berhasil Tersimpan !!'));
	}

	public function getHapus($id){

		$val = explode(",", $id);

		foreach ($val as $value) {
			JenisUsaha::where('id', $value)->delete();           
		}
		return redirect()->route('usaha')->with(session()->flash('success','Data Berhasil Terhapus !!'));
	}

	public function getUpdate(Request $request)
	{

		$data = JenisUsaha::find($request->id);
		$data->nama = $request->nama;
		$data->kelompok_bidang = $request->kelompok_bidang;
		$data->save();
		$data['masterusaha'] = JenisUsaha::paginate(1);

		return redirect()->route('usaha', $data)->with(session()->flash('success','Data Berhasil diupdate !!'));
	}
}
