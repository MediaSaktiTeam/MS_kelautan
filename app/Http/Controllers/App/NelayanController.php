<?php

namespace App\Http\Controllers\App;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB,Excel,PDF;
use App\User, App\Kelompok, App\Jabatan, App\Usaha, App\Sarana, App\KepemilikanSarana;
use App\RefBantuan;
use App\Permissions;

class NelayanController extends Controller
{
	
	public function __construct()
	{
		$this->middleware('Nelayan');
	}

	public function getIndex()
	{
		$data['nelayan'] = User::where('profesi','Nelayan')->orderBy('id','desc')->paginate(10);
		$data['kelompok'] = Kelompok::where('tipe','nelayan')->paginate(10);
		$data['jabatan'] = Jabatan::paginate(10);
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
			]);
		
		// Validasi Jabatan
		$vj = DB::table('users as u')
						->leftJoin('app_kelompok as ak', 'u.id_kelompok', '=', 'ak.id_kelompok')
						->leftJoin('app_jabatan as aj', 'u.id_jabatan', '=', 'aj.id')
							->select('u.name', 'ak.nama as nama_kelompok', 'aj.nama as nama_jabatan')
								->where('ak.id_kelompok', $r->id_kelompok)
								->where('u.id_jabatan', $r->id_jabatan)
								->where('aj.nama', '<>', "Anggota")
								->where('u.profesi', 'Nelayan')
									->first();
		if ( $vj ) {

			$r->session()->flash('gagal','GAGAL!!! Jabatan <b>'.$vj->nama_jabatan.'</b> pada kelompok <b>'.$vj->nama_kelompok.'</b> telah ada');

			return redirect(route('nelayan'))->withInput();
			exit;
		}


		$pb = new User;
		$pb->name       = $r->name;
		$pb->username   = $r->nik;
		$pb->email      = $r->nik."@mail.com";
		$pb->password   = bcrypt($r->nik);
		$pb->nik        = $r->nik;
		$pb->no_kartu_nelayan  = $r->no_kartu_nelayan;
		$pb->alamat       = $r->alamat;
		$pb->id_kelompok  = $r->id_kelompok;
		$pb->id_jabatan   = $r->id_jabatan;
		$pb->profesi      = "Nelayan";

		$pb->save();

		$id = $pb->id;

		// Simpan sarana
		if ( $r->id_sarana ) {
			foreach ( $r->id_sarana as $val ){
				$record['id_sarana']  = $val; 
				$record['id_user']    = $id; 
				$records[] = $record;
			}

			DB::table('app_kepemilikan_sarana')->insert( $records );
		}

		$r->session()->flash('success','Data tersimpan');

		return redirect(route('nelayan'));

	}

	public function getEdit($id)
	{
		$data['nelayan'] = User::find($id);
		$data['kelompok'] = Kelompok::where('tipe','nelayan')->get();
		$data['jabatan'] = Jabatan::all();
		return view('app.nelayan.update', $data);
	}

	public function postUpdate(Request $r)
	{
		$this->validate($r,[
				'nik' => 'required|unique:users,id,'.$r->id,
				'no_kartu_nelayan' => 'required|unique:users,id,'.$r->id,
			]);

		// Validasi Jabatan
		$vj = DB::table('users as u')
						->leftJoin('app_kelompok as ak', 'u.id_kelompok', '=', 'ak.id_kelompok')
						->leftJoin('app_jabatan as aj', 'u.id_jabatan', '=', 'aj.id')
							->select('u.name', 'ak.nama as nama_kelompok', 'aj.nama as nama_jabatan')
								->where('ak.id_kelompok', $r->id_kelompok)
								->where('u.id_jabatan', $r->id_jabatan)
								->where('aj.nama', '<>', "Anggota")
								->where('u.profesi', 'Nelayan')
								->where('u.id', '<>', $r->id)
									->first();
		if ( $vj ) {

			$r->session()->flash('gagal','GAGAL!!! Jabatan <b>'.$vj->nama_jabatan.'</b> pada kelompok <b>'.$vj->nama_kelompok.'</b> telah ada');

			return redirect(route('nelayan_edit', $r->id));
			exit;

		}


		$pb = User::find($r->id);
		$pb->name       = $r->name;
		$pb->username   = $r->nik;
		$pb->password   = bcrypt($r->nik);
		$pb->nik        = $r->nik;
		$pb->no_kartu_nelayan = $r->no_kartu_nelayan;
		$pb->alamat     = $r->alamat;
		$pb->id_kelompok  = $r->id_kelompok;
		$pb->id_jabatan   = $r->id_jabatan;

		$pb->save();

		$id = $r->id;


		if ( $r->id_sarana ) {

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

		return redirect(route('nelayan'));
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

	public function getExportExcel()
	{
		$data['nelayan'] = User::where('profesi','Nelayan')->orderBy('id','desc')->get();
		$data['kelompok'] = Kelompok::where('tipe','nelayan')->get();
		$data['jabatan'] = Jabatan::all();

        Excel::create('Data Nelayan');

        Excel::create('Data Nelayan', function($excel) use($data)
        {
            
            $excel->sheet('New sheet', function($sheet) use($data)
            {
                $sheet->loadView('app.nelayan.export-excel', $data);
            }); 
        })->download('xlsx');
	}

	public function getExportPdf()
	{
		$data['nelayan'] = User::where('profesi','Nelayan')->orderBy('id','desc')->get();
		$data['kelompok'] = Kelompok::where('tipe','nelayan')->get();
		$data['jabatan'] = Jabatan::all();
		
        $pdf = PDF::loadView('app.nelayan.export-pdf', $data);
        return $pdf->setPaper('legal')->setOrientation('landscape')->setWarnings(false)->download('Data Nelayan.pdf');
	}
}