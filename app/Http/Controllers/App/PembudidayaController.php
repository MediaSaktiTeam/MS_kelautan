<?php

namespace App\Http\Controllers\App;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB,Excel,PDF;
use App\User, App\Kelompok, App\Jabatan, App\Usaha, App\Sarana, App\KepemilikanSarana;
use App\RefBantuan;

class PembudidayaController extends Controller
{
	public function __construct()
	{
		$this->middleware('Pembudidaya');
	}

	public function getIndex(Request $r)
	{

		if ( !isset( $r->f ) ) return redirect()->route('pembudidaya', ['f' => '']);

		$pembudidaya = User::where('profesi','Pembudidaya')->orderBy('id','desc');

		if ( $r->f != "" ) $pembudidaya->where('jenis_usaha', $r->f);

		$data['pembudidaya'] = $pembudidaya->paginate(10);

		$data['kelompok'] = Kelompok::where('tipe','Pembudidaya')->paginate(10);
		
		$limit = 10;
		$data['jabatan'] = Jabatan::paginate($limit);
		return view ('app.pembudidaya.index',$data)->with('limit', $limit);
	}

	 public function getTambah(Request $request)
	{
		$data['jabatan'] = Jabatan::paginate(10);
		$dt = new Jabatan;
		$dt->nama = $request->nama;
		$dt->save();
		return redirect()->route('jabatan', $data);
	}

	public function postSimpan(Request $r)
	{

		/* Validasi */

			// Validasi NIK
			$vn = User::where('nik', $r->nik)->count();

			if ( $vn > 0 )
			{
				$r->session()->flash('error_nik', $r->nik);
				return redirect(route('pembudidaya'))->withInput();
			}

			// Validasi Jabatan
			$vj = DB::table('users as u')
							->leftJoin('app_kelompok as ak', 'u.id_kelompok', '=', 'ak.id_kelompok')
							->leftJoin('app_jabatan as aj', 'u.id_jabatan', '=', 'aj.id')
								->select('u.name', 'ak.nama as nama_kelompok', 'aj.nama as nama_jabatan')
									->where('ak.id_kelompok', $r->id_kelompok)
									->where('u.id_jabatan', $r->id_jabatan)
									->where('aj.nama', '<>', "Anggota")
									->where('u.profesi', 'Pembudidaya')
										->first();
			if ( $vj ) {

				$r->session()->flash('gagal','GAGAL!!! Jabatan <b>'.$vj->nama_jabatan.'</b> pada kelompok <b>'.$vj->nama_kelompok.'</b> telah ada');

				return redirect(route('pembudidaya'))->withInput();
				exit;
			}
		/* end validasi */


		$pb = new User;
		$pb->name       = $r->name;
		$pb->username   = $r->nik;
		$pb->email      = $r->nik."@mail.com";
		$pb->password   = bcrypt($r->nik);
		$pb->nik        = $r->nik;
		$pb->alamat     = $r->alamat;
		$pb->id_kelompok  = $r->id_kelompok;
		$pb->id_jabatan   = $r->id_jabatan;
		$pb->id_usaha     = $r->id_usaha;
		$pb->jenis_usaha     = $r->jenis_usaha;

		$pb->save();

		$id = $pb->id;

		// Simpan sarana
		if( $r->id_sarana ) {
			foreach ( $r->id_sarana as $val ){
				$record['id_sarana']  = $val; 
				$record['id_user']    = $id; 
				$records[] = $record;
			}

			DB::table('app_kepemilikan_sarana')->insert( $records );
		}

		$r->session()->flash('success','Data tersimpan');

		return redirect(route('pembudidaya'));

	}

	public function getEdit($id)
	{
		$data['kelompok'] = Kelompok::where('tipe','Pembudidaya')->get();
		$data['jabatan'] = Jabatan::all();
		$data['sarana'] = Sarana::where('jenis','Budidaya Air laut')->where('tipe','Pembudidaya')->get();
		$data['pembudidaya'] = User::find($id);
		return view('app.pembudidaya.update', $data);
	}

	public function postUpdate(Request $r)
	{
		// Validasi NIK
		$vn = User::where('nik', $r->nik)->where('id', '<>', $r->id)->count();

		if ( $vn > 0 )
		{
			$r->session()->flash('error_nik', $r->nik);
			return redirect('/app/pembudidaya/edit/'. $r->id);
		}
			
		// Validasi Jabatan
		$vj = DB::table('users as u')
						->leftJoin('app_kelompok as ak', 'u.id_kelompok', '=', 'ak.id_kelompok')
						->leftJoin('app_jabatan as aj', 'u.id_jabatan', '=', 'aj.id')
							->select('u.name', 'ak.nama as nama_kelompok', 'aj.nama as nama_jabatan')
								->where('ak.id_kelompok', $r->id_kelompok)
								->where('u.id_jabatan', $r->id_jabatan)
								->where('aj.nama', '<>', "Anggota")
								->where('u.profesi', 'Pembudidaya')
								->where('u.id', '<>', $r->id)
									->first();
		if ( $vj ) {

			$r->session()->flash('gagal','GAGAL!!! Jabatan <b>'.$vj->nama_jabatan.'</b> pada kelompok <b>'.$vj->nama_kelompok.'</b> telah ada');

			return redirect(route('pembudidaya_edit', $r->id));
			exit;

		}

		$pb = User::find($r->id);
		$pb->name       = $r->name;
		$pb->username   = $r->nik;
		$pb->password   = bcrypt($r->nik);
		$pb->nik        = $r->nik;
		$pb->alamat     = $r->alamat;
		$pb->id_kelompok  = $r->id_kelompok;
		$pb->id_jabatan   = $r->id_jabatan;
		$pb->id_usaha     = $r->id_usaha;

		$pb->save();

		$id = $r->id;

		if( $r->id_sarana ) {

			// Hapus lalu simpan kembali
			KepemilikanSarana::where('id_user', $id)->delete();

			foreach ( $r->id_sarana as $val ){
				$record['id_sarana']  = $val; 
				$record['id_user']    = $id; 
				$records[] = $record;
			}

			DB::table('app_kepemilikan_sarana')->insert( $records );
		}

		$r->session()->flash('success','Data tersimpan');

		return redirect(route('pembudidaya'));
	}

