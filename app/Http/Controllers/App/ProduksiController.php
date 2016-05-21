<?php

namespace App\Http\Controllers\App;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB,Excel,PDF;
use App\User, App\Produksi;
use Permissions;
use App\Custom;

class ProduksiController extends Controller
{

	public function getIndex(Request $r)
	{
		if ( !isset( $r->pr ) ) return redirect('/app/beranda');

		$Ms = new Custom;
		$profesi = $Ms->dek($r->pr);

		$data['produksi'] = DB::table('produksi as p')
								->leftJoin('users as u', 'p.id_user', '=', 'u.id')
								->select('p.*','u.id as id_user', 'u.name')
								->where('u.profesi', $profesi)
								->whereBetween('p.created_at', [ $r->offset, $r->limit ])
								->orderBy('id','desc')
								->paginate(10);

		$data['users'] = DB::table('users as u')
							->leftJoin('app_kelompok as ak', 'u.id_kelompok', '=', 'ak.id_kelompok')
							->select('u.*', 'ak.nama as nama_kelompok')
								->where('u.profesi', '=', $profesi)
								->orderBy('ak.nama', 'asc')->get();

		return view ('app.produksi.index',$data);
	}

	public function postStore(Request $r)
	{
		$data = new Produksi;
		$data->id_user = $r->id_user;
		$data->jenis_produksi = $r->jenis_produksi;
		$data->biaya_produksi = $r->biaya_produksi;
		$data->jenis_ikan = $r->jenis_ikan;
		$data->save();

		\Session::flash('success', 'Berhasil menyimpan data');
		return redirect('/app/produksi?offset='.$r->offset.'&limit='.$r->limit.'&pr='.$r->pr);
	}

	public function getEdit($id)
	{
		$data['produksi'] = Produksi::find($id);
		return view('app.produksi.edit', $data);
	}

	public function postUpdate(Request $r)
	{
		$data = Produksi::find($r->id);
		$data->jenis_produksi = $r->jenis_produksi;
		$data->biaya_produksi = $r->biaya_produksi;
		$data->jenis_ikan = $r->jenis_ikan;
		$data->save();

		\Session::flash('success', 'Berhasil menyimpan data');
		// return redirect('/app/produksi/edit/'.$r->id.'?offset='.$r->offset.'&limit='.$r->limit.'&pr='.$r->pr);
		return redirect()->back();
	}

	public function getSearch(Request $r)
	{

		$Ms = new Custom;
		$cari = $r->cari;
		$profesi = $r->pr;

		$data['produksi'] = DB::table('produksi as p')
								->leftJoin('users as u', 'p.id_user', '=', 'u.id')
								->select('p.*','u.id as id_user', 'u.name')
								->where('u.profesi', $profesi)
								->where(function($query) use ($cari) {
										$query->where('u.name','LIKE', '%'.$cari.'%')
												->orWhere('p.jenis_produksi','LIKE', '%'.$cari.'%')
												->orWhere('p.jenis_ikan','LIKE', '%'.$cari.'%');
									})->paginate(40);

		$data['offset'] = $r->offset;
		$data['limit'] = $r->limit;
		
		return view('app.produksi.cari', $data);
	}

	public function getHapus(Request $r, $data)
	{

		$val = explode(",", $data);

		foreach ($val as $v) {

			Produksi::where('id', $v)->delete();           
		}

		$r->session()->flash('success','Berhasil menghapus data');
		return redirect()->back();
	}


	public function getExportExcel(Request $r)
	{
		$Ms = new Custom;
		$profesi = $Ms->dek($r->pr);

		$data['produksi'] = DB::table('produksi as p')
								->leftJoin('users as u', 'p.id_user', '=', 'u.id')
								->select('p.*','u.id as id_user', 'u.name')
								->where('u.profesi', $profesi)
								->whereBetween('p.created_at', [ $r->offset, $r->limit ])
								->get();

		$data['profesi'] = $profesi;

        Excel::create('Data Produksi '. $profesi);

        Excel::create('Data Produksi '. $profesi, function($excel) use($data)
        {
            
            $excel->sheet('New sheet', function($sheet) use($data)
            {
                $sheet->loadView('app.produksi.export-excel', $data);
            }); 
        })->download('xlsx');
	}

	public function getExportPdf(Request $r)
	{
		$Ms = new Custom;
		$profesi = $Ms->dek($r->pr);

		$data['produksi'] = DB::table('produksi as p')
								->leftJoin('users as u', 'p.id_user', '=', 'u.id')
								->select('p.*','u.id as id_user', 'u.name')
								->where('u.profesi', $profesi)
								->whereBetween('p.created_at', [ $r->offset, $r->limit ])
								->get();

		$data['profesi'] = $profesi;
		$data['tgl_awal']		= $r->offset;
		$data['tgl_akhir']		= $r->limit;
		
        $pdf = PDF::loadView('app.produksi.export-pdf', $data);
        return $pdf->setPaper('legal')->setOrientation('potrait')->setWarnings(false)->download('Data Produksi '.$profesi.'.pdf');
	}

}