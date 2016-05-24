<?php

namespace App\Http\Controllers\App;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use App\User, App\Provinsi, App\Kabupaten;

class LokasiProvController extends Controller
{

	public function getIndex()
	{
		$data['prov'] = Provinsi::first();
		$data['kab'] = Kabupaten::first();
		return view ('app.master.lokasi.prov', $data);
	}
	public function getAdd()
	{
		return view ('app.master.lokasi.prov');
	}
	public function getDelete()
	{
		return view ('app.master.lokasi.prov');
	}
	public function getEdit()
	{
		return view ('app.master.lokasi.prov');
	}
	public function getUpdate(Request $r)
	{
		DB::transaction(function() use($r) {

			$table = [
						'app_air_tawar', 'app_tambak', 'app_pemasar', 'app_rumput_laut'
					];

			// Update provinsi
			DB::table('provinsi')->where('id', $r->id_prov)->update(['id' => $r->prov]);
			DB::table('kabupaten')->where('id_prov', $r->id_prov)->update(['id_prov' => $r->prov]);

			// Update Kabupaten
			DB::table('kabupaten')->where('id', $r->id_kab)->update(['id' => $r->kab]);
			DB::table('kecamatan')->where('id_kabupaten', $r->id_kab)->update(['id_kabupaten' => $r->kab]);
			
			foreach( $table as $val ) {
				DB::table($val)->where('kabupaten', $r->id_kab)->update([ 'kabupaten' => $r->kab ]);
				DB::table($val)->where('provinsi', $r->id_prov)->update([ 'provinsi' => $r->prov ]);
			}

		});
		\Session::flash('success', 'Berhasil mengubah data');
		return redirect()->back();
	}
	
}