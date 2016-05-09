<?php

namespace App\Http\Controllers\App;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB,Excel,PDF;
use App\User,App\TerumbuRehabilitasi,App\Provinsi,App\Kabupaten,App\Kecamatan,App\Desa;

class TerumbuRehabilitasiController extends Controller
{

	public function getIndex(Request $r)
	{
		$limit = 10;
		$data['terumburehabilitasi'] = TerumbuRehabilitasi::paginate(10);
		return view ('app.terumbu.rehabilitasi.index',$data)->with('limit', $limit);
	}

	public function getAdd(Request $request)
		{
			$dt = new TerumbuRehabilitasi;
			$dt->id = $request->id;
			$dt->kecamatan = $request->kecamatan;
			$dt->desa = $request->desa;
			$dt->direhabilitasi = $request->direhabilitasi;
			$dt->save();
			return redirect()->route('terumburehabilitasi')->with(session()->flash('success','Data Berhasil Tersimpan !!'));
		}

	public function getDelete($id)
	{

		$val = explode(",", $id);

		foreach ($val as $value) {
			TerumbuRehabilitasi::where('id', $value)->delete();           
		}
		return redirect()->route('terumburehabilitasi')->with(session()->flash('success','Data Berhasil Terhapus !!'));
	}

	public function getDetail($id)
	{
		$data['terumburehabilitasi'] = TerumbuRehabilitasi::where('id',$id)->first();
		return view('app.terumbu.rehabilitasi.detail', $data);
	}

	public function getEdit($id)
	{
		$data['provinsi'] = Provinsi::all();
		$data['kabupaten'] = Kabupaten::all();
		$data['kecamatan'] = Kecamatan::all();
		$data['desa'] = Desa::all();
		$data['terumburehabilitasi'] = TerumbuRehabilitasi::find($id);
		return view('app.terumbu.rehabilitasi.update', $data);
	}


public function getUpdate(Request $request)
	{

		$dt = TerumbuRehabilitasi::find($request->id);
		$dt->id = $request->id;
		$dt->kecamatan = $request->kecamatan;
		$dt->desa = $request->desa;
		$dt->direhabilitasi = $request->direhabilitasi;
		$dt->save();
		$data['terumburehabilitasi'] = TerumbuRehabilitasi::paginate(1);
		return redirect()->route('terumburehabilitasi', $data)->with(session()->flash('success','Data Berhasil diupdate !!'));
	}

	public function getSearch(Request $request)
	{
		$data['terumburehabilitasi'] = TerumbuRehabilitasi::where('kecamatan  ', 'LIKE', '%'.$request->cari.'%')->get();
		return view('app.terumbu.rehabilitasi.search', $data);
	}
	
}