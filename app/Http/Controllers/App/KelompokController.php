<?php

namespace App\Http\Controllers\App;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Kelompok;

class KelompokController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function getIndex()
    {
        $data['kelompok'] = Kelompok::paginate(10);
        return view('app.kelompok.index', $data);
    }

    public function getTambah(Request $request)
    {
        $data['kelompok'] = Kelompok::paginate(10);
        $dt = new Kelompok;
        $dt->nama = $request->nama;
        $dt->alamat = $request->alamat;
        $dt->no_rekening = $request->no_rekening;
        $dt->nama_rekening = $request->nama_rekening;
        $dt->save();
        return redirect()->route('kelompok', $data);
    }

    public function getHapus($id){

        $val = explode(",", $id);

        foreach ($val as $value) {
            Kelompok::where('id', $value)->delete();            
        }
        return redirect()->route('kelompok');
    }

}
