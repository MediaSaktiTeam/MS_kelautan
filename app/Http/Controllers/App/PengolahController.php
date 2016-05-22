<?php

namespace App\Http\Controllers\App;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB,Excel,PDF;
use App\User, App\Kelompok, App\Jabatan, App\Usaha, App\Sarana, App\KepemilikanSarana;
use App\RefBantuan, App\Permissions;

class PengolahController extends Controller
{

	public function __construct()
	{
		$this->middleware('Pengolah');
	}

	public function getIndex(Request $r)
	{
		if ( !isset( $r->offset ) || !isset( $r->limit ) ) {

			$sql = User::where('profesi', 'Pengolah')->orderBy('id', 'desc')->first();

			if ( $sql ) {
			// Jika sudah ada pengolah

				// limit = Tanggal terbaru
				// offset = Limit - 3 bulan
				$limit1 = date_format(date_create($sql->created_at), "Y-m-d");
				$limit = strtotime("$limit1 +1 day");
				$limit = date("Y-m-d", $limit);

				$offset = strtotime("$limit1 -3 months");
				$offset = date("Y-m-d", $offset);

			} else {
			// Jika belum ada data pengolah offset = tgl skrang, limit = offset + 3 bulan
				$offset = date('Y-m-d');
				$limit = strtotime("$offset +3 months");
				$limit = date("Y-m-d", $limit);
			}

			 return redirect( '/app/pengolah?offset='.$offset.'&limit='.$limit );
		}


		$pengolah = User::where('profesi','Pengolah')
								->whereBetween('created_at', [ $r->offset, $r->limit ])
								->orderBy('id','desc');

		$limit = 10;

		$data['pengolah'] = $pengolah->paginate($limit);
		$data['kelompok'] = Kelompok::where('tipe','Pengolah')->paginate($limit);
		$data['jabatan'] = Jabatan::paginate($limit);
		return view ('app.pengolah.index',$data)->with('limit', $limit);
	}

