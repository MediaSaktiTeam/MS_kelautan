<?php

namespace App\Http\Controllers\App;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB,Excel,PDF;
use App\User,App\Tambak,App\Provinsi,App\Kabupaten,App\Kecamatan,App\Desa;
use App\Permissions;

class TambakController extends Controller
{

	public function getIndex()
	{
		$limit = 10;
		$data['tambak'] = Tambak::paginate($limit);
		// $data['Tambak'] = DB::table('app_air_tawar')
		// 							->leftJoin('kecamatan', 'app_air_tawar.kecamatan', '=', 'kecamatan.id')
		// 							->leftJoin('desa', 'app_air_tawar.desa', '=', 'desa.id')
		// 								->select(
		// 									'kecamatan.nama as nama_kecamatan',
		// 									'app_air_tawar.*',
		// 									'desa.nama as nama_desa')->paginate($limit);
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
		$dt->save();
		return redirect()->route('Tambak')->with(session()->flash('success','Data Berhasil Tersimpan !!'));
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
		$dt->save();
		$data['tambak'] = Tambak::paginate(1);

		return redirect()->route('tambak', $data)->with(session()->flash('success','Data Berhasil diupdate !!'));
	}

	public function getCari($cari = NULL)
	{
		$data['tambak'] = DB::table('app_air_tawar')
									->leftJoin('kecamatan', 'app_air_tawar.kecamatan', '=', 'kecamatan.id')
									->leftJoin('desa', 'app_air_tawar.desa', '=', 'desa.id')
										->select(
											'kecamatan.nama as nama_kecamatan',
											'app_air_tawar.*',
											'desa.nama as nama_desa')
												->where(function($query) use ($cari) {
													$query->where('app_air_tawar.kecamatan','LIKE', '%'.$cari.'%')
															->orWhere('app_air_tawar.desa','LIKE', '%'.$cari.'%');
												})
									->take(40)->get();
		return view('app.laporan-produksi.Tambak.cari', $data);
	}

	public function getExportExcel()
	{
		$data['tambak'] = Tambak::get();

        Excel::create('Data Tambak');

        Excel::create('Data Tambak', function($excel) use($data)
        {
            
            $excel->sheet('New sheet', function($sheet) use($data)
            {
                $sheet->loadView('app.laporan-produksi.tambak.export-excel', $data);
            }); 
        })->download('xlsx');
	}

	public function getExportPdf()
	{
		$data['tambak'] = Tambak::get();
		
        $pdf = PDF::loadView('app.laporan-produksi.tambak.export-pdf', $data);
        return $pdf->setPaper('legal')->setOrientation('landscape')->setWarnings(false)->download('Data Tambak.pdf');
	}

}