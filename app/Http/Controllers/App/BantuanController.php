<?php

namespace App\Http\Controllers\App;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Bantuan;

class BantuanController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	 public function getIndex()
	{
		$data['bantuan'] = Bantuan::paginate(10);
		return view('app.master.bantuan', $data);
	}

	public function getTambah(Request $request)
	{

		/* Validasi */

			$this->validate($request,[
					'nama' => 'required',
					'jenis' => 'required',
				]);

			$vb	=	Bantuan::where('nama',$request->nama)->where('jenis',$request->jenis)->count();

			if ($vb > 0 ) {
				return redirect()->route('bantuan');
			}
		/* end validasi */

		$dt = new Bantuan;
		$dt->nama = $request->nama;
		$dt->jenis = $request->jenis;
		$dt->save();
		return redirect()->route('bantuan');
	}

	public function getHapus($id){

		$val = explode(",", $id);

		foreach ($val as $value) {
			Bantuan::where('id', $value)->delete();            
		}
		return redirect()->route('bantuan');
	}

	public function getUpdate(Request $request)
	{

		$data = Bantuan::find($request->id);
		$data->jenis = $request->jenis;
		$data->nama = $request->nama;
		$data->save();
		$data['bantuan'] = Bantuan::paginate(1);

		return redirect()->route('bantuan', $data);
	}

}
