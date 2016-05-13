<?php

namespace App\Http\Controllers\App;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB,Excel,PDF;
use App\User,App\MangroveMilik,App\Provinsi,App\Kabupaten,App\Kecamatan,App\Desa;

class MangroveMilikController extends Controller
{

	public function getIndex(Request $r)
	{
		$limit = 10;
		$data['mangrovemilik'] = MangroveMilik::paginate(10);
		return view ('app.mangrove.milik.index',$data)->with('limit', $limit);
	}

	public function getAdd(Request $request)
		{
			$dt = new MangroveMilik;
			$dt->id = $request->id;
			$dt->kecamatan = $request->kecamatan;
			$dt->desa = $request->desa;
			$dt->luas_lahan = $request->luas_lahan;
			$dt->kondisi_rusak = $request->kondisi_rusak;
			$dt->kondisi_sedang = $request->kondisi_sedang;
			$dt->kondisi_baik = $request->kondisi_baik;
			$dt->save();
			return redirect()->route('mangrovemilik')->with(session()->flash('success','Data Berhasil Tersimpan !!'));
		}

	public function getDelete($id)
	{

		$val = explode(",", $id);

		foreach ($val as $value) {
			MangroveMilik::where('id', $value)->delete();           
		}
		return redirect()->route('mangrovemilik')->with(session()->flash('success','Data Berhasil Terhapus !!'));
	}

	public function getDetail($id)
	{
		$data['mangrovemilik'] = MangroveMilik::where('id',$id)->first();
		return view('app.mangrove.milik.detail', $data);
	}

	public function getEdit($id)
	{
		$data['provinsi'] = Provinsi::all();
		$data['kabupaten'] = Kabupaten::all();
		$data['kecamatan'] = Kecamatan::all();
		$data['desa'] = Desa::all();
		$data['mangrovemilik'] = MangroveMilik::find($id);
		return view('app.mangrove.milik.update', $data);
	}


public function getUpdate(Request $request)
	{

		$dt = MangroveMilik::find($request->id);
		$dt->id = $request->id;
		$dt->kecamatan = $request->kecamatan;
		$dt->desa = $request->desa;
		$dt->luas_lahan = $request->luas_lahan;
		$dt->kondisi_rusak = $request->kondisi_rusak;
		$dt->kondisi_sedang = $request->kondisi_sedang;
		$dt->kondisi_baik = $request->kondisi_baik;
		$dt->save();
		$data['mangrovemilik'] = MangroveMilik::paginate(1);
		return redirect()->route('mangrovemilik', $data)->with(session()->flash('success','Data Berhasil diupdate !!'));
	}

	public function getSearch($cari)
	{
		$data['mangrovemilik'] = DB::table('app_mangrove_milik as mm')
									->leftJoin('kecamatan as k', 'mm.kecamatan', '=', 'k.id')
									->leftJoin('desa', 'mm.desa', '=', 'desa.id')
										->select(
											'k.nama as nama_kecamatan',
											'mm.*',
											'desa.nama as nama_desa')
												->where(function($query) use ($cari) {
													$query->where('k.nama','LIKE', '%'.$cari.'%')
															->orWhere('desa.nama','LIKE', '%'.$cari.'%');
												})
									->take(40)->get();

		return view('app.mangrove.milik.search', $data);
	}

	public function getExportExcel()
	{
		$data['mangrovemilik'] = MangroveMilik::orderBy('desa','asc')->get();

        Excel::create('Data Mangrove yang dimiliki');

        Excel::create('Data Mangrove yang dimiliki', function($excel) use($data)
        {
            
            $excel->sheet('New sheet', function($sheet) use($data)
            {
                $sheet->loadView('app.mangrove.milik.export-excel', $data);
            }); 
        })->download('xlsx');
	}

	public function getExportPdf()
	{
		$data['mangrovemilik'] = MangroveMilik::orderBy('desa','asc')->get();
		
        $pdf = PDF::loadView('app.mangrove.milik.export-pdf', $data);
        return $pdf->setPaper('legal')->setOrientation('potrait')->setWarnings(false)->download('Data Mangrove yang dimiliki.pdf');
	}
	
}