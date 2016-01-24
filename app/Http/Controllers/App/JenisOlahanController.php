<?php

namespace App\Http\Controllers\App;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\JenisOlahan;

class JenisOlahanController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function getIndex()
	{
		$data['JenisOlahan'] = JenisOlahan::paginate(10);
		return view ('app.master.jenisolahan',$data);
	}

	public function getTambah(Request $request)
	{
		$data['JenisOlahan'] = JenisOlahan::paginate(10);
		
		/* Validasi */

			$this->validate($request,[
					'jenis' => 'required',
				]);
			$vb	=	JenisOlahan::where('jenis',$request->jenis)->count();
			if ($vb > 0 ) {
				return redirect()->route('jenisolahan')->with(session()->flash('gagal','Data Sudah ada !!'));
			}
		/* end validasi */

		$dt = new JenisOlahan;
		$dt->jenis = $request->jenis;
		$dt->save();
		return redirect()->route('jenisolahan', $data)->with(session()->flash('success','Data Berhasil Tersimpan !!'));
	}

	public function getHapus($id){

		$val = explode(",", $id);

		foreach ($val as $value) {
			JenisOlahan::where('id', $value)->delete();           
		}
		return redirect()->route('jenisolahan')->with(session()->flash('success','Data Berhasil Terhapus !!'));
	}

	public function getUpdate(Request $request)
	{

		$data = JenisOlahan::find($request->id);
		$data->jenis = $request->jenis;
		$data->save();
		$data['JenisOlahan'] = JenisOlahan::paginate(1);

		return redirect()->route('jenisolahan', $data)->with(session()->flash('success','Data Berhasil diupdate !!'));
	}
}
