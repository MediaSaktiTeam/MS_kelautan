<?php

namespace App\Http\Controllers\App;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB,Excel,PDF;
use App\User,App\Pemasar;
use App\Permissions;

class PemasarController extends Controller
{

	public function getIndex()
	{
		$data['pemasar'] = Pemasar::paginate(10);
		return view ('app.pemasar.index',$data);
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
		$dt = new Pemasar;
		$dt->id = $request->id;
		$dt->provinsi = $request->provinsi;
		$dt->kabupaten = $request->kabupaten;
		$dt->kecamatan = $request->kecamatan;
		$dt->desa = $request->desa;
		$dt->kode_kegiatan = $request->kode_kegiatan;
		$dt->nomor_direktori = $request->nomor_direktori;
		$dt->unit_pemasar = $request->unit_pemasar;
		$dt->pemilik_pemasar = $request->pemilik_pemasar;
		$dt->alamat_pemasar = $request->alamat_pemasar;
		$dt->alamat_erte = $request->alamat_erte;
		$dt->tipe = $request->tipe;
		$dt->tahun_mulai = $request->tahun_mulai;
		$dt->save();
		return redirect()->route('pemasar')->with(session()->flash('success','Data Berhasil Tersimpan !!'));
	}

}