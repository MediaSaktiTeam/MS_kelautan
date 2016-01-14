<?php

namespace App\Http\Controllers\App;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User, Auth, Hash, Carbon\Carbon;

class PengaturanController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function getIndex()
	{
		$data['user'] = User::where('profesi', 'Admin')->first();
		return view ('app.pengaturan.index', $data);
	}

	public function getUpdate(Request $request)
	{

		$data = User::find($request->id);
		$data->name = $request->name;
		$data->username = $request->username;
		$data->save();
		$data['user'] = User::where('profesi', 'Admin')->first();

		$request->session()->flash('success', 'Berhasil menyimpan data');

		return redirect()->route('pengaturan', $data);
	}

	public function getUpdatePassword(Request $r)
	{
		$user = User::find(Auth::user()->id);

		$sandi_baru = bcrypt($r->sandi_baru);


		if ( Hash::check($r->sandi_lama, $user->password) ) 
		{
			$user->password = $sandi_baru;
			$user->tgl_password = Carbon::now('Asia/Ujung_Pandang');
			$user->save();

			$r->session()->flash('success', 'Berhasil mengubah kata sandi');
			return redirect()->route('pengaturan');
		} 
		else
		{
			$r->session()->flash('gagal', 'Gagal mengganti kata sandi, Kata sandi lama tidak sesuai');
			return redirect()->route('pengaturan');
		}
	}

}