	public function getHapus(Request $r, $id)
	{
		$val = explode(",", $id);

		foreach ($val as $value) {
			User::where('id', $value)->delete();
			RefBantuan::where('id_user', $value)->delete();
			KepemilikanSarana::where('id_user', $value)->delete();
		}


		$r->session()->flash('success', 'Data terhapus');
		return redirect()->route('pembudidaya');
	}

	public function getDetail($id)
	{
		$data['pembudidaya'] = User::find($id);

		return view('app.pembudidaya.detail', $data);
	}

	public function getUsaha($jenis)
	{
		$data['usaha'] = Usaha::where('jenis', $jenis)->get();
		return view('app.pembudidaya.data-usaha', $data);
	}

	public function getSarana($jenis)
	{
		$data['sarana'] = Sarana::where('jenis', $jenis)->where('tipe', 'Pembudidaya')->get();
		return view('app.pembudidaya.data-sarana', $data);
	}

	public function getCari($cari = NULL)
	{
		$data['pembudidaya'] = DB::table('users')
									->leftJoin('app_kelompok', 'users.id_kelompok', '=', 'app_kelompok.id_kelompok')
									->leftJoin('app_usaha', 'users.id_usaha', '=', 'app_usaha.id')
									->leftJoin('app_jabatan', 'users.id_jabatan', '=', 'app_jabatan.id')
										->select(
											'app_jabatan.nama as nama_jabatan',
											'users.*', 'app_usaha.jenis as jenis_usaha',
											'app_kelompok.nama as nama_kelompok')
												->where('users.profesi','Pembudidaya')
												->where(function($query) use ($cari) {
													$query->where('users.name','LIKE', '%'.$cari.'%')
															->orWhere('app_kelompok.nama','LIKE', '%'.$cari.'%')
															->orWhere('app_jabatan.nama','LIKE', '%'.$cari.'%')
															->orWhere('app_usaha.nama','LIKE', '%'.$cari.'%')
															->orWhere('app_usaha.jenis','LIKE', '%'.$cari.'%');
												})
									->take(40)->get();
		return view('app.pembudidaya.data-pencarian', $data);
	}

	public function getPrintAll()
	{
		$data['pembudidaya'] = DB::table('users')
									->leftJoin('app_kelompok', 'users.id_kelompok', '=', 'app_kelompok.id_kelompok')
									->leftJoin('app_usaha', 'users.id_usaha', '=', 'app_usaha.id')
									->leftJoin('app_jabatan', 'users.id_jabatan', '=', 'app_jabatan.id')
										->select(
											'app_jabatan.nama as nama_jabatan',
											'users.*', 'app_usaha.jenis as jenis_usaha',
											'app_kelompok.nama as nama_kelompok')
												->where('users.profesi','Pembudidaya')
									->orderBy('app_kelompok.nama','asc')
									->orderBy('app_jabatan.id','asc')
									->get();
		return view('app.pembudidaya.print-all', $data);
	}

	public function getExportExcel(Request $r)
	{
		$pembudidaya 	= User::where('profesi','Pembudidaya')->orderBy('id','desc');

		if ( $r->f != "" ) $pembudidaya->where('jenis_usaha', $r->f);

		$data['pembudidaya'] = $pembudidaya->get();

		$data['kelompok'] 		= Kelompok::where('tipe','Pembudidaya')->get();
		$data['jabatan'] 		= Jabatan::all();

        Excel::create('Data Pembudidaya');

        Excel::create('Data Pembudidaya', function($excel) use($data)
        {
            
            $excel->sheet('New sheet', function($sheet) use($data)
            {
                $sheet->loadView('app.pembudidaya.export-excel', $data);
            }); 
        })->download('xlsx');
	}

	public function getExportPdf(Request $r)
	{
		$pembudidaya 	= User::where('profesi','Pembudidaya')->orderBy('id','desc');

		if ( $r->f != "" ) $pembudidaya->where('jenis_usaha', $r->f);

		$data['pembudidaya'] = $pembudidaya->get();

		$data['kelompok'] 		= Kelompok::where('tipe','Pembudidaya')->get();
		$data['jabatan'] 		= Jabatan::all();
		
        $pdf = PDF::loadView('app.pembudidaya.export-pdf', $data);
        return $pdf->setPaper('legal')->setOrientation('landscape')->setWarnings(false)->download('Data Pembudidaya.pdf');
	}

}