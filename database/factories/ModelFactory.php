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
    $klp = ['kl1', 'kl2', 'kl3'];
    $index2 = rand(0,3);

    return [
        'name' => $name,
        'username' => $username,
        'email' => $faker->email,
        'nik' => str_random(10),
        'alamat' => $faker->address,
        'no_kartu_nelayan' => str_random(10),
        'id_jabatan' => rand(1,3),
        'id_kelompok' => $klp[$index],
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

  return [
    'judul' => "Visi, Misi, Kebijakan Pembangunan",
    'slug' => "visi-misi",
    'konten' => '
      
      <div class="col-sm-12 text-center">
        
        <h2 class="quote-name" style="font-size: 40px;">Visi</h2>

          <div class="separator"><i class="fa fa-quote-left"></i></div>

          <p class="quote-role">
            Terwujudnya pembangunan perikanan dan kelautan yang berkelanjutan, berdaya saing dan berkeadilan untuk kesejahteraan masyarakat.
          </p>

          <br>

      </div>


      <div class="about-left shadow col-sm-6">
        
        <img src="img/visi.png" width="100%" alt="">

      </div>

      <div class="about-right about-list col-sm-6">
        
        <h4>Misi</h4>
        
        <ol type="a">
          <li>Meningkatkan pengelolaan dan pemanfaatan sumberdaya perikanan dan kelautan secara optimal dan berkelanjutan.</li>
          <li>Memberikan pelayanan prima bagi pengembangan usaha perikanan dan kelautan yang berdaya saing.</li>
          <li>Meningkatkan pengembangan revitalisasi budidaya rumput laut, ikan air tawar dan bandeng serta udang, melalui pemanfaatan teknologi yang ramah lingkungan</li>
          <li>Penciptaan iklim usaha kondusif bagi pelaku ekonomi dalam pengembangan kelautan dan perikanan.</li>
          <li>Pembinaan dan pengembangan kelembagaan yang berkesinambungan.</li>
          <li>Mendukung pengembangan wisata bahari.</li>
        </ol>


      </div>
        

      <div class="col-sm-12">
        
        <br>
        <br>
      
        <h4>Potensi Perikanan dan Kelautan dimanfaatkan oleh Nelayan dan Pembudidaya ikan  Untuk Bidang  :</h4>

        <p><span style="color:#ff0000;">Perikanan Tangkap</span> Merupakan Lokasi yang <b>strategis</b> bagi Nelayan&nbsp; baik nelayan Kab. Bantaeng maupun kabupaten tetangga (Bulukumba, Jeneponto dan Takalar) sebagai Tempat berlabuh untuk &nbsp;menunjang aktifitas nelayan Tangkap maka Pemerintah Kabupaten Bantaeng berupaya untuk menyediakan sarana dan prasarana perikanan tangkap berupa Pangkalan Pendaratan Ikan (PPI) akan terealisasi&nbsp; pada tahun 2014 dengan sumber anggaran Tugas Pembantuan dari Kementrian Kelautan dan Perikanan RI.</p>

        <p><span style="color:#ff0000;">Pengolahan dan Pemasaran Hasil Perikanan (P2HP)</span> :&nbsp; Berorientasi pada Pengembangan Sarana dan Prasarana Pengolahan dan Pemasaran Hasil Perikanan dengan kegiatan Penyediaan/rehabilitasi sarana dan prasarana pengolahan dan pemasaran dengan target peningkatan pengolahan volume ikan termasuk rumput laut dan kapasitas unit pengolahan ikan serta peningkatan jumlah konsumsi ikan per kapita, Unit Pengolahan dan Pemasaran berupa Kelompok Pengolahan yang sudah terbentuk sebanyak 56 Kelompok namun yang akatif berproduksi sebanyak 22 Kelompok dengan tingkat produksi patanu 2013 sebesar 574 Kg</p>

        <p><span style="color:#ff0000;">Pengawasan Perikanan</span> : Pengembangan Sarana dan Prasarana Pengawasan, Kab. Bantaeng adalah salah satu kabupaten yang telah terbentuk POKMASWAS sebanyak 10 POKMASWAS yang telah dilengkapi dengan Kapal Pengawas untuk menikatkan ketaatan dan ketertiban dalam memanfaatkan sumberdaya kelautan dan perikanan dan pada tahun 2014 telah dibanguna garasi speet boot (Resteelsteiger) dan Bangunan Pos Pengawas Laut.</p>

      </div>

    ',
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
    'sitename' => 'Dinas Perikanan dan Kelautan Kab. Bantaeng',
    'description' => 'Website ini adalah website resmi Dinas Perikanan dan Kelautan Kabupaten Bantaeng',
    'email' => 'contoh@mail.com',
    'visi_misi' => 'Terwujudnya pembangunan perikanan dan kelautan yang berkelanjutan, berdaya saing dan berkeadilan untuk kesejahteraan masyarakat',
    'tag' => 'Lorem, ipsum, dolor, sit amet',
    'alamat' => 'Street Name Ankara Turkey',
    'phone' => '+90 (123) 456 78 99',
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