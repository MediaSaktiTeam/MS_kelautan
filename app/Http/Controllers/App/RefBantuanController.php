<?php

namespace App\Http\Controllers\App;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\RefBantuan, App\User, App\Bantuan;
use DB,Excel,PDF,Permissions;

class RefBantuanController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	 public function getIndex(Request $r)
	{

		$params = \Input::all();
		if ( count($params) != 3 ) {
			$params = ['bidang' => 'all',
						'thn' => 'all',
						'klp' => 'all'];
			return redirect()->route('ref_bantuan', $params);
		}

		$limit = 10;
		if ( Permissions::admin() ) {
			$profesi = ['Pembudidaya','Nelayan'];
		} else {
			$profesi = [Permissions::pnp_role()];
		}

		$data['users'] = DB::table('users as u')
							->leftJoin('app_kelompok as ak', 'u.id_kelompok', '=', 'ak.id_kelompok')
							->select('u.*', 'ak.nama as nama_kelompok')
								->whereIn('u.profesi', $profesi)
								->orderBy('ak.nama', 'asc')->get();

		$bantuan_users = DB::table('app_bantuan as ab')
							->leftJoin('users as u', 'u.id', '=', 'ab.id_user')
							->leftJoin('app_kelompok as ak', 'u.id_kelompok', '=', 'ak.id_kelompok')
							->select('u.*','ak.nama as nama_kelompok', 'ab.tahun as tahun_bantuan', 'ab.nama_program')
								->whereIn('u.profesi', $profesi)
								->orderBy('ab.id', 'desc')
								->orderBy('ab.id_user', 'desc')
								->orderBy('ab.tahun', 'desc');

		if ( $r->thn != 'all') $bantuan_users->where('ab.tahun', $r->thn);
		if ( $r->klp != 'all') $bantuan_users->where('ak.id_kelompok', $r->klp);
		if ( $r->bidang != 'all') $bantuan_users->where('u.profesi', $r->bidang);

		$data['bantuan_users'] = $bantuan_users->paginate($limit);

		return view('app.bantuan.index', $data)->with('limit', $limit);
	}

	public function postSimpan(Request $request)
	{

		$cek = RefBantuan::where('id_user', $request->id_user)
							->where('tahun', $request->tahun)
							->count();

		if ( $cek > 0 ) {
			$request->session()->flash('gagal','GAGAL!!! - Orang ini telah mendapatkan bantuan pada tahun yang sama');
			return redirect()->route('ref_bantuan');
			exit;
		}

		foreach( $request->id_bantuan as $val ) {
			$dt = new RefBantuan;
			$dt->id_user = $request->id_user;   
			$dt->id_bantuan = $val;
			$dt->tahun = $request->tahun;
			$dt->save();   
		}

		$request->session()->flash('success','Berhasil menyimpan data');
		return redirect()->route('ref_bantuan');
	}

	public function getEdit($id, $tahun)
	{
		$data['user'] = DB::table('app_bantuan as ab')
							->leftJoin('users as u', 'u.id', '=', 'ab.id_user')
							->select('u.*', 'ab.tahun as tahun_bantuan', 'ab.nama_program')
								->where('ab.id_user', $id)
								->where('ab.tahun', $tahun)
								->groupBy('ab.id_user')->first();

		return view('app.bantuan.update', $data);
	}

	public function postUpdate(Request $r)
	{

		RefBantuan::where('id_user', $r->id)
					->where('tahun', $r->tahun_edit)
					->delete();

		$user = User::find($r->id);

		foreach( $r->id_bantuan as $val ) {
			$dt = new RefBantuan;
			$dt->id_user = $r->id;   
			$dt->id_bantuan = $val;
			$dt->tahun = $r->tahun_update;
			$dt->nama_program = $r->nama_program;
			$dt->save();   
		}

		$r->session()->flash('success','Berhasil menyimpan data');

		return redirect()->route('ref_bantuan');
	}

	public function getHapus(Request $r, $data){

		$val = explode(",", $data);

		foreach ($val as $v) {

			$value      = explode("|", $v);
			$id_user    = $value[0];
			$thn        = $value[1];

			RefBantuan::where('id_user', $id_user)
						->where('tahun', $thn)
						->delete();           
		}

		$r->session()->flash('success','Berhasil menghapus data');
		return redirect()->route('ref_bantuan');
	}

	public function getCari($cari)
	{

		$data['bantuan_users'] = DB::table('app_bantuan as ab')
							->leftJoin('users as u', 'u.id', '=', 'ab.id_user')
							->leftJoin('app_kelompok as ak', 'u.id_kelompok', '=', 'ak.id_kelompok')
							->select('u.*','ak.nama as nama_kelompok', 'ab.tahun as tahun_bantuan')
								->where('u.profesi', '<>', 'Admin')
								->where('u.name', 'LIKE', '%'. $cari .'%')
								->orderBy('ab.id', 'desc')
								->orderBy('ab.id_user', 'desc')
								->orderBy('ab.tahun', 'desc')
								->get();

		return view('app.bantuan.cari', $data);
	}

	public function getDataPreview($id)
	{
		$data['user'] = DB::table('users as u')
							->leftJoin('app_kelompok as ak', 'u.id_kelompok', '=', 'ak.id_kelompok')
							->select('u.*', 'ak.nama as nama_kelompok')
								->where('u.profesi','<>','Admin')
								->where('u.id', $id)
								->first();
		return view('app.bantuan.data-preview', $data);
	}

	public function getListBantuan($id)
	{
		$user = User::find($id);
		$data['bantuan'] = Bantuan::where('jenis', $user->profesi)->get();

		return view('app.bantuan.list-bantuan', $data); 
	}

	public function getExportExcel(Request $r)
	{
		$data['users'] = DB::table('users as u')
							->leftJoin('app_kelompok as ak', 'u.id_kelompok', '=', 'ak.id_kelompok')
							->select('u.*', 'ak.nama as nama_kelompok')
								->whereIn('u.profesi', ['Pembudidaya','Nelayan'])
								->orderBy('ak.nama', 'asc')->get();

		$bantuan_users = DB::table('app_bantuan as ab')
							->leftJoin('users as u', 'u.id', '=', 'ab.id_user')
							->leftJoin('app_kelompok as ak', 'u.id_kelompok', '=', 'ak.id_kelompok')
							->select('u.*','ak.nama as nama_kelompok', 'ab.tahun as tahun_bantuan', 'ab.nama_program')
								->whereIn('u.profesi', ['Pembudidaya','Nelayan'])
								->orderBy('ab.id', 'desc')
								->orderBy('ab.id_user', 'desc')
								->orderBy('ab.tahun', 'desc');

		if ( $r->thn != 'all') $bantuan_users->where('ab.tahun', $r->thn);
		if ( $r->klp != 'all') $bantuan_users->where('ak.id_kelompok', $r->klp);
		if ( $r->bidang != 'all') $bantuan_users->where('u.profesi', $r->bidang);

		$data['bantuan_users'] = $bantuan_users->get();

        Excel::create('Data Bantuan');

        Excel::create('Data Bantuan', function($excel) use($data)
        {
            
            $excel->sheet('New sheet', function($sheet) use($data)
            {
                $sheet->loadView('app.bantuan.export-excel', $data);
            }); 
        })->download('xlsx');
	}

	public function getExportPdf(Request $r)
	{
		$data['users'] = DB::table('users as u')
							->leftJoin('app_kelompok as ak', 'u.id_kelompok', '=', 'ak.id_kelompok')
							->select('u.*', 'ak.nama as nama_kelompok')
								->whereIn('u.profesi', ['Pembudidaya','Nelayan'])
								->orderBy('ak.nama', 'asc')->get();

		$bantuan_users = DB::table('app_bantuan as ab')
							->leftJoin('users as u', 'u.id', '=', 'ab.id_user')
							->leftJoin('app_kelompok as ak', 'u.id_kelompok', '=', 'ak.id_kelompok')
							->select('u.*','ak.nama as nama_kelompok', 'ab.tahun as tahun_bantuan', 'ab.nama_program')
								->whereIn('u.profesi', ['Pembudidaya','Nelayan'])
								->orderBy('ab.id', 'desc')
								->orderBy('ab.id_user', 'desc')
								->orderBy('ab.tahun', 'desc');

		if ( $r->thn != 'all') $bantuan_users->where('ab.tahun', $r->thn);
		if ( $r->klp != 'all') $bantuan_users->where('ak.id_kelompok', $r->klp);
		if ( $r->bidang != 'all') $bantuan_users->where('u.profesi', $r->bidang);

		$data['bantuan_users'] = $bantuan_users->get();
		
        $pdf = PDF::loadView('app.bantuan.export-pdf', $data);
        return $pdf->setPaper('legal')->setOrientation('landscape')->setWarnings(false)->download('Data Bantuan.pdf');
	}

}