<?php
namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB, Validator, Auth;
use App\Page;

class PageController extends Controller
{

    public $User;
    protected $Perpage;

    public function __construct()
    {
        $this->User = Auth::user();
        $this->Perpage = 20;
    }

    public function getIndex()
    {

        $Status = "All";
        $Pages      = Page::where('draft', 0)
                            ->where('arsip', 0)
                            ->orderBy('id', 'desc')
                            ->paginate($this->Perpage);
        $JmlDraft   = Page::where('draft', 1)->count();
        $JmlArsip   = Page::where('arsip', 1)->count();

        return view('admin.pages.index', [ 'User' => $this->User, 'Pages' => $Pages, 'Status' => $Status, 'JmlDraft' => $JmlDraft, 'JmlArsip' => $JmlArsip ]);
    }

    public function getDraft()
    {

        $Status = "Draft";
        $Pages      = Page::where('draft', 1)
                            ->orderBy('id', 'desc')
                            ->paginate($this->Perpage);
        $JmlDraft   = Page::where('draft', 1)->count();
        $JmlArsip   = Page::where('arsip', 1)->count();

        return view('admin.pages.index', [ 'User' => $this->User, 'Pages' => $Pages, 'Status' => $Status, 'JmlDraft' => $JmlDraft, 'JmlArsip' => $JmlArsip ]);
    }

    public function getArsip()
    {

        $Status = "Arsip";
        $Pages      = Page::where('arsip', 1)
                            ->orderBy('id', 'desc')
                            ->paginate($this->Perpage);
        $JmlDraft   = Page::where('draft', 1)->count();
        $JmlArsip   = Page::where('arsip', 1)->count();

        return view('admin.pages.index', [ 'User' => $this->User, 'Pages' => $Pages, 'Status' => $Status, 'JmlDraft' => $JmlDraft, 'JmlArsip' => $JmlArsip ]);
    }

    public function getCari(Request $request)
    {

        $Status = "All";
        $JmlArsip = 0;
        $JmlDraft = 0;
        $cari = $request->cari;
        $Pages = Page::where('judul','like', '%'.$cari.'%')
                        ->where('draft', 0)
                        ->where('arsip', 0)
                        ->paginate($this->Perpage);
        return view('admin.pages.index', [ 'User' => $this->User, 'Pages' => $Pages, 'Status' => $Status, 'JmlDraft' => $JmlDraft, 'JmlArsip' => $JmlArsip, 'Cari' => $cari ]);

    }

    public function getTambah()
    {
        return view('admin.pages.new');
    }

    public function postSimpan(Request $request)
    {

        $this->validate($request, [
                'judul' => 'required|unique:site_pages|min:3',
                'konten' => 'required'
            ]);

        $slug = str_slug($request->judul, "-");

        if ( $request->hasFile('gambar') ) {

            if ( $request->file('gambar')->isValid() ) {

                $ext = $request->file('gambar')->getClientOriginalExtension();
                $nm_gambar = str_limit( $slug, 30 );
                $nm_gambar = rand(11111,99999)."-".$nm_gambar.".".$ext;
                $request->file('gambar')->move(
                                            base_path() . "/resources/assets/img/page/", 
                                            $nm_gambar
                                            );
            } else {
                return redirect()->route('page_tambah');
            }

        } else {

            $nm_gambar = "";

        }

        // Simpan Page
        $Page = new Page;
        $Page->judul   = $request->judul;
        $Page->slug    = $slug;
        $Page->konten  = $request->konten;
        $Page->gambar  = $nm_gambar;
        $Page->draft   = $request->draft;
        $Page->id_user = $this->User->id;

        $Page->save();

        $id = $Page->id;

        $request->session()->flash('success', 'Berhasil menyimpan data'); 
        return redirect()->route( 'page_edit', [$id] );
    }

    public function getEdit($id)
    {
        $Page = Page::findOrFail($id);
        return view('admin.pages.edit', ['Page' => $Page]);
    }


    public function postUpdate(Request $request, $id)
    {
        $Page = Page::find($id);

        $this->validate($request, [
                'judul' => 'required|unique:site_pages,id,'.$id.'|min:3',
                'konten' => 'required',
            ]);

        $slug = str_slug($request->judul, "-");

        if ( $request->hasFile('gambar') ) {

            if ( $request->file('gambar')->isValid() ) {

                $path = base_path()."/resources/assets/img/page/";

                $ext = $request->file('gambar')->getClientOriginalExtension();
                $nm_gambar = str_limit( $slug, 30 );
                $nm_gambar = rand(11111,99999)."-".$nm_gambar.".".$ext;
                $request->file('gambar')->move( $path, $nm_gambar );

                // Hapus gambar jika ada
                if ( !empty( $Page->gambar ) ) {
                    
                    if ( file_exists( $path.$Page->gambar ) ) {
                        unlink( $path.$Page->gambar );
                    }
                }
                
                $Page->gambar  = $nm_gambar;

            } else {
                return redirect()->route( 'page_edit', [$id] );
            }
        }

        $Page->judul   = $request->judul;
        $Page->slug    = $slug;
        $Page->konten  = $request->konten;
        $Page->draft   = $request->draft;

        $Page->save();

        // Hapus gambar
        if ( $request->hapus_gambar == "1" ) {
            $Page = Page::find($id);
            $Page->gambar = "";
            $Page->save();
            $path = base_path()."/resources/assets/img/page/";
            if ( file_exists( $path.$request->gambar_ ) ) {
                unlink( $path.$request->gambar_ );
                echo $request->hapus_gambar;
            }
        }

        $request->session()->flash('success', 'Berhasil menyimpan data'); 
        return redirect()->route( 'page_edit', [$id] );

    }

    public function postHapus(Request $request)
    {

        $id = $request->id;
        $id = explode(",", $id);
        foreach( $id as $val ) {
            $B = Page::find($val);
            if ( !empty( $B->gambar ) ) {
                $path = base_path()."/resources/assets/img/page/";
                if ( file_exists( $path.$B->gambar ) ) {
                    unlink( $path.$B->gambar );
                }
            }
            Page::where('id', $val)->delete();
        }

    }

    public function postDraft(Request $request)
    {

        $id = $request->id;
        $id = explode(",", $id);

        foreach( $id as $val ) {
            $B = Page::find($val);
            $B->draft = 1;
            $B->arsip = 0;
            $B->save();
        }

    }

    public function postArsip(Request $request)
    {

        $id = $request->id;
        $id = explode(",", $id);
        
        foreach( $id as $val ) {
            $B = Page::find($val);
            $B->draft = 0;
            $B->arsip = 1;
            $B->save();
        }

    }

    public function postPublish(Request $request)
    {

        $id = $request->id;
        $id = explode(",", $id);
        
        foreach( $id as $val ) {
            $B = Page::find($val);
            $B->draft = 0;
            $B->arsip = 0;
            $B->save();
        }

    }
}
