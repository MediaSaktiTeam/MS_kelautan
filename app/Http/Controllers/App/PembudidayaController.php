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
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function getIndex()
	{
		$data['pembudidaya'] = User::where('profesi','Pembudidaya')->orderBy('id','desc')->get();
		$data['kelompok'] = Kelompok::where('tipe','Pembudidaya')->get();
		$data['jabatan'] = Jabatan::all();
		return view ('app.pembudidaya.index',$data);
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
		$pb->alamat     = $r->alamat;
		$pb->id_kelompok  = $r->id_kelompok;
		$pb->id_jabatan   = $r->id_jabatan;
		$pb->id_usaha     = $r->id_usaha;

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

		return redirect(route('pembudidaya'));

	}

	public function getEdit($id)
	{
		$data['kelompok'] = Kelompok::where('tipe','Pembudidaya')->get();
		$data['jabatan'] = Jabatan::all();
		$data['sarana'] = Sarana::where('jenis','Budidaya Air laut')->where('tipe','Pembudidaya')->get();
		$data['pembudidaya'] = User::find($id);
		return view('app.pembudidaya.sunting', $data);
	}

	public function postUpdate(Request $r)
	{
		$this->validate($r,[
				'nik' => 'required|unique:users,id,'.$r->id,
				'id_sarana' => 'required',
			]);


		$name = $r->name;
		$username = str_slug($name,"-");

		$pb = User::find($r->id);
		$pb->name       = $name;
		$pb->username   = $username;
		$pb->password   = bcrypt($username);
		$pb->nik        = $r->nik;
		$pb->alamat     = $r->alamat;
		$pb->id_kelompok  = $r->id_kelompok;
		$pb->id_jabatan   = $r->id_jabatan;
		$pb->id_usaha     = $r->id_usaha;

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

		return redirect(route('pembudidaya'));
	}

	public function getHapus(Request $r, $id)
	{
		$val = explode(",", $id);

		foreach ($val as $value) {
			User::where('id', $value)->delete();            
			RefBantuan::where('id_user', $value)->delete();     
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

	public function getExportExcel()
	{
		$data['pembudidaya'] 	= User::where('profesi','Pembudidaya')->orderBy('id','desc')->get();
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

	public function getExportPdf()
	{
		$data['pembudidaya'] 	= User::where('profesi','Pembudidaya')->orderBy('id','desc')->get();
		$data['kelompok'] 		= Kelompok::where('tipe','Pembudidaya')->get();
		$data['jabatan'] 		= Jabatan::all();
		
        $pdf = PDF::loadView('app.pembudidaya.export-pdf', $data);
        return $pdf->setPaper('legal')->setOrientation('landscape')->setWarnings(false)->download('Data Pembudidaya.pdf');
	}

}