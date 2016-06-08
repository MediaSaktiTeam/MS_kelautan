<?php

namespace App\Http\Controllers\App;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB,Excel,PDF;
use App\User,App\KjaAirTawar,App\Laporan;
use App\Permissions;

class BudidayaKJAairtawarController extends Controller
{

	public function getIndex(Request $r)
	{

		if ( !isset( $r->offset ) || !isset( $r->limit ) ) {

			$sql = KjaAirTawar::orderBy('id', 'desc')->first();

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

			 return redirect( '/app/kjaairtawar?offset='.$offset.'&limit='.$limit );
		}
		$limit = 10;
		$data['kjaairtawar'] = KjaAirTawar::whereBetween('created_at', [ $r->offset, $r->limit ])
									->paginate($limit);

		return view ('app.produksi-pembudidaya.budidaya-kjaairtawar.index',$data)->with('limit', $limit);
	}

	public function getDetail($id)
	{
		$data['kjaairtawar'] = KjaAirTawar::where('id',$id)->first();

		return view('app.produksi-pembudidaya.budidaya-kjaairtawar.detail', $data);
	}

	public function getTambah(Request $request)
	{
		$dt = new KjaAirTawar;
		$dt->id = $request->id;
		$dt->lokasi = $request->lokasi;
		$dt->rtp = $request->rtp;
		$dt->potensi = $request->potensi;
		$dt->luas_tanam = $request->luas_tanam;
		$dt->bibit_nila = $request->bibit_nila;
		$dt->bibit_lele = $request->bibit_lele;
		$dt->bibit_udang = $request->bibit_udang;
		$dt->bibit_lainnya = $request->bibit_lainnya;
		$dt->produksi_nila = $request->produksi_nila;
		$dt->produksi_lele = $request->produksi_lele;
		$dt->produksi_udang = $request->produksi_udang;
		$dt->produksi_lainnya = $request->produksi_lainnya;
		$dt->keterangan = $request->keterangan;
		$dt->save();
		return redirect()->route('kjaairtawar')->with(session()->flash('success','Data Berhasil Tersimpan !!'));
	}

	public function getHapus($id){

		$val = explode(",", $id);

		foreach ($val as $value) {
			KjaAirTawar::where('id', $value)->delete();           
		}
		return redirect()->route('kjaairtawar')->with(session()->flash('success','Data Berhasil Terhapus !!'));
	}

	public function getEdit($id)
	{
		$data['kjaairtawar'] = KjaAirTawar::find($id);
		return view('app.produksi-pembudidaya.budidaya-kjaairtawar.update', $data);
	}

	public function getUpdate(Request $request)
	{

		$dt = KjaAirTawar::find($request->id);
		$dt->id = $request->id;
		$dt->lokasi = $request->lokasi;
		$dt->rtp = $request->rtp;
		$dt->potensi = $request->potensi;
		$dt->luas_tanam = $request->luas_tanam;
		$dt->bibit_nila = $request->bibit_nila;
		$dt->bibit_lele = $request->bibit_lele;
		$dt->bibit_udang = $request->bibit_udang;
		$dt->bibit_lainnya = $request->bibit_lainnya;
		$dt->produksi_nila = $request->produksi_nila;
		$dt->produksi_lele = $request->produksi_lele;
		$dt->produksi_udang = $request->produksi_udang;
		$dt->produksi_lainnya = $request->produksi_lainnya;
		$dt->keterangan = $request->keterangan;
		$dt->save();
		$data['kjaairtawar'] = KjaAirTawar::paginate(1);

		return redirect()->route('kjaairtawar', $data)->with(session()->flash('success','Data Berhasil diupdate !!'));
	}

	public function getCari($cari = NULL)
	{
		$data['kjaairtawar'] = DB::table('app_kolam_air_tawar')
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
		return view('app.produksi-pembudidaya.budidaya-kjaairtawar.cari', $data);
	}

	public function getExportExcel(Request $r)
	{
		$data['kjaairtawar'] = KjaAirTawar::whereBetween('created_at', [ $r->offset, $r->limit ])->get();

        Excel::create('Data kjaairtawar');

        Excel::create('Data KjaAirTawar', function($excel) use($data)
        {
            
            $excel->sheet('New sheet', function($sheet) use($data)
            {
                $sheet->loadView('app.produksi-pembudidaya.budidaya-kjaairtawar.export-excel', $data);
            }); 
        })->download('xlsx');
	}

	public function getExportPdf(Request $r)
	{
		$data['kjaairtawar'] = KjaAirTawar::whereBetween('created_at', [ $r->offset, $r->limit ])->get();
		$data['tgl_awal']		= $r->offset;
		$data['tgl_akhir']		= $r->limit;
        $pdf = PDF::loadView('app.produksi-pembudidaya.budidaya-kjaairtawar.export-pdf', $data);
        return $pdf->setPaper('legal')->setOrientation('landscape')->setWarnings(false)->download('Data KjaAirTawar.pdf');
	}

}