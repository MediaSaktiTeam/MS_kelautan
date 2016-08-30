<?php

namespace App\Http\Controllers\App;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Laporan, App\Penugasan;

class PenugasanController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function getIndex()
	{
		$data['penugasan'] = Penugasan::paginate(10);
		$data['laporan'] = Laporan::all();
		return view ('app.master.penugasan',$data);
	}

	public function getAdd(Request $request)
	{
		/* Validasi */

			$this->validate($request,[
					'halaman' => 'required|unique:app_laporan_penugasan',
					'kolom_kanan' => 'required',
					'kolom_kiri' => 'required',
				]);

		/* end validasi */

		$dt = new Penugasan;
		$dt->halaman = $request->halaman;
		$dt->kolom_kanan = $request->kolom_kanan;
		$dt->kolom_kiri = $request->kolom_kiri;
		$dt->save();
		return redirect()->back()->with(session()->flash('success','Data Berhasil Tersimpan !!'));
	}

	public function getDelete($id){

		$val = explode(",", $id);

		foreach ($val as $value) {
			Penugasan::where('id', $value)->delete();           
		}
		return redirect()->back()->with(session()->flash('success','Data Berhasil Terhapus !!'));
	}

	public function getUpdate(Request $request)
	{
		/* Validasi */

			$this->validate($request,[
					'halaman' => 'required',
					'kolom_kanan' => 'required',
					'kolom_kiri' => 'required',
				]);

		/* end validasi */

		$data = Penugasan::find($request->id);
		$data->halaman = $request->halaman;
		$data->kolom_kanan = $request->kolom_kanan;
		$data->kolom_kiri = $request->kolom_kiri;
		$data->save();

		return redirect()->back()->with(session()->flash('success','Data Berhasil diupdate !!'));
	}
}
