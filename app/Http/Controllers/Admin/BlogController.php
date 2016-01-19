<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Validator, Auth;
use App\Blog;
use App\BlogKategori;
use App\Kategori;

class BlogController extends Controller
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

        $Status     = "All";
        $LinkPage   = "blog?page=";
        $Blogs      = Blog::where('draft', 0)
                            ->where('arsip', 0)
                            ->orderBy('id', 'desc')
                            ->paginate($this->Perpage);
        $JmlDraft   = Blog::where('draft', 1)->count();
        $JmlArsip   = Blog::where('arsip', 1)->count();


        return view('admin.blog.index', 
            [ 
                'User' => $this->User, 
                'Blogs' => $Blogs, 
                'Status' => $Status, 
                'JmlDraft' => $JmlDraft, 
                'JmlArsip' => $JmlArsip,
                'LinkPage' => $LinkPage
            ]);
    }

    public function getDraft()
    {

        $Status     = "Draft";
        $LinkPage   = "blog?page=";
        $Blogs      = Blog::where('draft', 1)
                            ->orderBy('id', 'desc')
                            ->paginate($this->Perpage);
        $JmlDraft   = Blog::where('draft', 1)->count();
        $JmlArsip   = Blog::where('arsip', 1)->count();

        return view('admin.blog.index', 
            [ 
                'User' => $this->User, 
                'Blogs' => $Blogs, 
                'Status' => $Status, 
                'JmlDraft' => $JmlDraft, 
                'JmlArsip' => $JmlArsip,
                'LinkPage' => $LinkPage 
            ]);
    }

    public function getArsip()
    {

        $Status     = "Arsip";
        $LinkPage   = "blog?page=";
        $Blogs      = Blog::where('arsip', 1)
                            ->orderBy('id', 'desc')
                            ->paginate($this->Perpage);
        $JmlDraft   = Blog::where('draft', 1)->count();
        $JmlArsip   = Blog::where('arsip', 1)->count();

        return view('admin.blog.index', 
            [ 
                'User' => $this->User, 
                'Blogs' => $Blogs, 
                'Status' => $Status, 
                'JmlDraft' => $JmlDraft, 
                'JmlArsip' => $JmlArsip,
                'LinkPage' => $LinkPage 
            ]);
    }

    public function getCari(Request $request)
    {

        $Status = "All";
        $JmlArsip = 0;
        $JmlDraft = 0;
        $cari = $request->cari;
        $LinkPage = "?cari=$cari&page=";
        $Blogs = Blog::where('judul','like', '%'.$cari.'%')
                        ->where('draft', 0)
                        ->where('arsip', 0)
                        ->paginate($this->Perpage);
        return view('admin.blog.index', 
            [ 
                'User' => $this->User, 
                'Blogs' => $Blogs, 
                'Status' => $Status, 
                'JmlDraft' => $JmlDraft, 
                'JmlArsip' => $JmlArsip, 
                'Cari' => $cari,
                'LinkPage' => $LinkPage
            ]);

    }

    public function getTambah()
    {
        return view('admin.blog.new');
    }

    public function postSimpan(Request $request)
    {

        $this->validate($request, [
                'judul' => 'required|unique:site_blog|min:3',
                'konten' => 'required',
                'kategori' => 'required'
            ]);

        $slug = str_slug($request->judul, "-");

        if ( $request->hasFile('gambar') ) {

            if ( $request->file('gambar')->isValid() ) {

                $ext = $request->file('gambar')->getClientOriginalExtension();
                $nm_gambar = str_limit( $slug, 30 );
                $nm_gambar = rand(11111,99999)."-".$nm_gambar.".".$ext;
                $request->file('gambar')->move(
                                            base_path() . "/resources/assets/img/blog/", 
                                            $nm_gambar
                                            );
            } else {
                return redirect()->route('blog_tambah');
            }

        } else {

            $nm_gambar = "";

        }

        // Simpan blog
        $Blog = new Blog;
        $Blog->judul   = $request->judul;
        $Blog->slug    = $slug;
        $Blog->konten  = $request->konten;
        $Blog->gambar  = $nm_gambar;
        $Blog->tag     = $request->tags;
        $Blog->draft   = $request->draft;
        $Blog->id_user = $this->User->id;

        $Blog->save();

        $id = $Blog->id;

        // Simpan kategori
        $kategori = explode(",",$request->kategori);

        foreach( $kategori as $val ){
            if ( empty( $val ) ) continue;
            $BlogKat = new BlogKategori;
            $BlogKat->id_kategori = $val; 
            $BlogKat->id_blog = $id; 
            $BlogKat->save(); 
        }

        $request->session()->flash('success', 'Berhasil menyimpan data'); 
        return redirect()->route( 'blog_edit', [$id] );
    }

    public function getEdit($id)
    {
        $Blog = Blog::findOrFail($id);
        return view('admin.blog.edit', ['Blog' => $Blog]);
    }


    public function postUpdate(Request $request, $id)
    {
        $Blog = Blog::find($id);

        $this->validate($request, [
                'judul' => 'required|unique:site_blog,id,'.$id.'|min:3',
                'konten' => 'required',
                'kategori' => 'required'
            ]);

        $slug = str_slug($request->judul, "-");

        if ( $request->hasFile('gambar') ) {

            if ( $request->file('gambar')->isValid() ) {

                $path = base_path()."/resources/assets/img/blog/";

                $ext = $request->file('gambar')->getClientOriginalExtension();
                $nm_gambar = str_limit( $slug, 30 );
                $nm_gambar = rand(11111,99999)."-".$nm_gambar.".".$ext;
                $request->file('gambar')->move( $path, $nm_gambar );

                // Hapus gambar jika ada
                if ( !empty( $Blog->gambar ) ) {
                    
                    if ( file_exists( $path.$Blog->gambar ) ) {
                        unlink( $path.$Blog->gambar );
                    }
                }
                
                $Blog->gambar  = $nm_gambar;

            } else {
                return redirect()->route( 'blog_edit', [$id] );
            }
        }

        $Blog->judul   = $request->judul;
        $Blog->slug    = $slug;
        $Blog->konten  = $request->konten;
        $Blog->tag     = $request->tags;
        $Blog->draft   = $request->draft;

        $Blog->save();

        
        // Hapus blog kategori lalu tambah
        BlogKategori::where('id_blog', $id)->delete();
        $kategori = explode(",",$request->kategori);

        foreach( $kategori as $val ){
            if ( empty( $val ) ) continue;
            $BlogKat = new BlogKategori;
            $BlogKat->id_kategori = $val; 
            $BlogKat->id_blog = $id; 
            $BlogKat->save(); 
        }

        // Hapus gambar
        if ( $request->hapus_gambar == "1" ) {
            $Blog = Blog::find($id);
            $Blog->gambar = "";
            $Blog->save();
            $path = base_path()."/resources/assets/img/blog/";
            if ( file_exists( $path.$request->gambar_ ) ) {
                unlink( $path.$request->gambar_ );
                echo $request->hapus_gambar;
            }
        }
        
        $request->session()->flash('success', 'Berhasil menyimpan data'); 
        return redirect()->route( 'blog_edit', [$id] );


    }

    public function postHapus(Request $request)
    {

        $id = $request->id;
        $id = explode(",", $id);
        foreach( $id as $val ) {
            $B = Blog::find($val);
            if ( !empty( $B->gambar ) ) {
                $path = base_path()."/resources/assets/img/blog/";
                if ( file_exists( $path.$B->gambar ) ) {
                    unlink( $path.$B->gambar );
                }
            }
            Blog::where('id', $val)->delete();
        }

    }

    public function postDraft(Request $request)
    {

        $id = $request->id;
        $id = explode(",", $id);

        foreach( $id as $val ) {
            $B = Blog::find($val);
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
            $B = Blog::find($val);
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
            $B = Blog::find($val);
            $B->draft = 0;
            $B->arsip = 0;
            $B->save();
        }

    }

    public function postTambahKategori(Request $request)
    {

        $cek_kat = Kategori::where('nama_kategori', $request->kategori)->count();

        if ( $cek_kat > 0 ) {

            echo json_encode(array('id'=>0));

        } else {

            $NewKat = new Kategori;
            $NewKat->nama_kategori = $request->kategori;
            $NewKat->slug = str_slug($request->kategori,"-");
            $NewKat->save();

            $id = $NewKat->id;

            $data = ['id' => $id, 'kat' => $request->kategori];
            echo json_encode($data);
        }

    }

    public function getKategori()
    {
        $Kategori = Kategori::all();
        return view('admin.layout.inc.getkategori', ['Kategori' => $Kategori]);
    }

    public function getKategoriEdit($id_blog)
    {
        $Kategori = Kategori::all();

        $BlogKategori = BlogKategori::where('id_blog',$id_blog)->get();
        
        return view('admin.layout.inc.getkategoriedit', ['Kategori' => $Kategori, 'BlogKategori' => $BlogKategori]);
    }
}
