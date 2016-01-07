<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(App\User::class, function (Faker\Generator $faker) {

    $name = $faker->name;
    $username = str_slug($name);
    $profesi = ['Pembudidaya', 'Nelayan'];
    $index = rand(0,1);
    return [
        'name' => $name,
        'username' => $username,
        'email' => $faker->email,
        'nik' => str_random(10),
        'alamat' => $faker->address,
        'no_kartu_nelayan' => str_random(10),
        'id_jabatan' => rand(1,2),
        'id_kelompok' => rand(1,2),
        'id_usaha' => rand(1,4),
        'profesi' => $profesi[$index],
        'password' => bcrypt($username),
        'remember_token' => str_random(10)
    ];
});

$factory->define(App\Blog::class, function ($faker) {

	$judul 	= $faker->sentence(mt_rand(3, 10));
	$slug 	= str_slug($judul);
  return [
    'judul' => $judul,
    'slug' => $slug,
    'konten' => join("\n\n", $faker->paragraphs(mt_rand(3, 6))),
    'id_user' => 1
     ];
});

$factory->define(App\BlogKategori::class, function ($faker) {

  return [
    'id_blog' => rand(1,20),
    'id_kategori' => rand(1,3)
     ];
});

$factory->define(App\Page::class, function ($faker) {

  $judul  = $faker->sentence(mt_rand(3, 10));
  $slug   = str_slug($judul);
  return [
    'judul' => $judul,
    'slug' => $slug,
    'konten' => join("\n\n", $faker->paragraphs(mt_rand(3, 6))),
    'id_user' => 1
     ];
});

$factory->define(App\Pesan::class, function ($faker) {

  $tipe = array('Masuk','Keluar');
  $key = rand(0,1);

  return [
    'nama' => $faker->name,
    'subjek' => $faker->sentence(mt_rand(1, 2)),
    'email' => $faker->email,
    'pesan' => join("\n\n", $faker->paragraphs(mt_rand(3, 6))),
    'tipe' => $tipe[$key],
     ];
});

$factory->define(App\Kategori::class, function ($faker) {

  $nm_kat = $faker->sentence(mt_rand(1, 1));
  $slug = str_slug($nm_kat,"-");

  return [ 'nama_kategori' => $nm_kat ,'slug' => $slug ];

});

$factory->define(App\Setting::class, function ($faker) {

  return [
    'sitename' => 'Web Ku',
    'description' => 'Lorem Ipsum dolor sit amet consectetur',
    'email' => 'contoh@mail.com',
    'tag' => 'Lorem, ipsum, dolor, sit amet',
    ];

});

$factory->define(App\Menu::class, function ($faker) {

  return [
    'judul' => 'Beranda',
    'link' => '/',
    'parent_id' => 0,
    'urutan' => 1,
    'lokasi' => 'Header',
    'jenis' => 'Custom',
    ];

});

$factory->define(App\Kelompok::class, function ($faker) {

  return [
    'nama' => $faker->name,
    'alamat' => $faker->address,
    'no_rekening' => rand(000000,999999),
    'no_rekening' => $faker->name,
    ];

});