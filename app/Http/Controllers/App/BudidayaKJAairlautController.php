<?php

namespace App\Http\Controllers\App;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB,Excel,PDF;
use App\User,App\KjaAirLaut,App\Laporan;
use App\Permissions;

class BudidayaKJAairlautController extends Controller
{

	public function getIndex(Request $r)
	{

		if ( !isset( $r->offset ) || !isset( $r->limit ) ) {

			$sql = KjaAirLaut::orderBy('id', 'desc')->first();

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

			 return redirect( '/app/kjaairlaut?offset='.$offset.'&limit='.$limit );
		}
		$limit = 10;
		$data['kjaairlaut'] = KjaAirLaut::whereBetween('created_at', [ $r->offset, $r->limit ])
									->paginate($limit);

		return view ('app.produksi-pembudidaya.budidaya-kjaairlaut.index',$data)->with('limit', $limit);
	}

	public function getDetail($id)
	{
		$data['kjaairlaut'] = KjaAirLaut::where('id',$id)->first();

		return view('app.produksi-pembudidaya.budidaya-kjaairlaut.detail', $data);
	}

	public function getAdd(Request $request)
	{
		$dt = new kjaairlaut;
		$dt->id = $request->id;
		$dt->lokasi = $request->lokasi;
		$dt->rtp = $request->rtp;
		$dt->potensi = $request->potensi;
		$dt->luas_tanam = $request->luas_tanam;
		$dt->bibit_kakap = $request->bibit_kakap;
		$dt->bibit_udang = $request->bibit_udang;
		$dt->bibit_lainnya = $request->bibit_lainnya;
		$dt->produksi_kakap = $request->produksi_kakap;
		$dt->produksi_udang = $request->produksi_udang;
		$dt->produksi_lainnya = $request->produksi_lainnya;
		$dt->keterangan = $request->keterangan;
		$dt->save();
		return redirect()->route('kjaairlaut')->with(session()->flash('success','Data Berhasil Tersimpan !!'));
	}

	public function getDelete($id){

		$val = explode(",", $id);

		foreach ($val as $value) {
			KjaAirLaut::where('id', $value)->delete();           
		}
		return redirect()->route('kjaairlaut')->with(session()->flash('success','Data Berhasil Terhapus !!'));
	}

	public function getEdit($id)
	{
		$data['kjaairlaut'] = KjaAirLaut::find($id);
		return view('app.produksi-pembudidaya.budidaya-kjaairlaut.update', $data);
	}

	public function getUpdate(Request $request)
	{

		$dt = KjaAirLaut::find($request->id);
		$dt->id = $request->id;
		$dt->lokasi = $request->lokasi;
		$dt->rtp = $request->rtp;
		$dt->potensi = $request->potensi;
		$dt->luas_tanam = $request->luas_tanam;
		$dt->bibit_kakap = $request->bibit_kakap;
		$dt->bibit_udang = $request->bibit_udang;
		$dt->bibit_lainnya = $request->bibit_lainnya;
		$dt->produksi_kakap = $request->produksi_kakap;
		$dt->produksi_udang = $request->produksi_udang;
		$dt->produksi_lainnya = $request->produksi_lainnya;
		$dt->keterangan = $request->keterangan;
		$dt->save();
		$data['kjaairlaut'] = KjaAirLaut::paginate(1);

		return redirect()->route('kjaairlaut', $data)->with(session()->flash('success','Data Berhasil diupdate !!'));
	}

	public function getCari(Request $r)
	{
		$data['kjaairlaut'] = KjaAirLaut::where('lokasi', 'LIKE', '%'.$r->cari.'%')->get();
		return view('app.produksi-pembudidaya.budidaya-kjaairlaut.cari', $data);
	}

	public function getExportExcel(Request $r)
	{
		$data['kjaairlaut'] = KjaAirLaut::whereBetween('created_at', [ $r->offset, $r->limit ])->get();

        Excel::create('Data kjaairlaut');

        Excel::create('Data kjaairlaut', function($excel) use($data)
        {
            
            $excel->sheet('New sheet', function($sheet) use($data)
            {
                $sheet->loadView('app.produksi-pembudidaya.budidaya-kjaairlaut.export-excel', $data);
            }); 
        })->download('xlsx');
	}

	public function getExportPdf(Request $r)
	{
		$data['kjaairlaut'] = KjaAirLaut::whereBetween('created_at', [ $r->offset, $r->limit ])->get();
		$data['tgl_awal']		= $r->offset;
		$data['tgl_akhir']		= $r->limit;
        $pdf = PDF::loadView('app.produksi-pembudidaya.budidaya-kjaairlaut.export-pdf', $data);
        return $pdf->setPaper('legal')->setOrientation('landscape')->setWarnings(false)->download('Data kjaairlaut.pdf');
	}

}