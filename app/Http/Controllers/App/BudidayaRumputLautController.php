<?php

namespace App\Http\Controllers\App;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB,Excel,PDF;
use App\User,App\KolamAirtawar,App\Laporan;
use App\Permissions;

class BudidayaKolamAirtawarController extends Controller
{

	public function getIndex(Request $r)
	{

		if ( !isset( $r->offset ) || !isset( $r->limit ) ) {

			$sql = KolamAirtawar::orderBy('id', 'desc')->first();

			if ( $sql ) {
			// Jika sudah ada pembudidaya

				// limit = Tanggal terbaru
				// offset = Limit - 3 bulan
				$limit1 = date_format(date_create($sql->created_at), "Y-m-d");
				$limit = strtotime("$limit1 +1 day");
				$limit = date("Y-m-d", $limit);

				$offset = strtotime("$limit1 -3 months");
				$offset = date("Y-m-d", $offset);

			} else {
			// Jika belum ada data pembudidaya offset = tgl skrang, limit = offset + 3 bulan
				$offset = date('Y-m-d');
				$limit = strtotime("$offset +3 months");
				$limit = date("Y-m-d", $limit);
			}

			 return redirect( '/app/KolamAirtawar?offset='.$offset.'&limit='.$limit );
		}
		$limit = 10;
		$data['kolamairtawar'] = KolamAirtawar::whereBetween('created_at', [ $r->offset, $r->limit ])
									->paginate($limit);

		return view ('app.laporan-produksi.air-tawar.index',$data)->with('limit', $limit);
	}

	public function getDetail($id)
	{
		$data['kolamairtawar'] = KolamAirtawar::where('id',$id)->first();

		return view('app.laporan-produksi.air-tawar.detail', $data);
	}

	public function getTambah(Request $request)
	{
		$dt = new KolamAirtawar;
		$dt->id = $request->id;
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
		$dt->keterangan = $request->keterangan;
		$dt->save();
		return redirect()->route('KolamAirtawar')->with(session()->flash('success','Data Berhasil Tersimpan !!'));
	}

	public function getHapus($id){

		$val = explode(",", $id);

		foreach ($val as $value) {
			KolamAirtawar::where('id', $value)->delete();           
		}
		return redirect()->route('KolamAirtawar')->with(session()->flash('success','Data Berhasil Terhapus !!'));
	}

	public function getEdit($id)
	{
		$data['KolamAirtawar'] = KolamAirtawar::find($id);
		return view('app.laporan-produksi.air-tawar.update', $data);
	}

	public function getUpdate(Request $request)
	{

		$dt = KolamAirtawar::find($request->id);
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
		$dt->keterangan = $request->keterangan;
		$dt->save();
		$data['KolamAirtawar'] = KolamAirtawar::paginate(1);

		return redirect()->route('KolamAirtawar', $data)->with(session()->flash('success','Data Berhasil diupdate !!'));
	}

	public function getCari($cari = NULL)
	{
		$data['KolamAirtawar'] = DB::table('app_kolam_air_tawar')
									->leftJoin('kecamatan', 'app_kolam_air_tawar.kecamatan', '=', 'kecamatan.id')
									->leftJoin('desa', 'app_kolam_air_tawar.desa', '=', 'desa.id')
										->select(
											'kecamatan.nama as nama_kecamatan',
											'app_kolam_air_tawar.*',
											'desa.nama as nama_desa')
												->where(function($query) use ($cari) {
													$query->where('kecamatan.nama','LIKE', '%'.$cari.'%')
															->orWhere('desa.nama','LIKE', '%'.$cari.'%');
												})
									->take(40)->get();
		return view('app.laporan-produksi.air-tawar.cari', $data);
	}

	public function getExportExcel(Request $r)
	{
		$data['KolamAirtawar'] = KolamAirtawar::whereBetween('created_at', [ $r->offset, $r->limit ])->get();

        Excel::create('Data KolamAirtawar');

        Excel::create('Data KolamAirtawar', function($excel) use($data)
        {
            
            $excel->sheet('New sheet', function($sheet) use($data)
            {
                $sheet->loadView('app.laporan-produksi.air-tawar.export-excel', $data);
            }); 
        })->download('xlsx');
	}

	public function getExportPdf(Request $r)
	{
		$data['KolamAirtawar'] = KolamAirtawar::whereBetween('created_at', [ $r->offset, $r->limit ])->get();
		$data['kasi'] = Laporan::where('jabatan','Kasi Budidaya Laut. Payau dan Air Tawar')->get();
		$data['petugas'] = Laporan::where('jabatan','Petugas Statistik')->get();
		$data['tgl_awal']		= $r->offset;
		$data['tgl_akhir']		= $r->limit;
        $pdf = PDF::loadView('app.laporan-produksi.air-tawar.export-pdf', $data);
        return $pdf->setPaper('legal')->setOrientation('landscape')->setWarnings(false)->download('Data KolamAirtawar.pdf');
	}

}