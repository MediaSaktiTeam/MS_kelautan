<?php

namespace App\Http\Controllers\App;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User, App\Kelompok;
use Excel, PDF, Permissions;

class KelompokController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function getIndex()
	{
		if ( Permissions::admin() ) {
			$data['kelompok'] = Kelompok::paginate(10);
		} else {
			$data['kelompok'] = Kelompok::where('tipe', Permissions::pnp_role())->paginate(10);
		}
		return view('app.kelompok.index', $data);
	}

	public function getDetail($id)
	{
		$data['kelompok'] = Kelompok::where('id_kelompok',$id)->first();

		return view('app.kelompok.detail', $data);
	}

	 public function getDetailAnggota($id)
	{
		$data['users'] = User::where('id_kelompok',$id)->get();

		return view('app.kelompok.detailanggota', $data);
	}

	public function getTambah(Request $request)
	{
		$dt = new Kelompok;
		$dt->id_kelompok = $request->id;
		$dt->nama = $request->nama;
		$dt->alamat = $request->alamat;
		$dt->no_rekening = $request->no_rekening;
		$dt->nama_rekening = $request->nama_rekening;
		$dt->nama_bank = $request->nama_bank;
		$dt->tipe = $request->tipe;
		$dt->save();
		return redirect()->route('kelompok')->with(session()->flash('success','Data Berhasil Tersimpan !!'));
	}

	public function getUpdate(Request $request)
	{
		$dt['id_kelompok']  = $request->id;
		$dt['nama']         = $request->nama;
		$dt['alamat']       = $request->alamat;
		$dt['no_rekening']  = $request->no_rekening;
		$dt['nama_rekening'] = $request->nama_rekening;
		$dt['nama_bank']     = $request->nama_bank;
		$dt['tipe']          = $request->tipe;

		Kelompok::where('id_kelompok', $request->id)
					->update($dt);

		return redirect()->route('kelompok')->with(session()->flash('success','Data Berhasil diupdate !!'));
	}

	public function getHapus($id){

		$val = explode(",", $id);

		foreach ($val as $value) {
			Kelompok::where('id_kelompok', $value)->delete();            
		}
		return redirect()->route('kelompok')->with(session()->flash('delete','Data Berhasil Dihapus !!'));
	}

	public function getCari(Request $r)
	{
		$data['kelompok'] = Kelompok::where('nama', 'LIKE', '%'.$r->cari.'%')->get();
		return view('app.kelompok.cari', $data);
	}

	public function getExportExcel()
	{
		$data['kelompok'] = Kelompok::get();

        Excel::create('Data Kelompok');

        Excel::create('Data Kelompok', function($excel) use($data)
        {
            
            $excel->sheet('New sheet', function($sheet) use($data)
            {
                $sheet->loadView('app.kelompok.export-excel', $data);
            }); 
        })->download('xlsx');
	}

	public function getExportPdf()
	{
		$data['kelompok'] = Kelompok::get();
		
        $pdf = PDF::loadView('app.kelompok.export-pdf', $data);
        return $pdf->setPaper('legal')->setOrientation('landscape')->setWarnings(false)->download('Data Kelompok.pdf');
	}

}
