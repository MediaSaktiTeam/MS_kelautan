<?php

namespace App\Http\Controllers\App;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB,Excel,PDF;
use App\User,App\JumlahPenduduk,App\Provinsi,App\Kabupaten,App\Kecamatan,App\Desa;
use App\Permissions;

class JumlahPendudukController extends Controller
{

	public function getIndex(Request $r)
	{
		if ( !isset( $r->offset ) || !isset( $r->limit ) ) {

			$sql = JumlahPenduduk::orderBy('id', 'desc')->first();

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

			 return redirect( '/app/jumlah-penduduk?offset='.$offset.'&limit='.$limit );
		}
		$limit = 10;
		$data['jumlahpenduduk'] = JumlahPenduduk::whereBetween('created_at', [ $r->offset, $r->limit ])->paginate(20);
		return view ('app.jumlah-penduduk.index',$data)->with('limit', $limit);
	}

	public function getAdd(Request $request)
		{
			$dt = new JumlahPenduduk;
			$dt->id = $request->id;
			$dt->kecamatan = $request->kecamatan;
			$dt->desa = $request->desa;
			$dt->laki = $request->laki;
			$dt->perempuan = $request->perempuan;
			$dt->jumlah_kk = $request->jumlah_kk;
			$dt->save();
			return redirect()->route('jumlahpenduduk')->with(session()->flash('success','Data Berhasil Tersimpan !!'));
		}

	public function getDelete($id)
	{

		$val = explode(",", $id);

		foreach ($val as $value) {
			JumlahPenduduk::where('id', $value)->delete();           
		}
		return redirect()->route('jumlahpenduduk')->with(session()->flash('success','Data Berhasil Terhapus !!'));
	}

	public function getDetail($id)
	{
		$data['jumlahpenduduk'] = JumlahPenduduk::where('id',$id)->first();
		return view('app.jumlah-penduduk.detail', $data);
	}

	public function getEdit($id)
	{
		$data['provinsi'] = Provinsi::all();
		$data['kabupaten'] = Kabupaten::all();
		$data['kecamatan'] = Kecamatan::all();
		$data['desa'] = Desa::all();
		$data['jumlahpenduduk'] = JumlahPenduduk::find($id);
		return view('app.jumlah-penduduk.update', $data);
	}


	public function getUpdate(Request $request)
		{

			$dt = JumlahPenduduk::find($request->id);
			$dt->id = $request->id;
			$dt->kecamatan = $request->kecamatan;
			$dt->desa = $request->desa;
			$dt->laki = $request->laki;
			$dt->perempuan = $request->perempuan;
			$dt->jumlah_kk = $request->jumlah_kk;
			$dt->save();
			$data['jumlahpenduduk'] = JumlahPenduduk::paginate(1);
			return redirect()->route('jumlahpenduduk', $data)->with(session()->flash('success','Data Berhasil diupdate !!'));
		}

	public function getSearch($cari)
	{
			$data['jumlahpenduduk'] = DB::table('app_jumlah_penduduk as mm')
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

		return view('app.jumlah-penduduk.search', $data);

	}

	public function getExportExcel(Request $r)
	{
		$data['jumlah_penduduk'] = JumlahPenduduk::whereBetween('created_at', [ $r->offset, $r->limit ])->get();

        Excel::create('Data Jumlah Penduduk Wilayah Pesisir dan P3K');

        Excel::create('Data Jumlah Penduduk Wilayah Pesisir dan P3K', function($excel) use($data)
        {
            
            $excel->sheet('New sheet', function($sheet) use($data)
            {
                $sheet->loadView('app.jumlah-penduduk.export-excel', $data);
            }); 
        })->download('xlsx');
	}

	public function getExportPdf(Request $r)
	{
		$data['jumlah_penduduk'] = JumlahPenduduk::whereBetween('created_at', [ $r->offset, $r->limit ])->get();
		$data['tgl_awal']		= $r->offset;
		$data['tgl_akhir']		= $r->limit;
        $pdf = PDF::loadView('app.jumlah-penduduk.export-pdf', $data);
        return $pdf->setPaper('legal')->setOrientation('potrait')->setWarnings(false)->download('Data Jumlah Penduduk Wilayah Pesisir dan P3K.pdf');
	}
	
}