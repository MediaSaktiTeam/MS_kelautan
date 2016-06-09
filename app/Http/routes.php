<?php
/* Front */
	Route::group(['namespace' => 'Front' ], function(){

		Route::get('/', ['as' => 'home', 'uses' => 'FrontController@index']);
		Route::get('/blog', 'FrontController@blog');
		Route::get('/blog/{slug}', 'FrontController@blogPost');
		Route::get('/blog/kategori/{slug}', ['as' => 'Kategori', 'uses' => 'FrontController@kategori']);

		Route::get('/page/{slug}', 'FrontController@page');
		Route::get('/galeri', 'FrontController@galeri');

		Route::get('/contact', ['as' => 'contact', 'uses' => 'FrontController@contact']);

		Route::post('/contact', ['as' => 'post_contact', 'uses' => 'FrontController@saveContact']);

		Route::get('/pencarian', ['as' => 'Pencarian', 'uses' => 'FrontController@pencarian']);

	});
	Route::get('/mail', function(){
		$data['subjek'] = "Tes";
		$data['pesan'] = "Tes";
		return view('app.lapor-masalah.index', $data);
	});

/* App */
	Route::group([ 'middleware' => 'Validasi', 'namespace' => 'App'], function(){
		
		Route::post('/app/login', 'LoginController@postLogin');
		Route::get('/app/login', 'LoginController@getLogin');
		Route::get('/app/logout', 'LoginController@logout');

	});

	Route::group(['middleware' => ['MustLogin', 'AdminApp'], 'namespace' => 'App' ], function () {

		Route::get('/app/beranda', 'BerandaController@index');

		Route::controller('app/pembudidaya', 'PembudidayaController',
		[
			'getIndex'  => 'pembudidaya',
			'getTambah'  => 'pembudidaya_tambah',
			'postSimpan'  => 'pembudidaya_simpan',
			'getEdit'  => 'pembudidaya_edit',
			'postUpdate'  => 'pembudidaya_update',
			'getHapus'  => 'pembudidaya_hapus',
			'getSarana'  => 'pembudidaya_get_sarana',
			'getUsaha'  => 'pembudidaya_get_usaha',
			'getDetail'  => 'pembudidaya_get_detail',
		]);

		Route::controller('app/nelayan', 'NelayanController',
		[
			'getIndex'  => 'nelayan',
			'getTambah'  => 'nelayan_tambah',
			'postSimpan'  => 'nelayan_simpan',
			'getEdit'  => 'nelayan_edit',
			'postUpdate'  => 'nelayan_update',
			'getHapus'  => 'nelayan_hapus',
			'getSarana'  => 'nelayan_get_sarana',
			'getUsaha'  => 'nelayan_get_usaha',
			'getDetail'  => 'nelayan_get_detail',
		]);

		Route::controller('app/statistik', 'StatistikController',
			[
				'getIndex' => 'app.statistik',
			]);

		Route::controller('app/pengolah', 'PengolahController', ['getIndex' => 'pengolah']);
		Route::controller('app/pemasar', 'PemasarController', 
			[

				'getIndex' => 'pemasar',
				'getTambah'  => 'pemasar_tambah',
				'getEdit' => 'pemasar_edit',
				'getUpdate'  => 'pemasar_update',
				'getHapus' => 'pemasar_hapus',
				'getDetail'  => 'pemasar_get_detail',

			]);

		Route::controller('app/mangrove/milik', 'MangroveMilikController', 
			[
				'getIndex' => 'mangrovemilik',
				'getAdd' => 'mangrovemilik_add',
				'getDelete' => 'mangrovemilik_delete',
				'getDetail' => 'mangrovemilik_detail',
				'getUpdate' => 'mangrovemilik_update',
				'getEdit' => 'mangrovemilik_edit',
				'getSearch' => 'mangrovemilik_search'
			]);
		Route::controller('app/mangrove/rehabilitasi', 'MangroveRehabilitasiController', 
			[
				'getIndex' => 'mangroverehabilitasi',
				'getAdd' => 'mangroverehabilitasi_add',
				'getDelete' => 'mangroverehabilitasi_delete',
				'getDetail' => 'mangroverehabilitasi_detail',
				'getUpdate' => 'mangroverehabilitasi_update',
				'getEdit' => 'mangroverehabilitasi_edit',
				'getSearch' => 'mangroverehabilitasi_search'
			]);
		Route::controller('app/mangrove/jenis', 'MangroveJenisController', 
			[
				'getIndex' => 'mangrovejenis',
				'getAdd' => 'mangrovejenis_add',
				'getDelete' => 'mangrovejenis_delete',
				'getDetail' => 'mangrovejenis_detail',
				'getUpdate' => 'mangrovejenis_update',
				'getEdit' => 'mangrovejenis_edit',
				'getSearch' => 'mangrovejenis_search'
			]);

		Route::controller('app/terumbu/milik', 'TerumbuMilikController', 
			[
				'getIndex' => 'terumbumilik',
				'getAdd' => 'terumbumilik_add',
				'getDelete' => 'terumbumilik_delete',
				'getDetail' => 'terumbumilik_detail',
				'getUpdate' => 'terumbumilik_update',
				'getEdit' => 'terumbumilik_edit',
				'getSearch' => 'terumbumilik_search'
			]);
		Route::controller('app/terumbu/rehabilitasi', 'TerumbuRehabilitasiController', 
			[
				'getIndex' => 'terumburehabilitasi',
				'getAdd' => 'terumburehabilitasi_add',
				'getDelete' => 'terumburehabilitasi_delete',
				'getDetail' => 'terumburehabilitasi_detail',
				'getUpdate' => 'terumburehabilitasi_update',
				'getEdit' => 'terumburehabilitasi_edit',
				'getSearch' => 'terumburehabilitasi_search'
			]);
		Route::controller('app/terumbu/jenis', 'TerumbuJenisController', 
			[
				'getIndex' => 'terumbujenis',
				'getAdd' => 'terumbujenis_add',
				'getDelete' => 'terumbujenis_delete',
				'getDetail' => 'terumbujenis_detail',
				'getUpdate' => 'terumbujenis_update',
				'getEdit' => 'terumbujenis_edit',
				'getSearch' => 'terumbujenis_search'
			]);

		Route::controller('app/jumlah-penduduk', 'JumlahPendudukController',
			[
				'getIndex' => 'jumlahpenduduk',
				'getAdd' => 'jumlahpenduduk_add',
				'getDelete' => 'jumlahpenduduk_delete',
				'getDetail' => 'jumlahpenduduk_detail',
				'getEdit' => 'jumlahpenduduk_edit',
				'getUpdate' => 'jumlahpenduduk_update',
				'getSearch' => 'jumlahpenduduk_search',
				'getExportExcel' => 'jumlahpenduduk_xl',
				'getExportPdf' => 'jumlahpenduduk_pdf'
			]);
		Route::get('get-kabupaten/{id}', 'LokasiController@get_kabupaten');
		Route::get('get-kecamatan/{id}', 'LokasiController@get_kecamatan');
		Route::get('get-desa/{id}', 'LokasiController@get_desa');

		Route::controller('app/budidayarumputlaut', 'BudidayaRumputLautController', 
			[

				'getIndex' => 'budidayarumputlaut',
				'getAdd'  => 'budidayarumputlaut_tambah',
				'getEdit' => 'budidayarumputlaut_edit',
				'getUpdate'  => 'budidayarumputlaut_update',
				'getDelete' => 'budidayarumputlaut_hapus',
				'getDetail'  => 'budidayarumputlaut_detail',

			]);

		Route::controller('app/kolamairtawar', 'BudidayaKolamAirTawarController', 
			[

				'getIndex' => 'kolamairtawar',
				'getAdd'  => 'kolamairtawar_tambah',
				'getEdit' => 'kolamairtawar_edit',
				'getUpdate'  => 'kolamairtawar_update',
				'getDelete' => 'kolamairtawar_hapus',
				'getDetail'  => 'kolamairtawar_detail',

			]);

		Route::controller('app/kjaairtawar', 'BudidayaKJAairtawarController', 
			[

				'getIndex' => 'kjaairtawar',
				'getAdd'  => 'kjaairtawar_tambah',
				'getEdit' => 'kjaairtawar_edit',
				'getUpdate'  => 'kjaairtawar_update',
				'getDelete' => 'kjaairtawar_hapus',
				'getDetail'  => 'kjaairtawar_detail',

			]);

		Route::controller('app/kjaairlaut', 'BudidayaKJAairlautController', 
			[

				'getIndex' => 'kjaairlaut',
				'getAdd'  => 'kjaairlaut_tambah',
				'getEdit' => 'kjaairlaut_edit',
				'getUpdate'  => 'kjaairlaut_update',
				'getDelete' => 'kjaairlaut_hapus',
				'getDetail'  => 'kjaairlaut_detail',

			]);

		Route::controller('app/budidayaairpayau', 'BudidayaAirPayauController', 
			[

				'getIndex' => 'budidayaairpayau',
				'getAdd'  => 'budidayaairpayau_tambah',
				'getEdit' => 'budidayaairpayau_edit',
				'getUpdate'  => 'budidayaairpayau_update',
				'getDelete' => 'budidayaairpayau_hapus',
				'getDetail'  => 'budidayaairpayau_detail',

			]);

		Route::controller('app/airtawar', 'AirTawarController', 
			[

				'getIndex' => 'airtawar',
				'getTambah'  => 'air_tawar_tambah',
				'getEdit' => 'airtawar_edit',
				'getUpdate'  => 'airtawar_update',
				'getHapus' => 'airtawar_hapus',
				'getDetail'  => 'airtawar_get_detail',

			]);

		Route::controller('app/rumputlaut', 'RumputLautController', 
			[

				'getIndex' => 'rumputlaut',
				'getTambah'  => 'rumputlaut_tambah',
				'getEdit' => 'rumputlaut_edit',
				'getUpdate'  => 'rumputlaut_update',
				'getHapus' => 'rumputlaut_hapus',
				'getDetail'  => 'rumputlaut_get_detail',

			]);

		Route::controller('app/tambak', 'TambakController', 
			[

				'getIndex' => 'tambak',
				'getTambah'  => 'tambak_tambah',
				'getEdit' => 'tambak_edit',
				'getUpdate'  => 'tambak_update',
				'getHapus' => 'tambak_hapus',
				'getDetail'  => 'tambak_get_detail',

			]);

		Route::controller('app/bantuan', 'RefBantuanController',
			[
				'getIndex' => 'ref_bantuan',
				'postSimpan' => 'ref_bantuan_simpan',
				'getEdit' => 'ref_bantuan_edit',
				'postUpdate' => 'ref_bantuan_update',
				'getHapus' => 'ref_bantuan_hapus',

			]);

		Route::controller('app/master/lokasi/prov', 'LokasiProvController',
			[
				'getIndex' => 'prov',
				'getAdd' => 'prov_add',
				'getDelete' => 'prov_delete',
				'getUpdate' => 'prov_update',
				'getEdit' => 'prov_edit',
			]);
		Route::controller('app/master/lokasi/kec', 'LokasiKecController',
			[
				'getIndex' => 'kec',
				'getAdd' => 'kec_add',
				'getDelete' => 'kec_delete',
				'getUpdate' => 'kec_update',
				'getEdit' => 'kec_edit',
			]);
		Route::controller('app/master/lokasi/desa', 'LokasiDesaController',
			[
				'getIndex' => 'desa',
				'getAdd' => 'desa_add',
				'getDelete' => 'desa_delete',
				'getUpdate' => 'desa_update',
				'getEdit' => 'desa_edit',
			]);

		Route::get('/app/master/bantuan', function () {
			return view('app.master.bantuan');
		});
	 

		Route::get('/app/master/jabatan', function () {
			return view('app.master.jabatan');
		});

		Route::get('/app/master/jenis-usaha', function () {
			return view('app.master.jenis-usaha');
		});


		Route::get('/app/master/usaha', function () {
			return view('app.master.usaha');
		});

		Route::controller('/app/pengaturan', 'PengaturanController',
			[
				'getIndex'  => 'pengaturan',
				'getUpdate'  => 'pengaturan_update',
				'getUpdatePassword'  => 'pengaturan_update_password',
		]);

		Route::controller('app/master/jenisolahan', 'JenisOlahanController',
			[
				'getIndex'  => 'jenisolahan',
				'getTambah'  => 'jenisolahan_tambah',
				'getUpdate'  => 'jenisolahan_update',
				'getHapus'  => 'jenisolahan_hapus',
			]);

		Route::controller('app/master/merekdagang', 'MerekDagangController',
			[
				'getIndex'		=>	'merekdagang',
				'getTambah'		=>	'merekdagang_tambah',
				'getUpdate'		=>	'merekdagang_update',
				'getHapus'		=>	'merekdagang_hapus',
			]);

		Route::controller('app/kelompok', 'KelompokController',
			[
				'getIndex'  => 'kelompok',
				'getTambah'  => 'kelompok_tambah',
				'getUpdate'  => 'kelompok_update',
				'getHapus'  => 'kelompok_hapus',
				'getDetail'  => 'kelompok_get_detail',
				'getDetailAnggota'  => 'kelompok_get_detail_anggota',
			]);

		Route::controller('app/master/bantuan', 'BantuanController',
			[
				'getIndex'  => 'bantuan',
				'getTambah'  => 'bantuan_tambah',
				'getHapus'  => 'bantuan_hapus',
				'getUpdate'  => 'bantuan_update',
			]);
		Route::controller('app/master/laporan', 'LaporanController',
			[
				'getIndex'  => 'laporan',
				'getAdd' => 'laporan_tambah',
				'getDelete'  => 'laporan_hapus',
				'getUpdate'  => 'laporan_update',
			]);
		Route::controller('app/master/jabatan', 'JabatanController',
			[
				'getIndex'  => 'jabatan',
				'getTambah'  => 'jabatan_tambah',
				'getHapus'  => 'jabatan_hapus',
				'getUpdate'  => 'jabatan_update',
			]);
		Route::controller('app/master/usaha', 'UsahaController',
			[
				'getIndex'  => 'usaha',
				'getTambah' => 'usaha_tambah',
				'getHapus'  => 'usaha_hapus',
				'getUpdate'  => 'usaha_update',
			]);
		Route::controller('app/master/sarana-pembudidaya', 'SaranaPembudidayaController',
			[
				'getIndex'  => 'saranapembudidaya',
				'getTambah' => 'saranapembudidaya_tambah',
				'getHapus'  => 'saranapembudidaya_hapus',
				'getUpdate' => 'saranapembudidaya_update',
			]);
		Route::controller('app/master/sarana-nelayan', 'SaranaNelayanController',
			[
				'getIndex'  => 'sarananelayan',
				'getTambah' => 'sarananelayan_tambah',
				'getHapus'  => 'sarananelayan_hapus',
				'getUpdate' => 'sarananelayan_update',
			]);
		Route::controller('app/master/sarana-pengolah', 'SaranaPengolahController',
			[
				'getIndex'  => 'saranapengolah',
				'getTambah'  => 'saranapengolah_tambah',
				'getHapus'	=>	'saranapengolah_hapus',
				'getUpdate'	=>	'saranapengolah_update',
			]);
		Route::controller('app/administrator', 'AdministratorController',
			[
				'getIndex'  => 'administrator',
				'postTambah'  => 'administrator_tambah',
				'getHapus'	=>	'administrator_hapus',
				'postUpdate'	=>	'administrator_update',
			]);
		Route::controller('app/produksi', 'ProduksiController',
			[
				'getIndex'  => 'produksi'
			]);

	});

	Route::get('app/lapor-masalah', 'app\EmailController@LaporMasalah');

	Route::get('/mediasakti/validasi-app', 'ValidasiController@index');
	Route::post('/mediasakti/validasi-app', 'ValidasiController@validasi');


