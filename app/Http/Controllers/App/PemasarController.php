<?php

namespace App\Http\Controllers\App;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB,Excel,PDF;
use App\User,App\Pemasar,App\Laporan,App\Provinsi,App\Kabupaten,App\Kecamatan,App\Desa;
use App\Permissions;

class PemasarController extends Controller
{

	public function getIndex()
	{
		$data['pemasar'] = Pemasar::paginate(10);
		return view ('app.pemasar.index',$data);
	}

	public function getTambah(Request $request)
	{
		$dt = new Pemasar;
		$dt->id = $request->id;
		$dt->provinsi = $request->provinsi;
		$dt->kabupaten = $request->kabupaten;
		$dt->kecamatan = $request->kecamatan;
		$dt->desa = $request->desa;
		$dt->kode_kegiatan = $request->kode_kegiatan;
		$dt->nomor_direktori = $request->nomor_direktori;
		$dt->unit_pemasar = $request->unit_pemasar;
		$dt->pemilik_pemasar = $request->pemilik_pemasar;
		$dt->alamat_pemasar = $request->alamat_pemasar;
		$dt->erte = $request->erte;
		$dt->tlp = $request->tlp;
		$dt->pos = $request->pos;
		$dt->tipe = $request->tipe;
		$dt->tahun_mulai = $request->tahun_mulai;
		$dt->save();
		return redirect()->route('pemasar')->with(session()->flash('success','Data Berhasil Tersimpan !!'));
	}

	public function getDetail($id)
	{
		$data['pemasar'] = pemasar::where('id',$id)->first();

		return view('app.pemasar.detail', $data);
	}

	public function getHapus($id){

		$val = explode(",", $id);

		foreach ($val as $value) {
			Pemasar::where('id', $value)->delete();           
		}
		return redirect()->route('pemasar')->with(session()->flash('success','Data Berhasil Terhapus !!'));
	}

	public function getEdit($id)
	{
		$data['provinsi'] = Provinsi::all();
		$data['kabupaten'] = Kabupaten::all();
		$data['pemasar'] = Pemasar::find($id);
		return view('app.pemasar.update', $data);
	}

	public function getUpdate(Request $request)
	{

		$dt = Pemasar::find($request->id);
		$dt->id = $request->id;
		$dt->provinsi = $request->provinsi;
		$dt->kabupaten = $request->kabupaten;
		$dt->kecamatan = $request->kecamatan;
		$dt->desa = $request->desa;
		$dt->kode_kegiatan = $request->kode_kegiatan;
		$dt->nomor_direktori = $request->nomor_direktori;
		$dt->unit_pemasar = $request->unit_pemasar;
		$dt->pemilik_pemasar = $request->pemilik_pemasar;
		$dt->alamat_pemasar = $request->alamat_pemasar;
		$dt->erte = $request->erte;
		$dt->tlp = $request->tlp;
		$dt->pos = $request->pos;
		$dt->tipe = $request->tipe;
		$dt->tahun_mulai = $request->tahun_mulai;
		$dt->save();
		$data['pemasar'] = Pemasar::paginate(1);
		return redirect()->route('pemasar', $data)->with(session()->flash('success','Data Berhasil diupdate !!'));
	}

	public function getCari(Request $r)
	{
		$data['pemasar'] = Pemasar::where('unit_pemasar  ', 'LIKE', '%'.$r->cari.'%')->get();
		return view('app.pemasar.search', $data);
	}

	public function getExportExcel()
	{
		$data['pemasar'] = Pemasar::get();

        Excel::create('Data pemasar');

        Excel::create('Data pemasar', function($excel) use($data)
        {
            
            $excel->sheet('New sheet', function($sheet) use($data)
            {
                $sheet->loadView('app.pemasar.export-excel', $data);
            }); 
        })->download('xlsx');
	}

	public function getExportPdf()
	{
		$data['pemasar'] = pemasar::get();
        $pdf = PDF::loadView('app.pemasar.export-pdf', $data);
        return $pdf->setPaper('legal')->setOrientation('landscape')->setWarnings(false)->download('Data pemasar.pdf');
	}

}