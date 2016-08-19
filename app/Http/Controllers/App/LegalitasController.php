<?php

namespace App\Http\Controllers\App;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Legalitas;

class LegalitasController extends Controller
{
    public function getIndex()
    {
    	$data['legalitas'] = Legalitas::paginate(10);
    	return view('app.master.legalitas', $data);
    }

    public function postStore(Request $r)
    {
    	$this->validate($r, [
    			'nama' => 'required|unique:app_legalitas_produksi',
    		]);

    	$data = new Legalitas;
    	$data->nama = $r->nama;
    	$data->save();
    	return redirect()->back()->with(session()->flash('success','Berhasil menambah data'));
    }

    public function getUpdate(Request $r)
    {
    	$this->validate($r, [
    			'nama' => 'required|unique:app_legalitas_produksi,id,'.$r->id
    		]);

    	$data = Legalitas::find($r->id);
    	$data->nama = $r->nama;
    	$data->save();
    	return redirect()->back()->with(session()->flash('success','Berhasil menambah data'));
    }

    public function getDelete($id)
    {
    	Legalitas::where('id', $id)->delete();
    	return redirect()->back()->with(session()->flash('success', 'Berhasil menghapus data'));
    }
}