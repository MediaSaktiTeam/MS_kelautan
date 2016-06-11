<?php

namespace App\Http\Controllers\App;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\MasterProduksi;

class MasterProduksiController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function getIndex()
	{
		$data['masterproduksi'] = MasterProduksi::paginate(10);
		return view ('app.master.produksi',$data);
	}

	public function getTambah(Request $request)
	{
		$data['masterproduksi'] = MasterProduksi::paginate(10);
		
		/* Validasi */

			$this->validate($request,[
					'nama' => 'required',
					'jenis' => 'required',
				]);

			$vb	=	MasterProduksi::where('nama',$request->nama)->where('jenis_produksi',$request->jenis)->count();
			if ($vb > 0 ) {
				return redirect()->route('produksi')->with(session()->flash('gagal','Data Sudah ada !!'));
			}
		/* end validasi */

		$dt = new MasterProduksi;
		$dt->nama = $request->nama;
		$dt->jenis_produksi = $request->jenis;
		$dt->save();
		return redirect()->route('produksi', $data)->with(session()->flash('success','Data Berhasil Tersimpan !!'));
	}

	public function getHapus($id){

		$val = explode(",", $id);

		foreach ($val as $value) {
			MasterProduksi::where('id', $value)->delete();           
		}
		return redirect()->route('produksi')->with(session()->flash('success','Data Berhasil Terhapus !!'));
	}

	public function getUpdate(Request $request)
	{

		$data = MasterProduksi::find($request->id);
		$data->jenis_produksi = $request->jenis;
		$data->nama = $request->nama;
		$data->save();
		$data['masterproduksi'] = MasterProduksi::paginate(1);

		return redirect()->route('produksi', $data)->with(session()->flash('success','Data Berhasil diupdate !!'));
	}
}
