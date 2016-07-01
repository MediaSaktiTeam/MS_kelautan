<?php

namespace App\Http\Controllers\App;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB,Excel,PDF;
use App\User,App\BudidayaRumputLaut,App\Laporan;
use App\Permissions;

class BudidayaRumputLautController extends Controller
{

	public function getIndex(Request $r)
	{

		if ( !isset( $r->offset ) || !isset( $r->limit ) ) {

			$sql = BudidayaRumputLaut::orderBy('id', 'desc')->first();

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

			 return redirect( '/app/budidayarumputlaut?offset='.$offset.'&limit='.$limit );
		}
		$limit = 10;
		$data['budidayarumputlaut'] = BudidayaRumputLaut::whereBetween('created_at', [ $r->offset, $r->limit ])
									->paginate($limit);

		return view ('app.produksi-pembudidaya.budidaya-rumputlaut.index',$data)->with('limit', $limit);
	}

	public function getDetail($id)
	{
		$data['budidayarumputlaut'] = BudidayaRumputLaut::where('id',$id)->first();

		return view('app.produksi-pembudidaya.budidaya-rumputlaut.detail', $data);
	}

	public function getAdd(Request $request)
	{
		$dt = new budidayarumputlaut;
		$dt->id = $request->id;
		$dt->lokasi = $request->lokasi;
		$dt->panjang_pantai = $request->panjang_pantai;
		$dt->rtp = $request->rtp;
		$dt->potensi = $request->potensi;
		$dt->luas_tanam = $request->luas_tanam;
		$dt->jumlah_bibit = $request->jumlah_bibit;
		$dt->produksi_catoni = $request->produksi_catoni;
		$dt->produksi_spenosun = $request->produksi_spenosun;
		$dt->keterangan = $request->keterangan;
		$dt->save();
		return redirect()->route('budidayarumputlaut')->with(session()->flash('success','Data Berhasil Tersimpan !!'));
	}

	public function getDelete($id){

		$val = explode(",", $id);

		foreach ($val as $value) {
			BudidayaRumputLaut::where('id', $value)->delete();           
		}
		return redirect()->route('budidayarumputlaut')->with(session()->flash('success','Data Berhasil Terhapus !!'));
	}

	public function getEdit($id)
	{
		$data['budidayarumputlaut'] = BudidayaRumputLaut::find($id);
		return view('app.produksi-pembudidaya.budidaya-rumputlaut.update', $data);
	}

	public function getUpdate(Request $request)
	{

		$dt = BudidayaRumputLaut::find($request->id);
		$dt->id = $request->id;
		$dt->lokasi = $request->lokasi;
		$dt->panjang_pantai = $request->panjang_pantai;
		$dt->rtp = $request->rtp;
		$dt->potensi = $request->potensi;
		$dt->luas_tanam = $request->luas_tanam;
		$dt->jumlah_bibit = $request->jumlah_bibit;
		$dt->produksi_catoni = $request->produksi_catoni;
		$dt->produksi_spenosun = $request->produksi_spenosun;
		$dt->keterangan = $request->keterangan;
		$dt->save();
		$data['budidayarumputlaut'] = BudidayaRumputLaut::paginate(1);

		return redirect()->route('budidayarumputlaut', $data)->with(session()->flash('success','Data Berhasil diupdate !!'));
	}

	public function getCari(Request $r)
	{
		$data['budidayarumputlaut'] = BudidayaRumputLaut::where('lokasi', 'LIKE', '%'.$r->cari.'%')->get();
		return view('app.produksi-pembudidaya.budidaya-rumputlaut.cari', $data);
	}

	public function getExportExcel(Request $r)
	{
		$data['budidayarumputlaut'] = BudidayaRumputLaut::whereBetween('created_at', [ $r->offset, $r->limit ])->get();

        Excel::create('Data budidayarumputlaut');

        Excel::create('Data budidayarumputlaut', function($excel) use($data)
        {
            
            $excel->sheet('New sheet', function($sheet) use($data)
            {
                $sheet->loadView('app.produksi-pembudidaya.budidaya-rumputlaut.export-excel', $data);
            }); 
        })->download('xlsx');
	}

	public function getExportPdf(Request $r)
	{
		$data['budidayarumputlaut'] = BudidayaRumputLaut::whereBetween('created_at', [ $r->offset, $r->limit ])->get();
		$data['tgl_awal']		= $r->offset;
		$data['tgl_akhir']		= $r->limit;
        $pdf = PDF::loadView('app.produksi-pembudidaya.budidaya-rumputlaut.export-pdf', $data);
        return $pdf->setPaper('legal')->setOrientation('landscape')->setWarnings(false)->download('Data budidayarumputlaut.pdf');
	}

}