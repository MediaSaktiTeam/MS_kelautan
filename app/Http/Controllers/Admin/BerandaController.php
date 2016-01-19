<?php namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Blog, App\Page, App\Pesan;

class BerandaController extends Controller
{

    protected $Perpage;

    public function __construct(){
        $this->Perpage = 10;
    }

    public function index()
    {
        $jml_berita = Blog::where('draft', 0)
                            ->where('arsip', 0)->count();
        $jml_pesan_baru = Pesan::where('baru', 1)
                            ->where('tipe', 'Masuk')->count();
        return view('admin.beranda.index', compact(['jml_berita', 'jml_pesan_baru']));
    }

    public function pencarian(Request $req)
    {
        $TabAktif = $req->TabAktif;

        $LinkPage = "pencarian?cari=$req->cari&TabAktif=$TabAktif&page=";

        // Blog
        $Blogs = Blog::where('judul', 'like', '%'.$req->cari.'%')
                        ->orderBy('id','desc')
                        ->paginate($this->Perpage);

        // Page
        $Pages = Page::where('judul', 'like', '%'.$req->cari.'%')
                        ->orderBy('id','desc')
                        ->paginate($this->Perpage);

        $PrevPage = $Pages->currentPage() > 1 ? $LinkPage.( $Pages->currentPage() - 1)  : "#";
        $NextPage = $Pages->hasMorePages() > 0 ? $LinkPage.( $Pages->currentPage() + 1)  : "#";

        $PrevBlog = $Blogs->currentPage() > 1 ? $LinkPage.( $Blogs->currentPage() - 1)  : "#";
        $NextBlog = $Blogs->hasMorePages() > 0 ? $LinkPage.( $Blogs->currentPage() + 1)  : "#";
        
        return view('admin.beranda.search', 
            [
                'Blogs' => $Blogs, 
                'Pages' => $Pages, 
                'Cari' => $req->cari, 
                'TabAktif' => $TabAktif,
                'PrevBlog' => $PrevBlog,
                'NextBlog' => $NextBlog,
                'PrevPage' => $PrevPage,
                'NextPage' => $NextPage,
             ]);

    }
}
