<?php

Route::get('/', function () {
    return view('welcome');
});



// App
Route::group([ 'namespace' => 'App'], function(){
    
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


    Route::controller('app/bantuan', 'RefBantuanController',
        [
            'getIndex' => 'ref_bantuan',
            'postSimpan' => 'ref_bantuan_simpan',
            'getEdit' => 'ref_bantuan_edit',
            'postUpdate' => 'ref_bantuan_update',
            'getHapus' => 'ref_bantuan_hapus',

        ]);

    Route::get('/app/pengolah', function () {
        return view('app.pengolah.index');
    });

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
        ]);
    Route::controller('app/master/sarana-nelayan', 'SaranaNelayanController',
        [
            'getIndex'  => 'sarananelayan',
            'getTambah' => 'sarananelayan_tambah',
            'getHapus'  => 'sarananelayan_hapus',
        ]);
});

Route::get('/mediasakti/validasi-app', 'ValidasiController@index');
Route::post('/mediasakti/validasi-app', 'ValidasiController@validasi');