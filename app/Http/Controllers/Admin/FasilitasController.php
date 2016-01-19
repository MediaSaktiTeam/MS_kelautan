<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Storage;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Config;
use App\Fasilitas;

class FasilitasController extends Controller
{
    protected $FasilitasPath;
    protected $Perpage;

    public function __construct(){

        $this->FasilitasPath = "resources/assets/img/fasilitas/";
        $this->Perpage = 18;
    }


    public function getIndex()
    {

        $Fasilitas = Fasilitas::paginate($this->Perpage);

        return view('admin.fasilitas', ['Fasilitas' => $Fasilitas, 'Perpage' => $this->Perpage]);

    }


    public function getTambah(){
        return view('admin.fasilitas-new');
    }


    public function postSimpan(Request $request){
        
        if ( $request->hasFile('file') ) {

            if ( $request->file('file')->isValid() ) {

                $ext     = $request->file('file')->getClientOriginalExtension();
                $judul = $request->file('file')->getClientOriginalName();
                $nm_file = rand(111111111,999999999)."-".date('Y-m-d').".".strtolower($ext);
                $resp    = $request->file('file')
                                ->move( $this->FasilitasPath, $nm_file );
                $gal = new Fasilitas;
                $gal->nama_file = $nm_file;
                $gal->judul = substr( $judul, 0, -4);
                $gal->save();

                echo json_encode($resp);
            }
        }

    }

    public function postHapus(Request $request)
    {

        if ( file_exists( $this->FasilitasPath."".$request->nm_gambar ) ) {
            unlink( $this->FasilitasPath."".$request->nm_gambar );
        }
        Fasilitas::where('id', $request->id_gambar)->delete();

    }

}