<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Setting;

class SettingController extends Controller
{

    public function getIndex()
    {
        $Set = Setting::findOrFail(1);
        return view( 'admin.pengaturan.index', ['Set' => $Set]);
    }


    public function postUpdate(Request $req, $id)
    {
        $this->validate($req,
            [
                'sitename' => 'required',
                'email' => 'required|email'
            ]);

        if ( $req->hasFile('gambar') ) {

            if ( $req->file('gambar')->isValid() ) {

                $nm_gambar = $req->file('gambar')->getClientOriginalName();
                $req->file('gambar')->move(
                                            base_path() . "/resources/assets/img/", 
                                            $nm_gambar
                                            );
            } else {
                return redirect()->route('setting');
            }

        }

        $Set1 = Setting::find($id);
        $Set2 = Setting::find(2);

        $Set2->sitename      = $Set1->sitename;
        $Set2->description   = $Set1->description;
        $Set2->email         = $Set1->email;
        $Set2->visi_misi     = $Set1->visi_misi;
        $Set2->tag           = $Set1->tag;
        $Set2->alamat        = $Set1->alamat;
        $Set2->phone         = $Set1->phone;
        $Set2->fb            = $Set1->fb;
        $Set2->twitter       = $Set1->twitter;
        $Set2->gambar_utama  = $Set1->gambar_utama;

        $Set2->save();

        $Set1->sitename      = $req->sitename;
        $Set1->description   = $req->description;
        $Set1->email         = $req->email;
        $Set1->visi_misi     = $req->visi_misi;
        $Set1->alamat        = $req->alamat;
        $Set1->phone         = $req->phone;
        $Set1->tag           = $req->tag;
        $Set1->fb            = $req->fb;
        $Set1->twitter       = $req->twitter;

        if ( isset($nm_gambar) ) {
            $Set1->gambar_utama  = $nm_gambar;
        }

        $Set1->save();

        $req->session()->flash('success','Berhasil menyimpan perubahan');
        return redirect(route('setting'));
    }

    public function getRefresh(Request $req)
    {

        $Set1 = Setting::find(1);
        $Set2 = Setting::find(2);

        $Set1->sitename      = $Set2->sitename;
        $Set1->description   = $Set2->description;
        $Set1->email         = $Set2->email;
        $Set1->tag           = $Set2->tag;
        $Set1->fb            = $Set2->fb;
        $Set1->twitter       = $Set2->twitter;
        $Set1->gambar_utama  = $Set2->gambar_utama;

        $Set1->save();

        $req->session()->flash('success','Berhasil mengembalikan pengaturan');
        return redirect(route('setting'));
    }

}
