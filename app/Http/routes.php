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

	Route::group(['middleware' => 'MustLogin', 'namespace' => 'App' ], function () {

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

			]);
		Route::controller('app/mangrove', 'MangroveController', 
			[
				'getIndex' => 'mangrove',
				'getTambah' => 'mangrove_tambah'
			]);

		Route::get('get-kabupaten/{id}', 'PemasarController@get_kabupaten');
		Route::get('get-kecamatan/{id}', 'PemasarController@get_kecamatan');
		Route::get('get-desa/{id}', 'PemasarController@get_desa');

		Route::controller('app/airtawar', 'AirTawarController', 
			[

				'getIndex' => 'airtawar',
				'getTambah'  => 'air_tawar_tambah',
				'getEdit' => 'airtawar_edit',
				'getUpdate'  => 'airtawar_update',
				'getHapus' => 'airtawar_hapus',

			]);

		Route::controller('app/bantuan', 'RefBantuanController',
			[
				'getIndex' => 'ref_bantuan',
				'postSimpan' => 'ref_bantuan_simpan',
				'getEdit' => 'ref_bantuan_edit',
				'postUpdate' => 'ref_bantuan_update',
				'getHapus' => 'ref_bantuan_hapus',

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
