<?php

namespace App\Http\Controllers\App;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB,Excel,PDF;
use App\User, App\Provinsi, App\Kabupaten, App\Desa;

class LokasiDesaController extends Controller
{

	public function getIndex()
	{
		$data['desa'] = Desa::orderBy('id_kecamatan', 'asc')->get();
		return view ('app.master.lokasi.desa', $data);
	}
	public function getAdd()
	{
		return view ('app.master.lokasi.desa');
	}
	public function getDelete()
	{
		return view ('app.master.lokasi.desa');
	}
	public function getEdit()
	{
		return view ('app.master.lokasi.desa');
	}
	public function getUpdate(Request $r)
	{
		foreach( $r->id_desa as $key => $id_desa ) {
				
			$cek = Desa::where('id', $r->desa[$key])->where('id', '<>', $id_desa)->count();
			if ( $cek > 0 ) {
				\Session::flash('gagal', 'Gagal!! Pastikan ID DESA tidak ada yang sama');
				return redirect()->back();
			} 
		}

		DB::transaction(function() use($r){
			$table = [
						'app_air_tawar', 'app_tambak','app_mangrove_milik', 'app_mangrove_rehabilitasi', 
						'app_pemasar', 'app_rumput_laut', 'app_terumbu_milik', 'app_terumbu_rehabilitasi'
					];
					
			foreach( $r->id_desa as $key => $id_desa ) {
				
				$save = DB::table('desa')->where('id', $id_desa)->update([ 'id' => $r->desa[$key] ]);
				
				foreach( $table as $val ) {
					DB::table($val)->where('desa', $id_desa)->update([ 'desa' => $r->desa[$key] ]);
				}
			}

		});

		\Session::flash('success', 'Berhasil mengubah data');
		return redirect()->back();
	}
	
}