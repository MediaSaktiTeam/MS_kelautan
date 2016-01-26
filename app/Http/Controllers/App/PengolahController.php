<?php

namespace App\Http\Controllers\App;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB,Excel,PDF;
use App\User, App\Kelompok, App\Jabatan, App\Usaha, App\Sarana, App\KepemilikanSarana;
use App\RefBantuan;

class PengolahController extends Controller
{

	public function __construct()
	{
		$this->middleware('Pengolah');
	}

	public function getIndex()
	{
		$data['pengolah'] = User::where('profesi','Pengolah')->orderBy('id','desc')->get();
		$data['kelompok'] = Kelompok::where('tipe','Pengolah')->get();
		$data['jabatan'] = Jabatan::all();
		return view ('app.pengolah.index',$data);
	}

	public function postStore(Request $r)
	{
		/* Validasi */

			$this->validate($r,[
					'nik' => 'required|unique:users',
				]);

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

				return redirect(route('pengolah'))->withInput();
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
		$pb->id_jenis_olahan    = $r->id_jenis_olahan;
		$pb->legalitas_produksi = $r->legalitas_produksi;
		$pb->modal_dimiliki 	= $r->modal_dimiliki;
		$pb->modal_pinjaman 	= $r->modal_pinjaman;
		$pb->omzet_perbulan 	= $r->omzet_perbulan;

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

		return redirect(route('pengolah'));
	}

	public function getEdit(Request $r, $id)
	{

	}

	public function postUpdate()
	{

	}

	public function getHapus($id)
	{

	}

}