	public function postStore(Request $r)
	{
		/* Validasi */

			// Validasi NIK
			$vn = User::where('nik', $r->nik)->count();

			if ( $vn > 0 )
			{
				$r->session()->flash('error_nik', $r->nik);
				return redirect()->back()->withInput();
			}

			// Validasi Jabatan
			$vj = DB::table('users as u')
							->leftJoin('app_kelompok as ak', 'u.id_kelompok', '=', 'ak.id_kelompok')
							->leftJoin('app_jabatan as aj', 'u.id_jabatan', '=', 'aj.id')
								->select('u.name', 'ak.nama as nama_kelompok', 'aj.nama as nama_jabatan')
									->where('ak.id_kelompok', $r->id_kelompok)
									->where('u.id_jabatan', $r->id_jabatan)
									->where('aj.nama', '<>', "Anggota")
									->where('u.profesi', 'Pengolah')
										->first();
			if ( $vj ) {

				$r->session()->flash('gagal','GAGAL!!! Jabatan <b>'.$vj->nama_jabatan.'</b> pada kelompok <b>'.$vj->nama_kelompok.'</b> telah ada');

				return redirect()->back()->withInput();
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
		$pb->erte       = $r->erte;
		$pb->tlp        = $r->tlp;
		$pb->pos        = $r->pos;
		$pb->id_kelompok  = $r->id_kelompok;
		$pb->id_jabatan   = $r->id_jabatan;
		$pb->id_jenis_olahan    = $r->jenis_olahan;
		$pb->id_merek_dagang    = $r->merek_dagang;
		$pb->legalitas_produksi = $r->legalitas_produksi;
		$pb->modal_dimiliki 	= $r->modal_dimiliki;
		$pb->modal_pinjaman 	= $r->modal_pinjaman;
		$pb->omzet_perbulan 	= $r->omzet_perbulan;
		$pb->profesi 	= "Pengolah";

		$pb->save();

		$id = $pb->id;

		// Simpan role
		$role = new Permissions;
		$role->id_user = $id;
		$role->pengolah = 1;
		$role->save();

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

		return redirect()->back();
	}

	public function getEdit(Request $r, $id)
	{
		$data['pe'] = User::find($id);
		return view('app.pengolah.update', $data);
	}

	public function postUpdate(Request $r, $id)
	{
		/* Validasi */

			// Validasi NIK
			$vn = User::where('nik', $r->nik)->where('id', '<>', $id)->count();

			if ( $vn > 0 )
			{
				$r->session()->flash('error_nik', $r->nik);
				return redirect('/app/pengolah/edit/'. $id);
			}

			// Validasi Jabatan
			$vj = DB::table('users as u')
							->leftJoin('app_kelompok as ak', 'u.id_kelompok', '=', 'ak.id_kelompok')
							->leftJoin('app_jabatan as aj', 'u.id_jabatan', '=', 'aj.id')
								->select('u.name', 'ak.nama as nama_kelompok', 'aj.nama as nama_jabatan')
									->where('ak.id_kelompok', $r->id_kelompok)
									->where('u.id_jabatan', $r->id_jabatan)
									->where('aj.nama', '<>', "Anggota")
									->where('u.profesi', 'Pengolah')
									->where('u.id', '<>', $id)
									->first();
			if ( $vj ) {

				$r->session()->flash('gagal','GAGAL!!! Jabatan <b>'.$vj->nama_jabatan.'</b> pada kelompok <b>'.$vj->nama_kelompok.'</b> telah ada');

				return redirect(route('pengolah'))->withInput();
				exit;
			}
		/* end validasi */


		$pb = User::find($id);
		$pb->name       = $r->name;
		$pb->nik        = $r->nik;
		$pb->alamat     = $r->alamat;
		$pb->erte       = $r->erte;
		$pb->tlp        = $r->tlp;
		$pb->pos        = $r->pos;
		$pb->id_kelompok  = $r->id_kelompok;
		$pb->id_jabatan   = $r->id_jabatan;
		$pb->id_jenis_olahan    = $r->jenis_olahan;
		$pb->id_merek_dagang    = $r->merek_dagang;
		$pb->legalitas_produksi = $r->legalitas_produksi;
		$pb->modal_dimiliki 	= $r->modal_dimiliki;
		$pb->modal_pinjaman 	= $r->modal_pinjaman;
		$pb->omzet_perbulan 	= $r->omzet_perbulan;

		$pb->save();

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

		return redirect()->back();
	}

	public function getDetail($id)
	{
		$data['pengolah'] = User::find($id);

		return view('app.pengolah.detail', $data);
	}

	public function getSearch($cari = NULL)
	{
		$data['pengolah'] = DB::table('users')
									->leftJoin('app_kelompok', 'users.id_kelompok', '=', 'app_kelompok.id_kelompok')
									->leftJoin('app_jabatan', 'users.id_jabatan', '=', 'app_jabatan.id')
									->leftJoin('app_jenisolahan', 'users.id_jenis_olahan', '=', 'app_jenisolahan.id')
									->leftJoin('app_merekdagang', 'users.id_merek_dagang', '=', 'app_merekdagang.id')
										->select(
											'app_jabatan.nama as nama_jabatan',
											'users.*', 'app_jenisolahan.jenis as jenis_olahan',
											'app_kelompok.nama as nama_kelompok')
												->where('users.profesi','Pengolah')
												->where(function($query) use ($cari) {
													$query->where('users.name','LIKE', '%'.$cari.'%')
															->orWhere('app_kelompok.nama','LIKE', '%'.$cari.'%')
															->orWhere('app_jabatan.nama','LIKE', '%'.$cari.'%');
												})
									->take(40)->get();
		return view('app.pengolah.search', $data);
	}
	public function getHapus(Request $r, $id)
	{
		$val = explode(",", $id);

		foreach ($val as $value) {
			User::where('id', $value)->delete();            
			KepemilikanSarana::where('id_user', $value)->delete();   
		}


		$r->session()->flash('success', 'Data terhapus');
		return redirect()->route('pengolah');
	}

	public function getExportExcel(Request $r)
	{
		$pengolah 	= User::where('profesi','Pengolah')
								->whereBetween('created_at', [ $r->offset, $r->limit ])
								->orderBy('id','desc');
		$data['pengolah'] = $pengolah->get();
		$data['kelompok'] = Kelompok::where('tipe','pengolah')->get();
		$data['jabatan'] = Jabatan::all();

        Excel::create('Data Pengolah');

        Excel::create('Data Pengolah', function($excel) use($data)
        {
            
            $excel->sheet('New sheet', function($sheet) use($data)
            {
                $sheet->loadView('app.pengolah.export-excel', $data);
            }); 
        })->download('xlsx');
	}

	public function getExportPdf(Request $r)
	{
		$pengolah 	= User::where('profesi','Pengolah')
								->whereBetween('created_at', [ $r->offset, $r->limit ])
								->orderBy('id','desc');
		$data['pengolah'] = $pengolah->get();
		$data['kelompok'] = Kelompok::where('tipe','pengolah')->get();
		$data['jabatan'] = Jabatan::all();
		$data['tgl_awal']		= $r->offset;
		$data['tgl_akhir']		= $r->limit;
		
        $pdf = PDF::loadView('app.pengolah.export-pdf', $data);
        return $pdf->setPaper('legal')->setOrientation('landscape')->setWarnings(false)->download('Data Pengolah.pdf');
	}

}