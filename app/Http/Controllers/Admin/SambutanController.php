<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Sambutan;
use File;

class SambutanController extends Controller
{

    public function getIndex()
    {
        $data['sambutan'] = Sambutan::orderBy('id','asc')->get();
        return view( 'admin.sambutan.index', $data);
    }


    public function postUpdate(Request $req)
    {

    // Sambutan 1
        $gambar = $req->file('gambar'); 

        for( $i = 0; $i<count($req->nama); $i++ ) {

            $sb1 = Sambutan::find($req->id[$i]);
            $nm_gambar = '';

            if ( $req->gambar[$i] != '' ) {

                $nm_gambar = $gambar[$i]->getClientOriginalName();
                $gambar[$i]->move(
                                base_path() . "/resources/assets/img/sambutan/", 
                                $nm_gambar
                                );
                File::delete('resources/assets/img/sambutan/'.$sb1->foto);
            }


            $sb1->nama = $req->nama[$i];
            $sb1->nip = $req->nip[$i];
            $sb1->jabatan = $req->jabatan[$i];
            $sb1->deskripsi = $req->deskripsi[$i];
            $sb1->sambutan = $req->sambutan[$i];


            if ( $nm_gambar != '' ) {
                $sb1->foto  = $nm_gambar;
            }

            $sb1->save();

        }

        $req->session()->flash('success','Berhasil menyimpan perubahan');
        return redirect(route('sambutan'));
    }

    public function getAdd()
    {
        $sb1 = new Sambutan;

        $sb1->nama = '';
        $sb1->nip = '';
        $sb1->jabatan = '';
        $sb1->deskripsi = '';
        $sb1->sambutan = '';
        $sb1->foto = '';

        $sb1->save();

        \Session()->flash('success','Berhasil menambah sambutan');
        return redirect(route('sambutan'));
    }

    public function getTruncate($id)
    {
        $sb1 = Sambutan::find($id);

        File::delete('resources/assets/img/sambutan/'.$sb1->foto);

        $sb1->nama = '';
        $sb1->nip = '';
        $sb1->jabatan = '';
        $sb1->deskripsi = '';
        $sb1->sambutan = '';
        $sb1->foto = '';

        $sb1->save();

        \Session()->flash('success','Berhasil mengosongkan data');
        return redirect(route('sambutan'));
    }

    public function getDelete($id)
    {
        $sb1 = Sambutan::find($id);
        File::delete('resources/assets/img/sambutan/'.$sb1->foto);
        Sambutan::where('id',$id)->delete();

        \Session()->flash('success','Berhasil mengosongkan data');
        return redirect(route('sambutan'));
    }
}