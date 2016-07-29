<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Blog, App\Page, App\Pesan, App\Kategori, App\BlogKategori, App\Galeri, App\Setting;
use DB, Config, Validator, App\Sambutan;

class FrontController extends Controller
{
	protected $Perpage;

    public function __construct()
    {
        $this->Perpage = 12;
    }

	public function index()
	{

		$data['setting'] =  Setting::find(1);

		$data['blogs'] = Blog::where('draft', 0)
								->where('arsip', 0)
								->orderBy('id', 'desc')
								->get();
		$data['sb1'] =  Sambutan::find(1);
		$data['sb2'] =  Sambutan::find(2);

		return view('front.home.index', $data);

	}

	public function blog()
	{
		$data['LinkPage']   = "blog?page=";

		$data['populer'] = $this->BlogLainnya(4);

		$data['kategori'] = Kategori::all();

		$data['blogs'] = Blog::where('draft', 0)
					->where('arsip', 0)
					->orderBy('id', 'desc')
					->paginate($this->Perpage);

		return view('front.blog.index',$data);
	}

	public function blogPost($slug)
	{

		$data['blog'] = Blog::where('slug',$slug)->first();

		$data['blog_lainnya'] = $this->BlogLainnya(3);

		$data['kategori'] = Kategori::all();

		$data['kategori_post'] = $this->get_kategori($data['blog']->kategori);

		return view('front.blog.blog-post', $data);
	}

	public function kategori($slug)
	{
		$data['LinkPage'] = "$slug?page=";

		$data['all_kategori'] = Kategori::all();
		$data['kategori'] = Kategori::where('slug', $slug)->first();

		$data['blogs'] = DB::table('site_blog')
						->join('site_blog_kategori', 'site_blog.id', '=', 'site_blog_kategori.id_blog')
						->join('site_kategori', 'site_kategori.id', '=', 'site_blog_kategori.id_kategori')
						->where('site_kategori.slug', $slug)
						->where('site_blog.draft',0)
						->where('site_blog.arsip',0)
						->select('site_blog.*', 'site_kategori.nama_kategori')
						->orderBy('site_blog.id','desc')
						->paginate($this->Perpage);

		$data['populer'] = $this->BlogLainnya(4);

		return view('front.blog.kategori', $data);
	}

	public function page($slug)
	{
		$data['page'] = Page::where('slug',$slug)->first();

		$data['morepage'] = Page::where('draft', 0)
					->where('arsip', 0)
					->orderBy('id', 'desc')
					->get();

		return view('front.page.single-page', $data);
	}

	public function galeri()
	{
		$data['galeri'] = Galeri::orderBy('id','desc')->paginate(18);
		return view('front.gallery.index', $data);
	}

	public function contact()
	{
		$data['setting'] =  Setting::find(1);

		return view('front.contact.index', $data);
	}
	public function saveContact(Request $req)
	{

		$Pesan = new Pesan;
		$Pesan->nama = $req->nama;
		$Pesan->email = $req->email;
		$Pesan->subjek = $req->subject;
		$Pesan->pesan = $req->pesan;
		$Pesan->save();

	}

	public function pencarian(Request $req)
	{

		$data['LinkPage'] = "pencarian?cari=$req->cari&page=";
		$data['cari'] = Blog::where('judul', 'LIKE', '%'.$req->cari.'%')
						->orWhere('konten', 'LIKE', '%'.$req->cari.'%')
						->orWhere('tag', 'LIKE', '%'.$req->cari.'%')
						->paginate($this->Perpage);

		return view('front.blog.pencarian', $data);
	}

	public function BlogLainnya($take){
		$bloglainnya = Blog::where('draft', 0)
						->where('arsip', 0)
						->orderBy('id', 'desc')
						->take($take)
						->get();
		return $bloglainnya;

	}

	public function get_kategori($kategori)
	{
		foreach ($kategori as $kat ) {
			$kt[] = $kat->nama_kategori;
		}

		return $kt;
	}

}