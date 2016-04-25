<?php

namespace App\Http\Controllers\App;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB,Excel,PDF;
use App\User,App\AirTawar,App\Provinsi,App\Kabupaten,App\Kecamatan,App\Desa;
use App\Permissions;

class AirTawarController extends Controller
{

	public function getIndex()
	{
		$data['airtawar'] = AirTawar::paginate(10);
		return view ('app.laporan-produksi.air-tawar.index',$data);
	}

	public function get_kabupaten($id){
		return view('app.pemasar.get-kabupaten', ['id' => $id]);
	}

	public function get_kecamatan($id){
		return view('app.pemasar.get-kecamatan', ['id' => $id]);
	}

	public function get_desa($id){
		return view('app.pemasar.get-desa', ['id' => $id]);
	}

	public function getTambah(Request $request)
	{
		$dt = new AirTawar;
		$dt->id = $request->id;
		$dt->provinsi = $request->provinsi;
		$dt->kabupaten = $request->kabupaten;
		$dt->kecamatan = $request->kecamatan;
		$dt->desa = $request->desa;
		$dt->luas_areal = $request->luas_areal;
		$dt->luas_tanam = $request->luas_tanam;
		$dt->save();
		return redirect()->route('airtawar')->with(session()->flash('success','Data Berhasil Tersimpan !!'));
	}

	public function getHapus($id){

		$val = explode(",", $id);

		foreach ($val as $value) {
			AirTawar::where('id', $value)->delete();           
		}
		return redirect()->route('airtawar')->with(session()->flash('success','Data Berhasil Terhapus !!'));
	}

	public function getEdit($id)
	{
		$data['provinsi'] = Provinsi::all();
		$data['kabupaten'] = Kabupaten::all();
		$data['kecamatan'] = Kecamatan::all();
		$data['airtawar'] = AirTawar::find($id);
		return view('app.laporan-produksi.air-tawar.update', $data);
	}

	public function getUpdate(Request $request)
	{

		$dt = new AirTawar;
		$dt->id = $request->id;
		$dt->provinsi = $request->provinsi;
		$dt->kabupaten = $request->kabupaten;
		$dt->kecamatan = $request->kecamatan;
		$dt->desa = $request->desa;
		$dt->luas_areal = $request->luas_areal;
		$dt->luas_tanam = $request->luas_tanam;
		$dt->save();
		$data['airtawar'] = AirTawar::paginate(1);

		return redirect()->route('airtawar', $data)->with(session()->flash('success','Data Berhasil diupdate !!'));
	}

}