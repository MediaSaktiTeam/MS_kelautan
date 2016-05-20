<?php

namespace App\Http\Controllers\App;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB,Excel,PDF;
use App\User,App\RumputLaut,App\Laporan,App\Provinsi,App\Kabupaten,App\Kecamatan,App\Desa;
use App\Permissions;

class RumputLautController extends Controller
{

	public function getIndex(Request $r)
	{

		if ( !isset( $r->offset ) || !isset( $r->limit ) ) {

			$sql = RumputLaut::orderBy('id', 'desc')->first();

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

			 return redirect( '/app/rumputlaut?offset='.$offset.'&limit='.$limit );
		}

		$limit = 10;
		$data['rumputlaut'] = RumputLaut::whereBetween('created_at', [ $r->offset, $r->limit ])->paginate($limit);
		return view ('app.laporan-produksi.rumputlaut.index',$data)->with('limit', $limit);
	}

	public function getDetail($id)
	{
		$data['rumputlaut'] = RumputLaut::where('id',$id)->first();

		return view('app.laporan-produksi.rumputlaut.detail', $data);
	}

	public function getTambah(Request $request)
	{
		$dt = new RumputLaut;
		$dt->id = $request->id;
		$dt->provinsi = $request->provinsi;
		$dt->kabupaten = $request->kabupaten;
		$dt->kecamatan = $request->kecamatan;
		$dt->desa = $request->desa;
		$dt->rtp = $request->rtp;
		$dt->panjang_pantai = $request->panjang_pantai;
		$dt->potensi = $request->potensi;
		$dt->luas_tanam = $request->luas_tanam;
		$dt->bentangan = $request->bentangan;
		$dt->bibit_cottoni = $request->bibit_cottoni;
		$dt->bibit_spinosum = $request->bibit_spinosum;
		$dt->cottoni_basah = $request->cottoni_basah;
		$dt->cottoni_kering = $request->cottoni_kering;
		$dt->spinosum_basah = $request->spinosum_basah;
		$dt->spinosum_kering = $request->spinosum_kering;
		$dt->keterangan = $request->keterangan;
		$dt->save();
		return redirect()->route('rumputlaut')->with(session()->flash('success','Data Berhasil Tersimpan !!'));
	}

	public function getHapus($id){

		$val = explode(",", $id);

		foreach ($val as $value) {
			RumputLaut::where('id', $value)->delete();           
		}
		return redirect()->route('rumputlaut')->with(session()->flash('success','Data Berhasil Terhapus !!'));
	}

	public function getEdit($id)
	{
		$data['provinsi'] = Provinsi::all();
		$data['kabupaten'] = Kabupaten::all();
		$data['kecamatan'] = Kecamatan::all();
		$data['rumputlaut'] = RumputLaut::find($id);
		return view('app.laporan-produksi.rumputlaut.update', $data);
	}

	public function getUpdate(Request $request)
	{

		$dt = RumputLaut::find($request->id);
		$dt->provinsi = $request->provinsi;
		$dt->kabupaten = $request->kabupaten;
		$dt->kecamatan = $request->kecamatan;
		$dt->desa = $request->desa;
		$dt->rtp = $request->rtp;
		$dt->panjang_pantai = $request->panjang_pantai;
		$dt->potensi = $request->potensi;
		$dt->luas_tanam = $request->luas_tanam;
		$dt->bentangan = $request->bentangan;
		$dt->bibit_cottoni = $request->bibit_cottoni;
		$dt->bibit_spinosum = $request->bibit_spinosum;
		$dt->cottoni_basah = $request->cottoni_basah;
		$dt->cottoni_kering = $request->cottoni_kering;
		$dt->spinosum_basah = $request->spinosum_basah;
		$dt->spinosum_kering = $request->spinosum_kering;
		$dt->keterangan = $request->keterangan;
		$dt->save();
		$data['rumputlaut'] = RumputLaut::paginate(1);

		return redirect()->route('rumputlaut', $data)->with(session()->flash('success','Data Berhasil diupdate !!'));
	}

	public function getCari($cari = NULL)
	{
		$data['rumputlaut'] = DB::table('app_rumput_laut')
									->leftJoin('kecamatan', 'app_rumput_laut.kecamatan', '=', 'kecamatan.id')
									->leftJoin('desa', 'app_rumput_laut.desa', '=', 'desa.id')
										->select(
											'kecamatan.nama as nama_kecamatan',
											'app_rumput_laut.*',
											'desa.nama as nama_desa')
												->where(function($query) use ($cari) {
													$query->where('kecamatan.nama','LIKE', '%'.$cari.'%')
															->orWhere('desa.nama','LIKE', '%'.$cari.'%');
												})
									->take(40)->get();
		return view('app.laporan-produksi.rumputlaut.cari', $data);
	}

	public function getExportExcel(Request $r)
	{
		$data['rumputlaut'] = RumputLaut::whereBetween('created_at', [ $r->offset, $r->limit ])->get();

        Excel::create('Data rumputlaut');

        Excel::create('Data rumputlaut', function($excel) use($data)
        {
            
            $excel->sheet('New sheet', function($sheet) use($data)
            {
                $sheet->loadView('app.laporan-produksi.rumputlaut.export-excel', $data);
            }); 
        })->download('xlsx');
	}

	public function getExportPdf(Request $r)
	{
		$data['rumputlaut'] = RumputLaut::whereBetween('created_at', [ $r->offset, $r->limit ])->get();
		$data['kasi'] = Laporan::where('jabatan','Kasi Budidaya Laut. Payau dan Air Tawar')->get();
		$data['petugas'] = Laporan::where('jabatan','Petugas Statistik')->get();
        $data['tgl_awal']		= $r->offset;
		$data['tgl_akhir']		= $r->limit;
        $pdf = PDF::loadView('app.laporan-produksi.rumputlaut.export-pdf', $data);
        return $pdf->setPaper('legal')->setOrientation('landscape')->setWarnings(false)->download('Data rumputlaut.pdf');
	}


}