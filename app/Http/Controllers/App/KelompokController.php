<?php

namespace App\Http\Controllers\App;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User, App\Kelompok;

class KelompokController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function getIndex()
	{
		$data['kelompok'] = Kelompok::paginate(10);
		return view('app.kelompok.index', $data);
	}

	public function getDetail($id)
	{
		$data['kelompok'] = Kelompok::where('id_kelompok',$id)->first();

		return view('app.kelompok.detail', $data);
	}

	 public function getDetailAnggota($id)
	{
		$data['users'] = User::where('id_kelompok',$id)->get();

		return view('app.kelompok.detailanggota', $data);
	}

	public function getTambah(Request $request)
	{
		$dt = new Kelompok;
		$dt->id_kelompok = $request->id;
		$dt->nama = $request->nama;
		$dt->alamat = $request->alamat;
		$dt->no_rekening = $request->no_rekening;
		$dt->nama_rekening = $request->nama_rekening;
		$dt->nama_bank = $request->nama_bank;
		$dt->tipe = $request->tipe;
		$dt->save();
		return redirect()->route('kelompok');
	}

	public function getUpdate(Request $request)
	{
		$dt['id_kelompok']  = $request->id;
		$dt['nama']         = $request->nama;
		$dt['alamat']       = $request->alamat;
		$dt['no_rekening']  = $request->no_rekening;
		$dt['nama_rekening'] = $request->nama_rekening;
		$dt['nama_bank']     = $request->nama_bank;
		$dt['tipe']          = $request->tipe;

		Kelompok::where('id_kelompok', $request->id)
					->update($dt);

		return redirect()->route('kelompok');
	}

	public function getHapus($id){

		$val = explode(",", $id);

		foreach ($val as $value) {
			Kelompok::where('id_kelompok', $value)->delete();            
		}
		return redirect()->route('kelompok');
	}

}