/* Admin Blog */
	Route::group(['middleware' => ['MustLogin', 'Blog'], 'namespace' => 'Admin' ], function(){

		Route::get('admin', 'BerandaController@index');
		Route::get('home', function(){
			return redirect('admin');
		});

		Route::get( 'admin/pencarian', [ 'as' => 'pencarian', 'uses' => 'BerandaController@pencarian' ] );

		// Blog Admin
		Route::controller('admin/blog', 'BlogController',
			[
				'getIndex' 			 => 'blog',
				'getDraft' 			 => 'blog_draft',
				'getCari' 			 => 'blog_cari',
				'getArsip' 			 => 'blog_arsip',
				'getTambah' 		 => 'blog_tambah',
				'postSimpan' 		 => 'blog_simpan',
				'getEdit' 			 => 'blog_edit',
				'postUpdate' 		 => 'blog_update',
				'postHapus' 		 => 'blog_hapus',
				'postArsipkan' 		 => 'blog_arsipkan',
				'postDraftkan' 		 => 'blog_draftkan',
				'postPublish' 	 	 => 'blog_publish',
				'postTambahKategori' => 'tambah_kategori',
				'getKategori' 		 => 'get_kategori',
				'getKategoriEdit' 	 => 'get_kategori_edit',
			]);

		// Pages / Halaman
		Route::controller('admin/page', 'PageController',
			[
				'getIndex'		=> 'page',
				'getTambah'		=> 'page_tambah',
				'postSimpan'	=> 'page_simpan',
				'getEdit'		=> 'page_edit',
				'postUpdate'	=> 'page_update',
				'getDraft' 		=> 'page_draft',
				'getCari' 		=> 'page_cari',
				'getArsip' 		=> 'page_arsip',
				'postHapus' 	=> 'page_hapus',
				'postArsipkan' 	=> 'page_arsipkan',
				'postDraftkan' 	=> 'page_draftkan',
				'postPublish' 	=> 'page_publish',
			]);

		// Kategori
		Route::controller('admin/kategori', 'KategoriController',
			[
				'getIndex'	=> 'kategori',
				'postSimpan' => 'kategori_simpan',
				'postUpdate' => 'kategori_update',
				'postHapus'	=> 'kategori_hapus',
			]);

		// Pesan
		Route::controller('admin/pesan', 'PesanController',
			[
				'getIndex' => 'pesan',
				'postHapus' => 'pesan_hapus',
				'postReadAll' => 'pesan_read_all',
				'getDetail' => 'pesan_detail',
				'getTulis' => 'pesan_tulis',
				'postKirim' => 'pesan_kirim',
				'getCari' => 'pesan_cari',
				'getUpdateNotif' => 'pesan_update_notif',
			]);

		// User
		Route::controller('admin/user', 'UserController',
			[
				'getIndex' => 'user',
				'getTambah' => 'user_tambah',
				'postSimpan' => 'user_simpan',
				'getHapus' => 'user_hapus',
				'getPengaturan' => 'user_pengaturan',
				'postPengaturan' => 'user_simpan_pengaturan',
				'postGantiPassword' => 'user_ganti_password'
			]);

		// Setting web
		Route::controller('admin/setting', 'SettingController',
			[
				'getIndex' => 'setting',
				'postUpdate' => 'setting_update',
				'getRefresh' => 'setting_refresh',
			]);

		// Menu
		Route::controller('admin/menu', 'MenuController',
			[
				'getIndex' => 'menu',
				'postSimpan' => 'menu_simpan',
				'postUpdate' => 'menu_update',
				'postUpdateUrutan' => 'menu_update_urutan',
				'postHapus' => 'menu_hapus',
				'getParentMenu' => 'menu_parent_menu',
			]);

		// GALERI
		Route::controller('admin/galeri', 'GaleriController',
			[
				'getIndex' => 'galeri',
				'getTambah' => 'galeri_tambah',
				'postSimpan' => 'galeri_simpan',
				'postHapus' => 'galeri_hapus',
			]);

	});
	
	Route::group([ 'middleware' => 'Validasi', 'namespace' => 'Admin'], function(){

		Route::get('admin/login', ['as' => 'getLogin', 'uses' => 'LoginController@getLogin']);
		Route::post('admin/login', ['as' => 'postLogin', 'uses' => 'LoginController@postLogin']);
		Route::get('admin/logout', ['as' => 'getLogout', 'uses' => 'LoginController@logout']);

	});
