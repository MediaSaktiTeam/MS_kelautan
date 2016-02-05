<?php

namespace App\Http\Controllers\App;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB,Excel,PDF;
use App\User, App\Kelompok, App\Jabatan, App\Usaha, App\Sarana, App\KepemilikanSarana;
use App\Bantuan, App\RefBantuan, App\JenisOlahan;

class StatistikController extends Controller
{

	public function getIndex(Request $r)
	{

		if ( !$r->tahun ) {
			return redirect()->route('app.statistik', ['tahun' => date('Y')]);
		}

		// Statistik Jenis Usaha
		$data['pembudidaya_air_tawar'] = DB::table('app_usaha as au')
												->join('users as u', 'u.id_usaha', '=', 'au.id')
												->where('au.jenis', 'Budidaya Air Tawar')
												->where(DB::raw('left(u.created_at, 4)'), '<=', $r->tahun)
												->count();

		$data['pembudidaya_air_laut'] = DB::table('app_usaha as au')
												->join('users as u', 'u.id_usaha', '=', 'au.id')
												->where('au.jenis', 'Budidaya Air Laut')
												->where(DB::raw('left(u.created_at, 4)'), '<=', $r->tahun)
												->count();

		$data['pembudidaya_air_payau'] = DB::table('app_usaha as au')
												->join('users as u', 'u.id_usaha', '=', 'au.id')
												->where('au.jenis', 'Budidaya Air Payau')
												->where(DB::raw('left(u.created_at, 4)'), '<=', $r->tahun)
												->count();

		// Statistik Bantuan
		$data['bantuan_master_pembudidaya'] = Bantuan::where('jenis','Pembudidaya')->get();

		// Statistik Nelayan
		$data['jml_perahu'] = DB::table('users as u')
										->join('app_kepemilikan_sarana as aks', 'aks.id_user', '=', 'u.id')
										->join('app_sarana as as', 'as.id', '=', 'aks.id_sarana')
											->where('as.jenis', 'Perahu Kapal')->count();

		$data['jml_mesin'] = DB::table('users as u')
										->join('app_kepemilikan_sarana as aks', 'aks.id_user', '=', 'u.id')
										->join('app_sarana as as', 'as.id', '=', 'aks.id_sarana')
											->where('as.jenis', 'Mesin')->count();

		$data['jml_alat_tangkap'] = DB::table('users as u')
										->join('app_kepemilikan_sarana as aks', 'aks.id_user', '=', 'u.id')
										->join('app_sarana as as', 'as.id', '=', 'aks.id_sarana')
											->where('as.jenis', 'Alat Tangkap')->count();

		// Statistik Pengolah
		$data['total_pengolah'] = User::where('profesi','Pengolah')->count();
		$data['jenis_olahan'] = JenisOlahan::all();

		return view ('app.statistik.index',$data);
	}

}