<?php

namespace App\Http\Controllers\App;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB,Excel,PDF;
use App\User,App\MangroveJenis,App\Provinsi,App\Kabupaten,App\Kecamatan,App\Desa;
use App\Permissions;

class MangroveJenisController extends Controller
{

	public function __construct()
	{
		$this->middleware('Pesisir');
	}
	
	public function getIndex()
	{
		$limit="10";
		$data['mangrovejenis'] = MangroveJenis::paginate(10);
		return view ('app.mangrove.jenis.index',$data)->with('limit', $limit);
	}

	public function getAdd(Request $request)
			{
				$dt = new MangroveJenis;
				$dt->id = $request->id;
				$dt->kecamatan = $request->kecamatan;
				$dt->jenis_mangrove = $request->jenis_mangrove;
				$dt->save();
				return redirect()->route('mangrovejenis')->with(session()->flash('success','Data Berhasil Tersimpan !!'));
			}

	public function getDelete($id)
	{

		$val = explode(",", $id);

		foreach ($val as $value) {
			MangroveJenis::where('id', $value)->delete();           
		}
		return redirect()->route('mangrovejenis')->with(session()->flash('success','Data Berhasil Terhapus !!'));
	}

	public function getDetail($id)
	{
		$data['mangrovejenis'] = MangroveJenis::where('id',$id)->first();
		return view('app.mangrove.jenis.detail', $data);
	}
	
	public function getEdit($id)
	{
		$data['provinsi'] = Provinsi::all();
		$data['kabupaten'] = Kabupaten::all();
		$data['kecamatan'] = Kecamatan::all();
		$data['desa'] = Desa::all();
		$data['mangrovejenis'] = MangroveJenis::find($id);
		return view('app.mangrove.jenis.update', $data);
	}

	public function getUpdate(Request $request)
	{

		$dt = MangroveJenis::find($request->id);
		$dt->id = $request->id;
		$dt->kecamatan = $request->kecamatan;
		$dt->jenis_mangrove = $request->jenis_mangrove;
		$dt->save();
		$data['mangrovejenis'] = MangroveJenis::paginate(1);
		return redirect()->route('mangrovejenis', $data)->with(session()->flash('success','Data Berhasil diupdate !!'));
	}

	public function getSearch($cari)
	{
		$data['mangrovejenis'] = MangroveJenis::where('kecamatan  ', 'LIKE', '%'.$request->cari.'%')->get();
		$data['mangrovejenis'] = DB::table('app_mangrove_jenis as m')
									->leftJoin('kecamatan as k', 'm.kecamatan', '=', 'k.id')
										->select(
											'k.nama as nama_kecamatan', 'm.*')
												->where(function($query) use ($cari) {
													$query->where('k.nama','LIKE', '%'.$cari.'%')
															->orWhere('m.jenis_mangrove','LIKE', '%'.$cari.'%');
												})
									->take(40)->get();

		return view('app.mangrove.jenis.search', $data);
	}

	public function getExportExcel()
	{
		$data['mangrovejenis'] = MangroveJenis::all();

        Excel::create('Jenis Mangrove');

        Excel::create('Jenis Mangrove', function($excel) use($data)
        {
            
            $excel->sheet('New sheet', function($sheet) use($data)
            {
                $sheet->loadView('app.mangrove.jenis.export-excel', $data);
            }); 
        })->download('xlsx');
	}

	public function getExportPdf()
	{
		$data['mangrovejenis'] = MangroveJenis::all();
		
        $pdf = PDF::loadView('app.mangrove.jenis.export-pdf', $data);
        return $pdf->setPaper('legal')->setOrientation('potrait')->setWarnings(false)->download('Jenis Mangrove.pdf');
	}
}