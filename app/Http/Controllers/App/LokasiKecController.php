<?php

namespace App\Http\Controllers\App;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB,Excel,PDF;
use App\User, App\Provinsi, App\Kecamatan;

class LokasiKecController extends Controller
{

	public function getIndex()
	{
		$data['kecamatan'] = Kecamatan::orderBy('id', 'asc')->get(); 
		return view ('app.master.lokasi.kec', $data);
	}
	public function getAdd()
	{
		return view ('app.master.lokasi.kec');
	}
	public function getDelete()
	{
		return view ('app.master.lokasi.kec');
	}
	public function getEdit()
	{
		return view ('app.master.lokasi.kec');
	}
	public function getUpdate(Request $r)
	{

		foreach( $r->id_kec as $key => $id_kec ) {
				
			$cek = Kecamatan::where('id', $r->kec[$key])->where('id', '<>', $id_kec)->count();
			if ( $cek > 0 ) {
				\Session::flash('gagal', 'Gagal!! Pastikan ID KECAMATAN tidak ada yang sama');
				return redirect()->back();
			} 
		}

		DB::transaction(function() use($r){
			$table = [
						'app_air_tawar', 'app_tambak', 'app_jumlah_penduduk', 'app_mangrove_jenis',
						'app_mangrove_milik', 'app_mangrove_rehabilitasi', 'app_pemasar', 'app_rumput_laut',
						'app_terumbu_jenis_ikan', 'app_terumbu_milik', 'app_terumbu_rehabilitasi'
					];

			foreach( $r->id_kec as $key => $id_kec ) {
				DB::table('kecamatan')->where('id', $id_kec)->update([ 'id' => $r->kec[$key] ]);
				DB::table('desa')->where('id_kecamatan', $id_kec)->update([ 'id_kecamatan' => $r->kec[$key] ]);
				foreach( $table as $val ) {
					DB::table($val)->where('kecamatan', $id_kec)->update([ 'kecamatan' => $r->kec[$key] ]);
				}
			}

		});
		\Session::flash('success', 'Berhasil mengubah data');
		return redirect()->back();
	}
	
}