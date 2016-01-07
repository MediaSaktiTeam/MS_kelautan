<?php

namespace App\Http\Controllers\App;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use App\User, App\Kelompok, App\Jabatan, App\Usaha, App\Sarana, App\KepemilikanSarana;

class PembudidayaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getIndex()
    {
        $data['pembudidaya'] = User::where('profesi','Pembudidaya')->orderBy('id','desc')->get();
        // $data['kelompok'] = Kelompok::where('tipe','Pembudidaya')->get();
        $data['kelompok'] = Kelompok::all();
        $data['jabatan'] = Jabatan::all();
        $data['sarana'] = Sarana::where('jenis','Budidaya Air laut')->where('tipe','Pembudidaya')->get();
        return view ('app.pembudidaya.index',$data);
    }

     public function getTambah(Request $request)
    {
        $data['jabatan'] = Jabatan::paginate(10);
        $dt = new Jabatan;
        $dt->nama = $request->nama;
        $dt->save();
        return redirect()->route('jabatan', $data);
    }

    public function postSimpan(Request $r)
    {

        $this->validate($r,[
                'nik' => 'required|unique:users',
                'id_sarana' => 'required',
            ]);


        $name = $r->name;
        $username = str_slug($name,"-");

        $pb = new User;
        $pb->name       = $name;
        $pb->username   = $username;
        $pb->email      = $username."@mail.com";
        $pb->password   = bcrypt($username);
        $pb->nik        = $r->nik;
        $pb->alamat     = $r->alamat;
        $pb->id_kelompok  = $r->id_kelompok;
        $pb->id_jabatan   = $r->id_jabatan;
        $pb->id_usaha     = $r->id_usaha;

        $pb->save();

        $id = $pb->id;

        // Simpan sarana
        foreach ( $r->id_sarana as $val ){
            $record['id_sarana']  = $val; 
            $record['id_user']    = $id; 
            $records[] = $record;
        }

        DB::table('app_kepemilikan_sarana')->insert( $records );

        $r->session()->flash('success','Data tersimpan');

        return redirect(route('pembudidaya'));

    }

    public function getEdit()
    {

    }

    public function postUpdate()
    {

    }

    public function getHapus(Request $r, $id)
    {
        $val = explode(",", $id);

        foreach ($val as $value) {
            User::where('id', $value)->delete();            
        }
        $r->session()->flash('success', 'Data terhapus');
        return redirect()->route('pembudidaya');
    }

    public function getUsaha($jenis)
    {
        $data['usaha'] = Usaha::where('jenis', $jenis)->get();
        return view('app.pembudidaya.data-usaha', $data);
    }

    public function getSarana($jenis)
    {
        $data['sarana'] = Sarana::where('jenis', $jenis)->where('tipe', 'Pembudidaya')->get();
        return view('app.pembudidaya.data-sarana', $data);
    }

}