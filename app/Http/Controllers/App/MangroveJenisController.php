<?php

namespace App\Http\Controllers\App;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB,Excel,PDF;
use App\User,App\MangroveJenis,App\Provinsi,App\Kabupaten,App\Kecamatan,App\Desa;

class MangroveJenisController extends Controller
{

	public function getIndex()
	{
		$data['mangrovejenis'] = MangroveJenis::paginate(10);
		return view ('app.mangrove.jenis.index',$data);
	}

	public function getAdd(Request $request)
			{
				$dt = new MangroveJenis;
				$dt->id = $request->id;
				$dt->kecamatan = $request->kecamatan;
				$dt->jenis_mangrove = $request->jenis_mangrove;
				$dt->save();
				return redirect()->route('mangrovejenis')->with(session()->flash('success','Data Berhasil Tersimpan !!'));
			}

	public function getDelete($id)
	{

		$val = explode(",", $id);

		foreach ($val as $value) {
			MangroveJenis::where('id', $value)->delete();           
		}
		return redirect()->route('mangrovejenis')->with(session()->flash('success','Data Berhasil Terhapus !!'));
	}

	public function getDetail($id)
	{
		$data['mangrovejenis'] = MangroveJenis::where('id',$id)->first();
		return view('app.mangrove.jenis.detail', $data);
	}
	
	public function getEdit($id)
	{
		$data['provinsi'] = Provinsi::all();
		$data['kabupaten'] = Kabupaten::all();
		$data['kecamatan'] = Kecamatan::all();
		$data['desa'] = Desa::all();
		$data['mangrovejenis'] = MangroveJenis::find($id);
		return view('app.mangrove.jenis.update', $data);
	}

	public function getUpdate(Request $request)
	{

		$dt = MangroveJenis::find($request->id);
		$dt->id = $request->id;
		$dt->kecamatan = $request->kecamatan;
		$dt->jenis_mangrove = $request->jenis_mangrove;
		$dt->save();
		$data['mangrovejenis'] = MangroveJenis::paginate(1);
		return redirect()->route('mangrovejenis', $data)->with(session()->flash('success','Data Berhasil diupdate !!'));
	}

	public function getSearch(Request $request)
	{
		$data['mangrovejenis'] = MangroveJenis::where('kecamatan  ', 'LIKE', '%'.$request->cari.'%')->get();
		return view('app.mangrove.jenis.search', $data);
	}
}