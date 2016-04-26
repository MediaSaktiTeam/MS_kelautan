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
		return view('app.laporan-produksi.air-tawar.get-kabupaten', ['id' => $id]);
	}

	public function get_kecamatan($id){
		return view('app.laporan-produksi.air-tawar.get-kecamatan', ['id' => $id]);
	}

	public function get_desa($id){
		return view('app.laporan-produksi.air-tawar.get-desa', ['id' => $id]);
	}

	public function getTambah(Request $request)
	{
		$dt = new AirTawar;
		$dt->id = $request->id;
		$dt->provinsi = $request->provinsi;
		$dt->kabupaten = $request->kabupaten;
		$dt->kecamatan = $request->kecamatan;
		$dt->desa = $request->desa;
		$dt->rtp = $request->rtp;
		$dt->luas_areal = $request->luas_areal;
		$dt->luas_tanam = $request->luas_tanam;
		$dt->penebaran_mas = $request->penebaran_mas;
		$dt->penebaran_nila = $request->penebaran_nila;
		$dt->penebaran_lele = $request->penebaran_lele;
		$dt->penebaran_bawal = $request->penebaran_bawal;
		$dt->jumlah_hidup_mas = $request->jumlah_hidup_mas;
		$dt->jumlah_hidup_nila = $request->jumlah_hidup_nila;
		$dt->jumlah_hidup_lele = $request->jumlah_hidup_lele;
		$dt->jumlah_hidup_bawal = $request->jumlah_hidup_bawal;
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
		$dt->rtp = $request->rtp;
		$dt->luas_areal = $request->luas_areal;
		$dt->luas_tanam = $request->luas_tanam;
		$dt->penebaran_mas = $request->penebaran_mas;
		$dt->penebaran_nila = $request->penebaran_nila;
		$dt->penebaran_lele = $request->penebaran_lele;
		$dt->penebaran_bawal = $request->penebaran_bawal;
		$dt->jumlah_hidup_mas = $request->jumlah_hidup_mas;
		$dt->jumlah_hidup_nila = $request->jumlah_hidup_nila;
		$dt->jumlah_hidup_lele = $request->jumlah_hidup_lele;
		$dt->jumlah_hidup_bawal = $request->jumlah_hidup_bawal;
		$dt->save();
		$data['airtawar'] = AirTawar::paginate(1);

		return redirect()->route('airtawar', $data)->with(session()->flash('success','Data Berhasil diupdate !!'));
	}

}