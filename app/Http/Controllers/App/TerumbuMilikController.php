<?php

namespace App\Http\Controllers\App;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB,Excel,PDF;
use App\User,App\TerumbuMilik,App\Provinsi,App\Kabupaten,App\Kecamatan,App\Desa;
use App\Permissions;

class TerumbuMilikController extends Controller
{

	public function __construct()
	{
		$this->middleware('Pesisir');
	}
	
	public function getIndex(Request $r)
	{

		if ( !isset( $r->offset ) || !isset( $r->limit ) ) {

			$sql = TerumbuMilik::orderBy('id', 'desc')->first();

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

			return redirect( '/app/terumbu/milik?offset='.$offset.'&limit='.$limit );
		}

		$limit = 10;
		$data['terumbumilik'] = TerumbuMilik::whereBetween('created_at', [ $r->offset, $r->limit ])->paginate($limit);
		return view ('app.terumbu.milik.index',$data)->with('limit', $limit);
	}

	public function getAdd(Request $request)
		{
			$dt = new TerumbuMilik;
			$dt->id = $request->id;
			$dt->kecamatan = $request->kecamatan;
			$dt->desa = $request->desa;
			$dt->luas_lahan = $request->luas_lahan;
			$dt->kondisi_rusak = $request->kondisi_rusak;
			$dt->kondisi_sedang = $request->kondisi_sedang;
			$dt->kondisi_baik = $request->kondisi_baik;
			$dt->save();
			return redirect()->route('terumbumilik')->with(session()->flash('success','Data Berhasil Tersimpan !!'));
		}

	public function getDelete($id)
	{

		$val = explode(",", $id);

		foreach ($val as $value) {
			TerumbuMilik::where('id', $value)->delete();           
		}
		return redirect()->route('terumbumilik')->with(session()->flash('success','Data Berhasil Terhapus !!'));
	}

	public function getDetail($id)
	{
		$data['terumbumilik'] = TerumbuMilik::where('id',$id)->first();
		return view('app.terumbu.milik.detail', $data);
	}

	public function getEdit($id)
	{
		$data['provinsi'] = Provinsi::all();
		$data['kabupaten'] = Kabupaten::all();
		$data['kecamatan'] = Kecamatan::all();
		$data['desa'] = Desa::all();
		$data['terumbumilik'] = TerumbuMilik::find($id);
		return view('app.terumbu.milik.update', $data);
	}


public function getUpdate(Request $request)
	{

		$dt = TerumbuMilik::find($request->id);
		$dt->id = $request->id;
		$dt->kecamatan = $request->kecamatan;
		$dt->desa = $request->desa;
		$dt->luas_lahan = $request->luas_lahan;
		$dt->kondisi_rusak = $request->kondisi_rusak;
		$dt->kondisi_sedang = $request->kondisi_sedang;
		$dt->kondisi_baik = $request->kondisi_baik;
		$dt->save();
		$data['terumbumilik'] = TerumbuMilik::paginate(1);
		return redirect()->route('terumbumilik', $data)->with(session()->flash('success','Data Berhasil diupdate !!'));
	}

	public function getSearch($cari)
	{
		$data['terumbumilik'] = DB::table('app_terumbu_milik as t')
									->leftJoin('kecamatan as k', 't.kecamatan', '=', 'k.id')
									->leftJoin('desa', 't.desa', '=', 'desa.id')
										->select(
											'k.nama as nama_kecamatan',
											't.*',
											'desa.nama as nama_desa')
												->where(function($query) use ($cari) {
													$query->where('k.nama','LIKE', '%'.$cari.'%')
															->orWhere('desa.nama','LIKE', '%'.$cari.'%');
												})
									->take(40)->get();

		return view('app.terumbu.milik.search', $data);
	}

	public function getExportExcel(Request $r)
	{
		$data['terumbumilik'] = TerumbuMilik::whereBetween('created_at', [ $r->offset, $r->limit ])->orderBy('desa','asc')->get();

        Excel::create('Data terumbu karang yang dimiliki');

        Excel::create('Data terumbu karang yang dimiliki', function($excel) use($data)
        {
            
            $excel->sheet('New sheet', function($sheet) use($data)
            {
                $sheet->loadView('app.terumbu.milik.export-excel', $data);
            }); 
        })->download('xlsx');
	}

	public function getExportPdf(Request $r)
	{
		$data['terumbumilik'] = TerumbuMilik::whereBetween('created_at', [ $r->offset, $r->limit ])->orderBy('desa','asc')->get();
		$data['tgl_awal']		= $r->offset;
		$data['tgl_akhir']		= $r->limit;
        $pdf = PDF::loadView('app.terumbu.milik.export-pdf', $data);
        return $pdf->setPaper('legal')->setOrientation('potrait')->setWarnings(false)->download('Data Terumbu Karang yang dimiliki.pdf');
	}
	
}