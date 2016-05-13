<?php

namespace App\Http\Controllers\App;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB,Excel,PDF;
use App\User, App\Kelompok, App\Jabatan, App\Usaha, App\Sarana, App\KepemilikanSarana;
use App\Bantuan, App\RefBantuan, App\JenisOlahan, App\Produksi, App\Kecamatan, App\Desa;
use App\AirTawar, App\RumputLaut, App\Tambak, App\MangroveMilik, App\MangroveRehabilitasi;
use App\TerumbuMilik, App\TerumbuRehabilitasi;

class StatistikController extends Controller
{

	public function getIndex(Request $r)
	{

		if ( !$r->tahun || !$r->offset ) {
			// Default value of date filter on produksi
				$sql = Produksi::orderBy('id', 'desc')->first();

				if ( $sql ) {

					$limit1 = date_format(date_create($sql->created_at), "Y-m-d");
					$limit = strtotime("$limit1 +1 day");
					$limit = date("Y-m-d", $limit);

					$offset = strtotime("$limit1 -3 months");
					$offset = date("Y-m-d", $offset);

				} else {
					$offset = date('Y-m-d');
					$limit = strtotime("$offset +3 months");
					$limit = date("Y-m-d", $limit);
				}

			return redirect()->route('app.statistik', ['tahun' => date('Y'), 'offset' => $offset, 'limit' => $limit]);
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

	// Statistik Jenis Produksi
		$data['jp_pembudidaya'] = DB::table('users as u')
									->leftJoin('produksi as pr', 'u.id', '=', 'pr.id_user')
									->select('pr.jenis_produksi', DB::raw('(select count(*) from produksi where jenis_produksi = pr.jenis_produksi) as jml'))
									->where('u.profesi', 'Pembudidaya')
									->whereBetween('pr.created_at', [ $r->offset, $r->limit ])
									->groupBy('pr.jenis_produksi')->get();

		$data['jp_nelayan'] = DB::table('users as u')
									->leftJoin('produksi as pr', 'u.id', '=', 'pr.id_user')
									->select('pr.jenis_produksi', DB::raw('(select count(*) from produksi where jenis_produksi = pr.jenis_produksi) as jml'))
									->where('u.profesi', 'Nelayan')
									->whereBetween('pr.created_at', [ $r->offset, $r->limit ])
									->groupBy('pr.jenis_produksi')->get();

		$data['jp_pengolah'] = DB::table('users as u')
									->leftJoin('produksi as pr', 'u.id', '=', 'pr.id_user')
									->select('pr.jenis_produksi', DB::raw('(select count(*) from produksi where jenis_produksi = pr.jenis_produksi) as jml'))
									->where('u.profesi', 'Pengolah')
									->whereBetween('pr.created_at', [ $r->offset, $r->limit ])
									->groupBy('pr.jenis_produksi')->get();

		$kec = Kecamatan::orderBy('id', 'asc')->first();
		$data['id_kec'] = $kec->id;
		$data['kecamatan'] = Kecamatan::orderBy('nama', 'asc')->get();

		return view ('app.statistik.index',$data);
	}

	public function getListDesa(Request $r)
	{
		$data['desa'] = Desa::where('id_kecamatan', $r->id)->orderBy('nama','asc')->get();

		return view('app.statistik.list-desa', $data);
	}

	public function getDetailDesa($id)
	{
		$data['desa'] = Desa::find($id);
		$data['airtawar'] = AirTawar::where('desa', $id)->get();
		$data['rumputlaut'] = RumputLaut::where('desa', $id)->get();
		$data['tambak'] = Tambak::where('desa', $id)->get();
		$data['mangrovemilik'] = MangroveMilik::where('desa', $id)->get();
		$data['mangroverehabilitasi'] = MangroveRehabilitasi::where('desa', $id)->get();
		$data['terumbumilik'] = TerumbuMilik::where('desa', $id)->get();
		$data['terumburehabilitasi'] = TerumbuRehabilitasi::where('desa', $id)->get();
		return view('app.statistik.detail-desa', $data);
	}

}