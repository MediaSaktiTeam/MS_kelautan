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
	
	public function getIndex(Request $r)
	{
		if ( !isset( $r->offset ) || !isset( $r->limit ) ) {

			$sql = MangroveJenis::orderBy('id', 'desc')->first();

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

			return redirect( '/app/mangrove/jenis?offset='.$offset.'&limit='.$limit );
		}

		$limit="10";
		$data['mangrovejenis'] = MangroveJenis::whereBetween('created_at', [ $r->offset, $r->limit ])->paginate($limit);
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

	public function getExportExcel(Request $r)
	{
		$data['mangrovejenis'] = MangroveJenis::whereBetween('created_at', [ $r->offset, $r->limit ])->get();

        Excel::create('Jenis Mangrove');

        Excel::create('Jenis Mangrove', function($excel) use($data)
        {
            
            $excel->sheet('New sheet', function($sheet) use($data)
            {
                $sheet->loadView('app.mangrove.jenis.export-excel', $data);
            }); 
        })->download('xlsx');
	}

	public function getExportPdf(Request $r)
	{
		$data['mangrovejenis'] = MangroveJenis::whereBetween('created_at', [ $r->offset, $r->limit ])->get();
		$data['tgl_awal']		= $r->offset;
		$data['tgl_akhir']		= $r->limit;
        $pdf = PDF::loadView('app.mangrove.jenis.export-pdf', $data);
        return $pdf->setPaper('legal')->setOrientation('potrait')->setWarnings(false)->download('Jenis Mangrove.pdf');
	}
}