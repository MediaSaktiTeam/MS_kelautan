<?php

namespace App\Http\Controllers\App;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB,Excel,PDF;
use App\User,App\MangroveRehabilitasi,App\Provinsi,App\Kabupaten,App\Kecamatan,App\Desa;
use App\Permissions;

class MangroveRehabilitasiController extends Controller
{

	public function __construct()
	{
		$this->middleware('Pesisir');
	}
	
	public function getIndex(Request $r)
	{
		if ( !isset( $r->offset ) || !isset( $r->limit ) ) {

			$sql = MangroveRehabilitasi::orderBy('id', 'desc')->first();

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

			return redirect( '/app/mangrove/rehabilitasi?offset='.$offset.'&limit='.$limit );
		}
		$limit="10";
		$data['mangroverehabilitasi'] = MangroveRehabilitasi::whereBetween('created_at', [ $r->offset, $r->limit ])->paginate($limit);
		return view ('app.mangrove.rehabilitasi.index',$data)->with('limit', $limit);
	}

	public function getAdd(Request $request)
		{
			$dt = new MangroveRehabilitasi;
			$dt->id = $request->id;
			$dt->kecamatan = $request->kecamatan;
			$dt->desa = $request->desa;
			$dt->direhabilitasi = $request->direhabilitasi;
			$dt->berubah_fungsi = $request->berubah_fungsi;
			$dt->lahan_tambak = $request->lahan_tambak;
			$dt->penggaraman = $request->penggaraman;
			$dt->save();
			return redirect()->route('mangroverehabilitasi')->with(session()->flash('success','Data Berhasil Tersimpan !!'));
		}
	
	public function getDelete($id)
	{
		$val = explode(",", $id);
		foreach ($val as $value){
			MangroveRehabilitasi::where('id', $value)->delete();
		}
		return redirect()->route('mangroverehabilitasi')->with(session()->flash('success', 'Data Berhasil dihapus !'));
	}

	public function getDetail($id)
	{
		$data['mangroverehabilitasi'] = MangroveRehabilitasi::where('id',$id)->first();
		return view('app.mangrove.rehabilitasi.detail', $data);
	}

	public function getEdit($id)
	{
		$data['provinsi'] = Provinsi::all();
		$data['kabupaten'] = Kabupaten::all();
		$data['kecamatan'] = Kecamatan::all();
		$data['desa'] = Desa::all();
		$data['mangroverehabilitasi'] = MangroveRehabilitasi::find($id);
		return view('app.mangrove.rehabilitasi.update', $data);
	}

	public function getUpdate(Request $request)
	{

		$dt = MangroveRehabilitasi::find($request->id);
		$dt->id = $request->id;
		$dt->kecamatan = $request->kecamatan;
		$dt->desa = $request->desa;
		$dt->direhabilitasi = $request->direhabilitasi;
		$dt->berubah_fungsi = $request->berubah_fungsi;
		$dt->lahan_tambak = $request->lahan_tambak;
		$dt->penggaraman = $request->penggaraman;
		$dt->save();
		$data['mangroverehabilitasi'] = MangroveRehabilitasi::paginate(1);
		return redirect()->route('mangroverehabilitasi', $data)->with(session()->flash('success','Data Berhasil diupdate !!'));
	}

	public function getSearch($cari)
	{
		$data['mangroverehabilitasi'] = DB::table('app_mangrove_rehabilitasi as m')
									->leftJoin('kecamatan as k', 'm.kecamatan', '=', 'k.id')
									->leftJoin('desa', 'm.desa', '=', 'desa.id')
										->select(
											'k.nama as nama_kecamatan',
											'm.*',
											'desa.nama as nama_desa')
												->where(function($query) use ($cari) {
													$query->where('k.nama','LIKE', '%'.$cari.'%')
															->orWhere('desa.nama','LIKE', '%'.$cari.'%');
												})
									->take(40)->get();

		return view('app.mangrove.rehabilitasi.search', $data);
	}

	public function getExportExcel(Request $r)
	{
		$data['mangroverehabilitasi'] = MangroveRehabilitasi::whereBetween('created_at', [ $r->offset, $r->limit ])->orderBy('desa','asc')->get();

        Excel::create('Data Mangrove yang direhabilitasi');

        Excel::create('Data Mangrove yang direhabilitasi', function($excel) use($data)
        {
            
            $excel->sheet('New sheet', function($sheet) use($data)
            {
                $sheet->loadView('app.mangrove.rehabilitasi.export-excel', $data);
            }); 
        })->download('xlsx');
	}

	public function getExportPdf(Request $r)
	{
		$data['mangroverehabilitasi'] = MangroveRehabilitasi::whereBetween('created_at', [ $r->offset, $r->limit ])->orderBy('desa','asc')->get();
		$data['tgl_awal']		= $r->offset;
		$data['tgl_akhir']		= $r->limit;
        $pdf = PDF::loadView('app.mangrove.rehabilitasi.export-pdf', $data);
        return $pdf->setPaper('legal')->setOrientation('potrait')->setWarnings(false)->download('Data Mangrove yang direhabilitasi.pdf');
	}

}