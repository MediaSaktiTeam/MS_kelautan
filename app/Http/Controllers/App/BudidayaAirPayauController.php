<?php

namespace App\Http\Controllers\App;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB,Excel,PDF;
use App\User,App\BudidayaAirPayau,App\Laporan;
use App\Permissions;

class BudidayaAirPayauController extends Controller
{

	public function getIndex(Request $r)
	{

		if ( !isset( $r->offset ) || !isset( $r->limit ) ) {

			$sql = BudidayaAirPayau::orderBy('id', 'desc')->first();

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

			 return redirect( '/app/budidayaairpayau?offset='.$offset.'&limit='.$limit );
		}
		$limit = 10;
		$data['budidayaairpayau'] = BudidayaAirPayau::whereBetween('created_at', [ $r->offset, $r->limit ])
									->paginate($limit);

		return view ('app.produksi-pembudidaya.budidaya-airpayau.index',$data)->with('limit', $limit);
	}

	public function getDetail($id)
	{
		$data['budidayaairpayau'] = BudidayaAirPayau::where('id',$id)->first();

		return view('app.produksi-pembudidaya.budidaya-airpayau.detail', $data);
	}

	public function getAdd(Request $request)
	{
		$dt = new BudidayaAirPayau;
		$dt->id = $request->id;
		$dt->lokasi = $request->lokasi;
		$dt->rtp = $request->rtp;
		$dt->potensi = $request->potensi;
		$dt->luas_tanam = $request->luas_tanam;
		$dt->bibit_bandeng = $request->bibit_bandeng;
		$dt->bibit_windu = $request->bibit_windu;
		$dt->bibit_vannamae = $request->bibit_vannamae;
		$dt->bibit_lainnya = $request->bibit_lainnya;
		$dt->produksi_bandeng = $request->produksi_bandeng;
		$dt->produksi_windu = $request->produksi_windu;
		$dt->produksi_vannamae = $request->produksi_vannamae;
		$dt->produksi_lainnya = $request->produksi_lainnya;
		$dt->keterangan = $request->keterangan;
		$dt->save();
		return redirect()->route('budidayaairpayau')->with(session()->flash('success','Data Berhasil Tersimpan !!'));
	}

	public function getDelete($id){

		$val = explode(",", $id);

		foreach ($val as $value) {
			BudidayaAirPayau::where('id', $value)->delete();           
		}
		return redirect()->route('budidayaairpayau')->with(session()->flash('success','Data Berhasil Terhapus !!'));
	}

	public function getEdit($id)
	{
		$data['budidayaairpayau'] = BudidayaAirPayau::find($id);
		return view('app.produksi-pembudidaya.budidaya-airpayau.update', $data);
	}

	public function getUpdate(Request $request)
	{

		$dt = BudidayaAirPayau::find($request->id);
		$dt->id = $request->id;
		$dt->lokasi = $request->lokasi;
		$dt->rtp = $request->rtp;
		$dt->potensi = $request->potensi;
		$dt->luas_tanam = $request->luas_tanam;
		$dt->bibit_bandeng = $request->bibit_bandeng;
		$dt->bibit_windu = $request->bibit_windu;
		$dt->bibit_vannamae = $request->bibit_vannamae;
		$dt->bibit_lainnya = $request->bibit_lainnya;
		$dt->produksi_bandeng = $request->produksi_bandeng;
		$dt->produksi_windu = $request->produksi_windu;
		$dt->produksi_vannamae = $request->produksi_vannamae;
		$dt->produksi_lainnya = $request->produksi_lainnya;
		$dt->keterangan = $request->keterangan;
		$dt->save();
		$data['budidayaairpayau'] = BudidayaAirPayau::paginate(1);

		return redirect()->route('budidayaairpayau', $data)->with(session()->flash('success','Data Berhasil diupdate !!'));
	}

	public function getCari(Request $r)
	{
		$data['budidayaairpayau'] = BudidayaAirPayau::where('lokasi', 'LIKE', '%'.$r->cari.'%')->get();
		return view('app.produksi-pembudidaya.budidaya-airpayau.cari', $data);
	}

	public function getExportExcel(Request $r)
	{
		$data['budidayaairpayau'] = BudidayaAirPayau::whereBetween('created_at', [ $r->offset, $r->limit ])->get();

        Excel::create('Data budidayaairpayau');

        Excel::create('Data budidayaairpayau', function($excel) use($data)
        {
            
            $excel->sheet('New sheet', function($sheet) use($data)
            {
                $sheet->loadView('app.produksi-pembudidaya.budidaya-airpayau.export-excel', $data);
            }); 
        })->download('xlsx');
	}

	public function getExportPdf(Request $r)
	{
		$data['budidayaairpayau'] = BudidayaAirPayau::whereBetween('created_at', [ $r->offset, $r->limit ])->get();
		$data['tgl_awal']		= $r->offset;
		$data['tgl_akhir']		= $r->limit;
        $pdf = PDF::loadView('app.produksi-pembudidaya.budidaya-airpayau.export-pdf', $data);
        return $pdf->setPaper('legal')->setOrientation('landscape')->setWarnings(false)->download('Data budidayaairpayau.pdf');
	}

}