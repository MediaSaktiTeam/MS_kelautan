<?php

namespace App\Http\Controllers\App;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB,Excel,PDF;
use App\User,App\MangroveRehabilitasi,App\Provinsi,App\Kabupaten,App\Kecamatan,App\Desa;

class MangroveRehabilitasiController extends Controller
{

	public function getIndex(Request $r)
	{
	
		$data['mangroverehabilitasi'] = MangroveRehabilitasi::paginate(10);
		return view ('app.mangrove.rehabilitasi.index',$data);
	}

	public function getAdd(Request $request)
		{
			$dt = new MangroveRehabilitasi;
			$dt->id = $request->id;
			$dt->kecamatan = $request->kecamatan;
			$dt->desa = $request->desa;
			$dt->direhabilitasi = $request->direhabilitasi;
			$dt->berubah_fungsi = $request->berubah_fungsi;
			$dt->lahan_tambak = $request->lahan_tambak;
			$dt->penggaraman = $request->penggaraman;
			$dt->save();
			return redirect()->route('mangroverehabilitasi')->with(session()->flash('success','Data Berhasil Tersimpan !!'));
		}
	
	public function getDelete($id)
	{
		$val = explode(",", $id);
		foreach ($val as $value){
			MangroveRehabilitasi::where('id', $value)->delete();
		}
		return redirect()->route('mangroverehabilitasi')->with(session()->flash('success', 'Data Berhasil dihapus !'));
	}

	public function getDetail($id)
	{
		$data['mangroverehabilitasi'] = MangroveRehabilitasi::where('id',$id)->first();
		return view('app.mangrove.rehabilitasi.detail', $data);
	}

	public function getEdit($id)
	{
		$data['provinsi'] = Provinsi::all();
		$data['kabupaten'] = Kabupaten::all();
		$data['desa'] = Desa::all();
		$data['mangroverehabilitasi'] = MangroveRehabilitasi::find($id);
		return view('app.mangrove.rehabilitasi.update', $data);
	}

	public function getUpdate(Request $request)
	{

		$dt = MangroveRehabilitasi::find($request->id);
		$dt->id = $request->id;
		$dt->kecamatan = $request->kecamatan;
		$dt->desa = $request->desa;
		$dt->direhabilitasi = $request->direhabilitasi;
		$dt->berubah_fungsi = $request->berubah_fungsi;
		$dt->lahan_tambak = $request->lahan_tambak;
		$dt->penggaraman = $request->penggaraman;
		$dt->save();
		$data['mangroverehabilitasi'] = MangroveRehabilitasi::paginate(1);
		return redirect()->route('mangroverehabilitasi', $data)->with(session()->flash('success','Data Berhasil diupdate !!'));
	}

	public function getSearch(Request $request)
	{
		$data['mangroverehabilitasi'] = MangroveRehabilitasi::where('kecamatan  ', 'LIKE', '%'.$request->cari.'%')->get();
		return view('app.mangrove.rehabilitasi.search', $data);
	}

}