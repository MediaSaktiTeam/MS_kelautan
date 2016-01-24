<?php

namespace App\Http\Controllers\App;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\MerekDagang;

class MerekDagangController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function getIndex()
	{
		$data['MerekDagang'] = MerekDagang::paginate(10);
		return view ('app.master.merekdagang',$data);
	}

	public function getTambah(Request $request)
	{
		$data['MerekDagang'] = MerekDagang::paginate(10);
		
		/* Validasi */

			$this->validate($request,[
					'merek' => 'required',
				]);
			$md	=	MerekDagang::where('merek',$request->merek)->count();
			if ($md > 0 ) {
				return redirect()->route('merekdagang')->with(session()->flash('gagal','Data Sudah ada !!'));
			}
		/* end validasi */

		$dt = new MerekDagang;
		$dt->merek = $request->merek;
		$dt->save();
		return redirect()->route('merekdagang', $data)->with(session()->flash('success','Data Berhasil Tersimpan !!'));
	}

	public function getHapus($id){

		$val = explode(",", $id);

		foreach ($val as $value) {
			MerekDagang::where('id', $value)->delete();           
		}
		return redirect()->route('merekdagang')->with(session()->flash('success','Data Berhasil Terhapus !!'));
	}

	public function getUpdate(Request $request)
	{

		$data = MerekDagang::find($request->id);
		$data->merek = $request->merek;
		$data->save();
		$data['MerekDagang'] = MerekDagang::paginate(1);

		return redirect()->route('merekdagang', $data)->with(session()->flash('success','Data Berhasil diupdate !!'));
	}
}
