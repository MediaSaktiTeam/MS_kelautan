<?php

namespace App\Http\Controllers\App;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB,Excel,PDF;
use App\User,App\TerumbuRehabilitasi,App\Provinsi,App\Kabupaten,App\Kecamatan,App\Desa;
use App\Permissions;

class TerumbuRehabilitasiController extends Controller
{

	public function __construct()
	{
		$this->middleware('Pesisir');
	}

	public function getIndex(Request $r)
	{
		if ( !isset( $r->offset ) || !isset( $r->limit ) ) {

			$sql = TerumbuRehabilitasi::orderBy('id', 'desc')->first();

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

			 return redirect( '/app/terumbu/rehabilitasi?offset='.$offset.'&limit='.$limit );
		}
		$limit = 10;
		$data['terumburehabilitasi'] = TerumbuRehabilitasi::whereBetween('created_at', [ $r->offset, $r->limit ])->paginate(10);
		return view ('app.terumbu.rehabilitasi.index',$data)->with('limit', $limit);
	}

	public function getAdd(Request $request)
		{
			$dt = new TerumbuRehabilitasi;
			$dt->id = $request->id;
			$dt->kecamatan = $request->kecamatan;
			$dt->desa = $request->desa;
			$dt->direhabilitasi = $request->direhabilitasi;
			$dt->save();
			return redirect()->route('terumburehabilitasi')->with(session()->flash('success','Data Berhasil Tersimpan !!'));
		}

	public function getDelete($id)
	{

		$val = explode(",", $id);

		foreach ($val as $value) {
			TerumbuRehabilitasi::where('id', $value)->delete();           
		}
		return redirect()->route('terumburehabilitasi')->with(session()->flash('success','Data Berhasil Terhapus !!'));
	}

	public function getDetail($id)
	{
		$data['terumburehabilitasi'] = TerumbuRehabilitasi::where('id',$id)->first();
		return view('app.terumbu.rehabilitasi.detail', $data);
	}

	public function getEdit($id)
	{
		$data['provinsi'] = Provinsi::all();
		$data['kabupaten'] = Kabupaten::all();
		$data['kecamatan'] = Kecamatan::all();
		$data['desa'] = Desa::all();
		$data['terumburehabilitasi'] = TerumbuRehabilitasi::find($id);
		return view('app.terumbu.rehabilitasi.update', $data);
	}


public function getUpdate(Request $request)
	{

		$dt = TerumbuRehabilitasi::find($request->id);
		$dt->id = $request->id;
		$dt->kecamatan = $request->kecamatan;
		$dt->desa = $request->desa;
		$dt->direhabilitasi = $request->direhabilitasi;
		$dt->save();
		$data['terumburehabilitasi'] = TerumbuRehabilitasi::paginate(1);
		return redirect()->route('terumburehabilitasi', $data)->with(session()->flash('success','Data Berhasil diupdate !!'));
	}

	public function getSearch($cari)
	{
		$data['terumburehabilitasi'] = DB::table('app_terumbu_rehabilitasi as t')
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

		return view('app.terumbu.rehabilitasi.search', $data);
	}

	public function getExportExcel(Request $r)
	{
		$data['terumburehabilitasi'] = TerumbuRehabilitasi::whereBetween('created_at', [ $r->offset, $r->limit ])->orderBy('desa','asc')->get();

        Excel::create('Data terumbu karang yang direhabilitasi');

        Excel::create('Data terumbu karang yang direhabilitasi', function($excel) use($data)
        {
            
            $excel->sheet('New sheet', function($sheet) use($data)
            {
                $sheet->loadView('app.terumbu.rehabilitasi.export-excel', $data);
            }); 
        })->download('xlsx');
	}

	public function getExportPdf(Request $r)
	{
		$data['terumburehabilitasi'] = terumburehabilitasi::whereBetween('created_at', [ $r->offset, $r->limit ])->orderBy('desa','asc')->get();
		$data['tgl_awal']		= $r->offset;
		$data['tgl_akhir']		= $r->limit;
        $pdf = PDF::loadView('app.terumbu.rehabilitasi.export-pdf', $data);
        return $pdf->setPaper('legal')->setOrientation('potrait')->setWarnings(false)->download('Data Mangrove yang direhabilitasi.pdf');
	}

	
}