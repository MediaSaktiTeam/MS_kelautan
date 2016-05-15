<?php

namespace App\Http\Controllers\App;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Laporan;

class LaporanController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function getIndex()
	{
		$data['laporan'] = Laporan::paginate(10);
		return view ('app.master.laporan',$data);
	}

	public function getAdd(Request $request)
	{
		$data['laporan'] = Laporan::paginate(10);
		
		/* Validasi */

			$this->validate($request,[
					'nama' => 'required|unique:app_laporan',
					'nip' => 'required',
					'jabatan' => 'required',
				]);

		/* end validasi */

		$dt = new Laporan;
		$dt->nama = $request->nama;
		$dt->nip = $request->nip;
		$dt->jabatan = $request->jabatan;
		$dt->save();
		return redirect()->route('laporan', $data)->with(session()->flash('success','Data Berhasil Tersimpan !!'));
	}

	public function getDelete($id){

		$val = explode(",", $id);

		foreach ($val as $value) {
			Laporan::where('id', $value)->delete();           
		}
		return redirect()->route('laporan')->with(session()->flash('success','Data Berhasil Terhapus !!'));
	}

	public function getUpdate(Request $request)
	{

		$data = Laporan::find($request->id);
		$data->jabatan = $request->jabatan;
		$data->nama = $request->nama;
		$data->nip = $request->nip;
		$data->save();
		$data['laporan'] = Laporan::paginate(1);

		return redirect()->route('laporan', $data)->with(session()->flash('success','Data Berhasil diupdate !!'));
	}
}
