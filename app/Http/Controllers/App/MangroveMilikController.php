<?php

namespace App\Http\Controllers\App;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB,Excel,PDF;
use App\User,App\MangroveMilik,App\Provinsi,App\Kabupaten,App\Kecamatan,App\Desa;;

class MangroveMilikController extends Controller
{

	public function getIndex()
	{
		$data['mangrovemilik'] = MangroveMilik::paginate(10);
		return view ('app.mangrove.milik.index',$data);
	}

public function getAdd(Request $request)
	{
		$dt = new MangroveMilik;
		$dt->id = $request->id;
		$dt->kecamatan = $request->kecamatan;
		$dt->desa = $request->desa;
		$dt->luas_lahan = $request->luas_lahan;
		$dt->kondisi_rusak = $request->kondisi_rusak;
		$dt->kondisi_sedang = $request->kondisi_sedang;
		$dt->kondisi_baik = $request->kondisi_baik;
		$dt->save();
		return redirect()->route('mangrovemilik')->with(session()->flash('success','Data Berhasil Tersimpan !!'));
	}

	public function getDelete($id){

		$val = explode(",", $id);

		foreach ($val as $value) {
			MangroveMilik::where('id', $value)->delete();           
		}
		return redirect()->route('mangrovemilik')->with(session()->flash('success','Data Berhasil Terhapus !!'));
	}
	
}