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

    Route::get('/app/beranda', function () {
        return view('app.beranda.index');
    });

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

    Route::get('/app/pengolah', function () {
        return view('app.pengolah.index');
    });

    Route::get('/app/master/bantuan', function () {
        return view('app.master.bantuan');
    });


    Route::get('/app/kelompok', function () {
        return view('app.kelompok.index');
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

    Route::get('/app/pengaturan', function () {
        return view('app.pengaturan.index');
    });

    Route::controller('app/kelompok', 'KelompokController',
        [
            'getIndex'  => 'kelompok',
            'getTambah'  => 'kelompok_tambah',
            'getHapus'  => 'kelompok_hapus',
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
        ]);
    Route::controller('app/master/usaha', 'UsahaController',
        [
            'getIndex'  => 'usaha',
            'getTambah' => 'usaha_tambah',
            'getHapus'  => 'usaha_hapus',
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


