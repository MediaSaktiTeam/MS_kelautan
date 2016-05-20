<?php

namespace App\Http\Controllers\App;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB,Excel,PDF;
use App\User,App\Tambak,App\Laporan,App\Provinsi,App\Kabupaten,App\Kecamatan,App\Desa;
use App\Permissions;

class TambakController extends Controller
{

	public function getIndex(Request $r)
	{
		if ( !isset( $r->offset ) || !isset( $r->limit ) ) {

			$sql = Tambak::orderBy('id', 'desc')->first();

			if ( $sql ) {
			// Jika sudah ada data

				// limit = Tanggal terbaru
				// offset = Limit - 3 bulan
				$limit1 = date_format(date_create($sql->created_at), "Y-m-d");
				$limit = strtotime("$limit1 +1 day");
				$limit = date("Y-m-d", $limit);

				$offset = strtotime("$limit1 -3 months");
				$offset = date("Y-m-d", $offset);

			} else {
			// Jika belum ada data offset = tgl skrang, limit = offset + 3 bulan
				$offset = date('Y-m-d');
				$limit = strtotime("$offset +3 months");
				$limit = date("Y-m-d", $limit);
			}

			 return redirect( '/app/tambak?offset='.$offset.'&limit='.$limit );
		}
		$limit = 10;
		$data['tambak'] = Tambak::whereBetween('created_at', [ $r->offset, $r->limit ])->paginate($limit);
		return view ('app.laporan-produksi.tambak.index',$data)->with('limit', $limit);
	}

	public function getDetail($id)
	{
		$data['tambak'] = Tambak::where('id',$id)->first();

		return view('app.laporan-produksi.tambak.detail', $data);
	}

	public function getTambah(Request $request)
	{
		$dt = new Tambak;
		$dt->id = $request->id;
		$dt->provinsi = $request->provinsi;
		$dt->kabupaten = $request->kabupaten;
		$dt->kecamatan = $request->kecamatan;
		$dt->desa = $request->desa;
		$dt->rtp = $request->rtp;
		$dt->panjang_pantai = $request->panjang_pantai;
		$dt->potensi = $request->potensi;
		$dt->luas_tanam = $request->luas_tanam;
		$dt->penebaran_windu = $request->penebaran_windu;
		$dt->penebaran_vanamae = $request->penebaran_vanamae;
		$dt->penebaran_bandeng = $request->penebaran_bandeng;
		$dt->jumlah_hidup_windu = $request->jumlah_hidup_windu;
		$dt->jumlah_hidup_vanamae = $request->jumlah_hidup_vanamae;
		$dt->jumlah_hidup_bandeng = $request->jumlah_hidup_bandeng;
		$dt->pakan_pelet = $request->pakan_pelet;
		$dt->pakan_dedak = $request->pakan_dedak;
		$dt->keterangan = $request->keterangan;
		$dt->save();
		return redirect()->route('tambak')->with(session()->flash('success','Data Berhasil Tersimpan !!'));
	}

	public function getHapus($id){

		$val = explode(",", $id);

		foreach ($val as $value) {
			Tambak::where('id', $value)->delete();           
		}
		return redirect()->route('tambak')->with(session()->flash('success','Data Berhasil Terhapus !!'));
	}

	public function getEdit($id)
	{
		$data['provinsi'] = Provinsi::all();
		$data['kabupaten'] = Kabupaten::all();
		$data['tambak'] = Tambak::find($id);
		return view('app.laporan-produksi.tambak.update', $data);
	}

	public function getUpdate(Request $request)
	{

		$dt = Tambak::find($request->id);
		$dt->id = $request->id;
		$dt->provinsi = $request->provinsi;
		$dt->kabupaten = $request->kabupaten;
		$dt->kecamatan = $request->kecamatan;
		$dt->desa = $request->desa;
		$dt->rtp = $request->rtp;
		$dt->panjang_pantai = $request->panjang_pantai;
		$dt->potensi = $request->potensi;
		$dt->luas_tanam = $request->luas_tanam;
		$dt->penebaran_windu = $request->penebaran_windu;
		$dt->penebaran_vanamae = $request->penebaran_vanamae;
		$dt->penebaran_bandeng = $request->penebaran_bandeng;
		$dt->jumlah_hidup_windu = $request->jumlah_hidup_windu;
		$dt->jumlah_hidup_vanamae = $request->jumlah_hidup_vanamae;
		$dt->jumlah_hidup_bandeng = $request->jumlah_hidup_bandeng;
		$dt->pakan_pelet = $request->pakan_pelet;
		$dt->pakan_dedak = $request->pakan_dedak;
		$dt->keterangan = $request->keterangan;
		$dt->save();
		$data['tambak'] = Tambak::paginate(1);

		return redirect()->route('tambak', $data)->with(session()->flash('success','Data Berhasil diupdate !!'));
	}

	public function getCari($cari = NULL)
	{
		$data['tambak'] = DB::table('app_tambak')
									->leftJoin('kecamatan', 'app_tambak.kecamatan', '=', 'kecamatan.id')
									->leftJoin('desa', 'app_tambak.desa', '=', 'desa.id')
										->select(
											'kecamatan.nama as nama_kecamatan',
											'app_tambak.*',
											'desa.nama as nama_desa')
												->where(function($query) use ($cari) {
													$query->where('kecamatan.nama','LIKE', '%'.$cari.'%')
															->orWhere('desa.nama','LIKE', '%'.$cari.'%');
												})
									->take(40)->get();
		return view('app.laporan-produksi.tambak.cari', $data);
	}

	public function getExportExcel(Request $r)
	{
		$data['tambak'] = Tambak::whereBetween('created_at', [ $r->offset, $r->limit ])->get();

        Excel::create('Data Tambak');

        Excel::create('Data Tambak', function($excel) use($data)
        {
            
            $excel->sheet('New sheet', function($sheet) use($data)
            {
                $sheet->loadView('app.laporan-produksi.tambak.export-excel', $data);
            }); 
        })->download('xlsx');
	}

	public function getExportPdf(Request $r)
	{
		$data['tambak'] = Tambak::whereBetween('created_at', [ $r->offset, $r->limit ])->get();
		$data['kasi'] = Laporan::where('jabatan','Kasi Budidaya Laut. Payau dan Air Tawar')->get();
		$data['petugas'] = Laporan::where('jabatan','Petugas Statistik')->get();
		$data['tgl_awal']		= $r->offset;
		$data['tgl_akhir']		= $r->limit;
        $pdf = PDF::loadView('app.laporan-produksi.tambak.export-pdf', $data);
        return $pdf->setPaper('legal')->setOrientation('landscape')->setWarnings(false)->download('Data Tambak.pdf');
	}

}