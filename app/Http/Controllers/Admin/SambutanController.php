<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Sambutan;

class SambutanController extends Controller
{

    public function getIndex()
    {
        $data['bupati'] = Sambutan::findOrfail(1);
        $data['kadis'] = Sambutan::findOrfail(2);
        return view( 'admin.sambutan.index', $data);
    }


    public function postUpdate(Request $req)
    {

    // Sambutan 1
        if ( $req->hasFile('gambar') ) {

            if ( $req->file('gambar')->isValid() ) {

                $nm_gambar = $req->file('gambar')->getClientOriginalName();
                $req->file('gambar')->move(
                                            base_path() . "/resources/assets/img/sambutan/", 
                                            $nm_gambar
                                            );
            }
        }

        $sb1 = Sambutan::find(1);

        $sb1->nama = $req->nama;
        $sb1->nip = $req->nip;
        $sb1->jabatan = $req->jabatan;
        $sb1->deskripsi = $req->deskripsi;
        $sb1->sambutan = $req->sambutan;


        if ( isset($nm_gambar) ) {
            $sb1->foto  = $nm_gambar;
        }

        $sb1->save();
    //Sambutan2

        if ( $req->hasFile('gambar2') ) {

            if ( $req->file('gambar2')->isValid() ) {

                $nm_gambar2 = $req->file('gambar2')->getClientOriginalName();
                $req->file('gambar2')->move(
                                            base_path() . "/resources/assets/img/sambutan/", 
                                            $nm_gambar2
                                            );
            }

        }

        $sb2 = Sambutan::find(2);

        $sb2->nama = $req->nama2;
        $sb2->nip = $req->nip2;
        $sb2->jabatan = $req->jabatan2;
        $sb2->deskripsi = $req->deskripsi2;
        $sb2->sambutan = $req->sambutan2;

        if ( isset($nm_gambar2) ) {
            $sb2->foto  = $nm_gambar2;
        }
        $sb2->save();

        $req->session()->flash('success','Berhasil menyimpan perubahan');
        return redirect(route('sambutan'));
    }

}