<?php

namespace App\Http\Controllers\App;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB, App\User, App\Permissions;

class AdministratorController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */

	 public function getIndex()
	{
		$limit = 10;
		$data['users'] = DB::table('users as u')
								->join('permissions as p', 'p.id_user', '=', 'u.id')
								->select('u.*')
								->where('p.pembudidaya', 1)
								->orWhere('p.nelayan', 1)
								->orWhere('p.pengolah', 1)
								->orWhere('p.pesisir', 1)->paginate($limit);
								
		return view('app.administrator.index', $data)->with('limit', $limit);
	}

	public function postTambah(Request $r)
	{

		$this->validate($r, [
				'username' => 'required|unique:users'
			]);

		$nelayan 		= $r->nelayan 		== 'on' ? 1 : 0;
		$pembudidaya 	= $r->pembudidaya 	== 'on' ? 1 : 0;
		$pengolah 		= $r->pengolah 		== 'on' ? 1 : 0;
		$pesisir 		= $r->pesisir 		== 'on' ? 1 : 0;

		$data = new User;
		$data->username = $r->username;
		$data->name 	= $r->username;
		$data->email 	= $r->username."@mail.com";
		$data->password = bcrypt('12345');
		$data->profesi 	= 'Admin';
		$data->save();

		$id = $data->id;

		$data = new Permissions;
		$data->id_user = $id;
		$data->pembudidaya = $pembudidaya;
		$data->nelayan = $nelayan;
		$data->pengolah = $pengolah;
		$data->pesisir = $pesisir;
		$data->save();

		$r->session()->flash('success', 'Berhasil menyimpan data');

		return redirect()->route('administrator');
	}

	public function postUpdate(Request $r)
	{

		$this->validate($r, [
				'username' => 'required|unique:users,id,'.$r->id.'|min:2'
			]);

		$nelayan 		= $r->nelayan 		== 'on' ? 1 : 0;
		$pembudidaya 	= $r->pembudidaya 	== 'on' ? 1 : 0;
		$pengolah 		= $r->pengolah 		== 'on' ? 1 : 0;
		$pesisir 		= $r->pesisir 		== 'on' ? 1 : 0;

		$data = User::find($r->id);
		$data->username = $r->username;
		$data->save();

		Permissions::where('id_user', $r->id)->delete();

		$data = new Permissions;
		$data->id_user = $r->id;
		$data->pembudidaya = $pembudidaya;
		$data->nelayan = $nelayan;
		$data->pengolah = $pengolah;
		$data->pesisir = $pesisir;
		$data->save();

		$r->session()->flash('success', 'Berhasil menyimpan data');

		return redirect()->route('administrator');
	}

	public function getHapus(Request $r, $id)
	{
		$val = explode(",", $id);

		foreach ($val as $value) {
			User::where('id', $value)->delete();
		}


		$r->session()->flash('success', 'Data terhapus');
		return redirect()->route('administrator');
	}

	public function getEdit($id)
	{
		$data['user'] = User::find($id);
		$data['role'] = Permissions::where('id_user', $id)->first();
		return view('app.administrator.edit', $data);
	}

	public function getUpdate(Request $request)
	{

	}

}