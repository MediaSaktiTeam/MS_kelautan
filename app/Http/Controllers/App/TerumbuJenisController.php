<?php

namespace App\Http\Controllers\App;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB,Excel,PDF;
use App\User,App\TerumbuJenis,App\Provinsi,App\Kabupaten,App\Kecamatan,App\Desa;
use App\Permissions;

class TerumbuJenisController extends Controller
{

	public function __construct()
	{
		$this->middleware('Pesisir');
	}
	
	public function getIndex(Request $r)
	{
		$limit = 10;
		$data['terumbujenis'] = TerumbuJenis::paginate(10);
		return view ('app.terumbu.jenis.index',$data)->with('limit', $limit);
	}

	public function getAdd(Request $request)
		{
			$dt = new TerumbuJenis;
			$dt->id = $request->id;
			$dt->kecamatan = $request->kecamatan;
			$dt->jenis_ikan = $request->jenis_ikan;
			$dt->save();
			return redirect()->route('terumbujenis')->with(session()->flash('success','Data Berhasil Tersimpan !!'));
		}

	public function getDelete($id)
	{

		$val = explode(",", $id);

		foreach ($val as $value) {
			TerumbuJenis::where('id', $value)->delete();           
		}
		return redirect()->route('terumbujenis')->with(session()->flash('success','Data Berhasil Terhapus !!'));
	}

	public function getDetail($id)
	{
		$data['terumbujenis'] = TerumbuJenis::where('id',$id)->first();
		return view('app.terumbu.jenis.detail', $data);
	}

	public function getEdit($id)
	{
		$data['provinsi'] = Provinsi::all();
		$data['kabupaten'] = Kabupaten::all();
		$data['kecamatan'] = Kecamatan::all();
		$data['desa'] = Desa::all();
		$data['terumbujenis'] = TerumbuJenis::find($id);
		return view('app.terumbu.jenis.update', $data);
	}


public function getUpdate(Request $request)
	{

		$dt = TerumbuJenis::find($request->id);
		$dt->id = $request->id;
		$dt->kecamatan = $request->kecamatan;
		$dt->jenis_ikan = $request->jenis_ikan;
		$dt->save();
		$data['terumbujenis'] = TerumbuJenis::paginate(1);
		return redirect()->route('terumbujenis', $data)->with(session()->flash('success','Data Berhasil diupdate !!'));
	}

	public function getSearch($cari)
	{
		$data['terumbujenis'] = DB::table('app_terumbu_jenis_ikan as m')
									->leftJoin('kecamatan as k', 'm.kecamatan', '=', 'k.id')
										->select(
											'k.nama as nama_kecamatan', 'm.*')
												->where(function($query) use ($cari) {
													$query->where('k.nama','LIKE', '%'.$cari.'%')
															->orWhere('m.jenis_ikan','LIKE', '%'.$cari.'%');
												})
									->take(40)->get();

		return view('app.terumbu.jenis.search', $data);
	}

	public function getExportExcel()
	{
		$data['terumbujenis'] = TerumbuJenis::all();

        Excel::create('Jenis Ikan');

        Excel::create('Jenis Ikan', function($excel) use($data)
        {
            
            $excel->sheet('New sheet', function($sheet) use($data)
            {
                $sheet->loadView('app.terumbu.jenis.export-excel', $data);
            }); 
        })->download('xlsx');
	}

	public function getExportPdf()
	{
		$data['terumbujenis'] = TerumbuJenis::all();
		
        $pdf = PDF::loadView('app.terumbu.jenis.export-pdf', $data);
        return $pdf->setPaper('legal')->setOrientation('potrait')->setWarnings(false)->download('Jenis Ikan.pdf');
	}
	
}