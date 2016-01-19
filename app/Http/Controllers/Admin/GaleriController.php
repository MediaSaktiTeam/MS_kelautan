<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Storage;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Config;
use App\Galeri;

class GaleriController extends Controller
{
    protected $GaleriPath;
    protected $Perpage;

    public function __construct(){

        $this->GaleriPath = Config::get('config.galeri_path');
        $this->Perpage = 18;
    }


    public function getIndex()
    {

        $Galeri = Galeri::paginate($this->Perpage);

        return view('admin.galeri.index', ['Galeri' => $Galeri, 'Perpage' => $this->Perpage]);

    }


    public function getTambah(){
        return view('admin.galeri.new');
    }


    public function postSimpan(Request $request){
        
        if ( $request->hasFile('file') ) {

            if ( $request->file('file')->isValid() ) {

                $ext     = $request->file('file')->getClientOriginalExtension();
                $judul = $request->file('file')->getClientOriginalName();
                $nm_file = rand(111111111,999999999)."-".date('Y-m-d').".".strtolower($ext);
                $resp    = $request->file('file')
                                ->move( $this->GaleriPath, $nm_file );
                $gal = new Galeri;
                $gal->nama_file = $nm_file;
                $gal->judul = substr( $judul, 0, -4);
                $gal->save();

                echo json_encode($resp);
            }
        }

    }

    public function postHapus(Request $request)
    {

        if ( file_exists( Config::get('config.galeri_path').$request->nm_gambar ) ) {
            unlink( Config::get('config.galeri_path').$request->nm_gambar );
        }
        Galeri::where('id', $request->id_gambar)->delete();

    }

}