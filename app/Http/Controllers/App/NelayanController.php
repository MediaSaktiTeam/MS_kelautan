<?php

namespace App\Http\Controllers\App;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use App\User, App\Kelompok, App\Jabatan, App\Usaha, App\Sarana, App\KepemilikanSarana;

class NelayanController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function getIndex()
	{
		$data['nelayan'] = User::where('profesi','Nelayan')->orderBy('id','desc')->get();
		$data['kelompok'] = Kelompok::where('tipe','nelayan')->get();
		$data['jabatan'] = Jabatan::all();
		return view ('app.nelayan.index',$data);
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

		$this->validate($r,[
				'nik' => 'required|unique:users',
				'no_kartu_nelayan' => 'required|unique:users',
				'id_sarana' => 'required',
			]);


		$name = $r->name;
		$username = str_slug($name,"-");

		$pb = new User;
		$pb->name       = $name;
		$pb->username   = $username;
		$pb->email      = $username."@mail.com";
		$pb->password   = bcrypt($username);
		$pb->nik        = $r->nik;
		$pb->no_kartu_nelayan  = $r->no_kartu_nelayan;
		$pb->alamat       = $r->alamat;
		$pb->id_kelompok  = $r->id_kelompok;
		$pb->id_jabatan   = $r->id_jabatan;
		$pb->profesi      = "Nelayan";

		$pb->save();

		$id = $pb->id;

		// Simpan sarana
		foreach ( $r->id_sarana as $val ){
			$record['id_sarana']  = $val; 
			$record['id_user']    = $id; 
			$records[] = $record;
		}

		DB::table('app_kepemilikan_sarana')->insert( $records );

		$r->session()->flash('success','Data tersimpan');

		return redirect(route('nelayan'));

	}

	public function getEdit($id)
	{
		$data['nelayan'] = User::find($id);
		$data['kelompok'] = Kelompok::where('tipe','nelayan')->get();
		$data['jabatan'] = Jabatan::all();
		return view('app.nelayan.sunting', $data);
	}

	public function postUpdate(Request $r)
	{
		$this->validate($r,[
				'nik' => 'required|unique:users,id,'.$r->id,
				'no_kartu_nelayan' => 'required|unique:users,id,'.$r->id,
				'id_sarana' => 'required',
			]);


		$name = $r->name;
		$username = str_slug($name,"-");

		$pb = User::find($r->id);
		$pb->name       = $name;
		$pb->username   = $username;
		$pb->password   = bcrypt($username);
		$pb->nik        = $r->nik;
		$pb->no_kartu_nelayan = $r->no_kartu_nelayan;
		$pb->alamat     = $r->alamat;
		$pb->id_kelompok  = $r->id_kelompok;
		$pb->id_jabatan   = $r->id_jabatan;

		$pb->save();

		$id = $r->id;

		// Hapus lalu simpan kembali
		KepemilikanSarana::where('id_user', $id)->delete();

		foreach ( $r->id_sarana as $val ){
			$record['id_sarana']  = $val; 
			$record['id_user']    = $id; 
			$records[] = $record;
		}

		DB::table('app_kepemilikan_sarana')->insert( $records );

		$r->session()->flash('success','Data tersimpan');

		return redirect(route('nelayan'));
	}

	public function getHapus(Request $r, $id)
	{
		$val = explode(",", $id);

		foreach ($val as $value) {
			User::where('id', $value)->delete();            
		}
		$r->session()->flash('success', 'Data terhapus');
		return redirect()->route('nelayan');
	}

	public function getDetail($id)
	{
		$data['nelayan'] = User::find($id);

		return view('app.nelayan.detail', $data);
	}

	public function getCari($cari = NULL)
	{
		$data['nelayan'] = DB::table('users')
									->leftJoin('app_kelompok', 'users.id_kelompok', '=', 'app_kelompok.id_kelompok')
									->leftJoin('app_jabatan', 'users.id_jabatan', '=', 'app_jabatan.id')
										->select(
											'app_jabatan.nama as nama_jabatan',
											'users.*',
											'app_kelompok.nama as nama_kelompok')
												->where('users.profesi','Nelayan')
												->where(function($query) use ($cari) {
													$query->where('users.name','LIKE', '%'.$cari.'%')
															->orWhere('app_kelompok.nama','LIKE', '%'.$cari.'%')
															->orWhere('app_jabatan.nama','LIKE', '%'.$cari.'%');
												})
									->take(40)->get();
		return view('app.nelayan.data-pencarian', $data);
	}

}