<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Validator, Auth;
use App\Kategori;

class KategoriController extends Controller
{

    protected $Perpage;

    public function __construct()
    {
        $this->Perpage = 20;
    }

    public function getIndex()
    {
        $Kategori = Kategori::orderBy('id', 'desc')->paginate($this->Perpage);

        return view('admin.blog.kategori', ['Kategori' => $Kategori]);
    }

    public function postSimpan(Request $request){

        $cek_kat = Kategori::where('nama_kategori', $request->kategori)->count();

        if ( $cek_kat > 0 ) {

            echo "0";

        } else {

            $nama_kategori = $request->kategori;
            $slug = str_slug($nama_kategori, "-");

            $Kat = new Kategori;
            $Kat->nama_kategori = $nama_kategori;
            $Kat->slug = $slug;
            $Kat->save();

            $id = $Kat->id;

            echo '
                    <tr class="unread highlight" id="data-'.$id.'">
                        <td>
                            <div class="checkbox checkbox-replace">
                                <input type="checkbox" class="pilih" value="$" />
                            </div>
                        </td>
                        <td class="col-name">
                            <a href="" class="col-name">'. $request->kategori .'</a>
                        </td>
                    </tr>
                ';
        }
    }

    public function postUpdate(Request $request){

        $cek_kat = Kategori::where('nama_kategori', $request->kategori)
                    ->where('id', '!=', $request->id)
                    ->count();

        if ( $cek_kat > 0 ) {

            echo "0";

        } else {

            $Kat = Kategori::find($request->id);
            $Kat->nama_kategori = $request->kategori;
            $Kat->slug = str_slug($request->kategori, "-");
            $Kat->save();
            echo $Kat->id;
        }
    }

    public function postHapus(Request $request){

        $id = $request->id;
        $id = explode(",", $id);
        foreach( $id as $val ) {
            Kategori::where('id', $val)->delete();
        }
    }

}
