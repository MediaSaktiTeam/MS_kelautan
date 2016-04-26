<?php

namespace App\Http\Controllers\App;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB,Excel,PDF;
use App\User,App\RumputLaut,App\Provinsi,App\Kabupaten,App\Kecamatan,App\Desa;
use App\Permissions;

class RumputLautController extends Controller
{

	public function getIndex()
	{
		$limit = 10;
		$data['rumputlaut'] = RumputLaut::paginate($limit);
		return view ('app.laporan-produksi.rumputlaut.index',$data)->with('limit', $limit);
	}

	public function get_kabupaten($id){
		return view('app.laporan-produksi.rumputlaut.get-kabupaten', ['id' => $id]);
	}

	public function get_kecamatan($id){
		return view('app.laporan-produksi.rumputlaut.get-kecamatan', ['id' => $id]);
	}

	public function get_desa($id){
		return view('app.laporan-produksi.rumputlaut.get-desa', ['id' => $id]);
	}

	public function getDetail($id)
	{
		$data['rumputlaut'] = RumputLaut::where('id',$id)->first();

		return view('app.laporan-produksi.rumputlaut.detail', $data);
	}

	public function getTambah(Request $request)
	{
		$dt = new RumputLaut;
		$dt->id = $request->id;
		$dt->provinsi = $request->provinsi;
		$dt->kabupaten = $request->kabupaten;
		$dt->kecamatan = $request->kecamatan;
		$dt->desa = $request->desa;
		$dt->rtp = $request->rtp;
		$dt->panjang_pantai = $request->panjang_pantai;
		$dt->potensi = $request->potensi;
		$dt->luas_tanam = $request->luas_tanam;
		$dt->bentangan = $request->bentangan;
		$dt->bibit_cottoni = $request->bibit_cottoni;
		$dt->bibit_spinosum = $request->bibit_spinosum;
		$dt->cottoni_basah = $request->cottoni_basah;
		$dt->cottoni_kering = $request->cottoni_kering;
		$dt->spinosum_basah = $request->spinosum_basah;
		$dt->spinosum_kering = $request->spinosum_kering;
		$dt->save();
		return redirect()->route('rumputlaut')->with(session()->flash('success','Data Berhasil Tersimpan !!'));
	}

	public function getHapus($id){

		$val = explode(",", $id);

		foreach ($val as $value) {
			RumputLaut::where('id', $value)->delete();           
		}
		return redirect()->route('rumputlaut')->with(session()->flash('success','Data Berhasil Terhapus !!'));
	}

	public function getEdit($id)
	{
		$data['provinsi'] = Provinsi::all();
		$data['kabupaten'] = Kabupaten::all();
		$data['kecamatan'] = Kecamatan::all();
		$data['rumputlaut'] = RumputLaut::find($id);
		return view('app.laporan-produksi.rumputlaut.update', $data);
	}

	public function getUpdate(Request $request)
	{

		$dt = new RumputLaut;
		$dt->id = $request->id;
		$dt->provinsi = $request->provinsi;
		$dt->kabupaten = $request->kabupaten;
		$dt->kecamatan = $request->kecamatan;
		$dt->desa = $request->desa;
		$dt->rtp = $request->rtp;
		$dt->panjang_pantai = $request->panjang_pantai;
		$dt->potensi = $request->potensi;
		$dt->luas_tanam = $request->luas_tanam;
		$dt->bentangan = $request->bentangan;
		$dt->bibit_cottoni = $request->bibit_cottoni;
		$dt->bibit_spinosum = $request->bibit_spinosum;
		$dt->cottoni_basah = $request->cottoni_basah;
		$dt->cottoni_kering = $request->cottoni_kering;
		$dt->spinosum_basah = $request->spinosum_basah;
		$dt->spinosum_kering = $request->spinosum_kering;
		$dt->save();
		$data['rumputlaut'] = RumputLaut::paginate(1);

		return redirect()->route('rumputlaut', $data)->with(session()->flash('success','Data Berhasil diupdate !!'));
	}

}