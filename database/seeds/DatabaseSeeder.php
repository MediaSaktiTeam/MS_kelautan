<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $this->call('BlogTableSeeder');
        $this->call('KategoriTableSeeder');
        $this->call('BlogKategoriTableSeeder');
        $this->call('PageTableSeeder');
        $this->call('PesanTableSeeder');
        $this->call('UserTableSeeder');
        $this->call('SettingTableSeeder');
        $this->call('MenuTableSeeder');
        $this->call('BantuanMasterSeeder');
        $this->call('KelompokSeeder');
        // $this->call('SubUsahaSeeder');
        $this->call('SubSaranaSeeder');
        $this->call('JabatanSeeder');
        $this->call('ValidasiTableSeeder');
        $this->call('PermissionsSeeder');
        $this->call('ProvinsiTableSeeder');
        $this->call('KabupatenTableSeeder');
        $this->call('KecamatanTableSeeder');
        $this->call('DesaTableSeeder');
        
        
    }
}


class ProvinsiTableSeeder extends Seeder
{
  public function run()
  {
    App\Provinsi::truncate();
    DB::table('provinsi')->insert(array (
            0 => 
            array (
                'id' => '73',
                'nama' => 'Sulawesi Selatan',
            ),
        ));
        
    }
}

class KabupatenTableSeeder extends Seeder
{
  public function run()
  {
    App\Kabupaten::truncate();
    DB::table('kabupaten')->insert(array (
            0 => 
            array (
                'id' => '7303',
                'id_prov' => '73',
                'nama' => 'Kab. Bantaeng',
            ),
        ));
        
        
    }
}

class KecamatanTableSeeder extends Seeder
{
  public function run()
  {
    App\Kecamatan::truncate();
    DB::table('kecamatan')->insert(array (
            0 => 
            array (
                'id' => '7303010',
                'id_kabupaten' => '7303',
                'nama' => ' Bissappu',
            ),
            1 => 
            array (
                'id' => '7303011',
                'id_kabupaten' => '7303',
                'nama' => ' Uluere',
            ),
            2 => 
            array (
                'id' => '7303012',
                'id_kabupaten' => '7303',
                'nama' => ' Sinoa',
            ),
            3 => 
            array (
                'id' => '7303020',
                'id_kabupaten' => '7303',
                'nama' => ' Bantaeng',
            ),
            4 => 
            array (
                'id' => '7303021',
                'id_kabupaten' => '7303',
                'nama' => ' Eremerasa',
            ),
            5 => 
            array (
                'id' => '7303030',
                'id_kabupaten' => '7303',
                'nama' => ' Tompobulu',
            ),
            6 => 
            array (
                'id' => '7303031',
                'id_kabupaten' => '7303',
                'nama' => ' Pa\'jukukang',
            ),
            7 => 
            array (
                'id' => '7303032',
                'id_kabupaten' => '7303',
                'nama' => ' Gantarangkeke',
            ),
        ));
        
        
    }
}

class DesaTableSeeder extends Seeder
{
  public function run()
  {
    App\Desa::truncate();
    DB::table('desa')->insert(array (
            0 => 
            array (
                'id_kecamatan' => '7303010',
                'nama' => 'Bonto Jai',
            ),
            1 => 
            array (
                'id_kecamatan' => '7303010',
                'nama' => 'Bonto Manai',
            ),
            2 => 
            array (
                'id_kecamatan' => '7303010',
                'nama' => 'Bonto Lebang',
            ),
            3 => 
            array (
                'id_kecamatan' => '7303010',
                'nama' => 'Bonto Sunggu',
            ),
            4 => 
            array (
                'id_kecamatan' => '7303010',
                'nama' => 'Bonto Rita',
            ),
            5 => 
            array (
                'id_kecamatan' => '7303010',
                'nama' => 'Bonto  Atu',
            ),
            6 => 
            array (
                'id_kecamatan' => '7303010',
                'nama' => 'Bonto Salluang',
            ),
            7 => 
            array (
                'id_kecamatan' => '7303010',
                'nama' => 'Bonto Langkasa',
            ),
            8 => 
            array (
                'id_kecamatan' => '7303010',
                'nama' => 'Bonto Cinde',
            ),
            9 => 
            array (
                'id_kecamatan' => '7303010',
                'nama' => 'Bonto Loe',
            ),
            10 => 
            array (
                'id_kecamatan' => '7303010',
                'nama' => 'Bonto Jaya',
            ),
            11 => 
            array (
                'id_kecamatan' => '7303011',
                'nama' => 'Bonto Rannu',
            ),
            12 => 
            array (
                'id_kecamatan' => '7303011',
                'nama' => 'Bonto Tallasa',
            ),
            13 => 
            array (
                'id_kecamatan' => '7303011',
                'nama' => 'Bonto Daeng',
            ),
            14 => 
            array (
                'id_kecamatan' => '7303011',
                'nama' => 'Bonto Tangnga',
            ),
            15 => 
            array (
                'id_kecamatan' => '7303011',
                'nama' => 'Bonto Marannu',
            ),
            16 => 
            array (
                'id_kecamatan' => '7303011',
                'nama' => 'Bonto Lojong',
            ),
            17 => 
            array (
                'id_kecamatan' => '7303012',
                'nama' => 'Bonto Matene',
            ),
            18 => 
            array (
                'id_kecamatan' => '7303012',
                'nama' => 'Bonto Tiro',
            ),
            19 => 
            array (
                'id_kecamatan' => '7303012',
                'nama' => 'Bonto Majannang',
            ),
            20 => 
            array (
                'id_kecamatan' => '7303012',
                'nama' => 'Bonto Karaeng',
            ),
            21 => 
            array (
                'id_kecamatan' => '7303012',
                'nama' => 'Bonto Maccini',
            ),
            22 => 
            array (
                'id_kecamatan' => '7303012',
                'nama' => 'Bonto Bulaeng',
            ),
            23 => 
            array (
                'id_kecamatan' => '7303020',
                'nama' => 'Tappanjeng',
            ),
            24 => 
            array (
                'id_kecamatan' => '7303020',
                'nama' => 'Pallantikang',
            ),
            25 => 
            array (
                'id_kecamatan' => '7303020',
                'nama' => 'Letta',
            ),
            26 => 
            array (
                'id_kecamatan' => '7303020',
                'nama' => 'Mallilingi',
            ),
            27 => 
            array (
                'id_kecamatan' => '7303020',
                'nama' => 'Lembang',
            ),
            28 => 
            array (
                'id_kecamatan' => '7303020',
                'nama' => 'Lamalaka',
            ),
            29 => 
            array (
                'id_kecamatan' => '7303020',
                'nama' => 'Karatuang',
            ),
            30 => 
            array (
                'id_kecamatan' => '7303020',
                'nama' => 'Onto',
            ),
            31 => 
            array (
                'id_kecamatan' => '7303020',
                'nama' => 'Kayu Loe',
            ),
            32 => 
            array (
                'id_kecamatan' => '7303021',
                'nama' => 'Ulugalung',
            ),
            33 => 
            array (
                'id_kecamatan' => '7303021',
                'nama' => 'Mamampang',
            ),
            34 => 
            array (
                'id_kecamatan' => '7303021',
                'nama' => 'Mappilawing',
            ),
            35 => 
            array (
                'id_kecamatan' => '7303021',
                'nama' => 'Lonrong',
            ),
            36 => 
            array (
                'id_kecamatan' => '7303021',
                'nama' => 'Barua',
            ),
            37 => 
            array (
                'id_kecamatan' => '7303021',
                'nama' => 'Kampala',
            ),
            38 => 
            array (
                'id_kecamatan' => '7303021',
                'nama' => 'Pa\'bentengan',
            ),
            39 => 
            array (
                'id_kecamatan' => '7303021',
                'nama' => 'Parangloe',
            ),
            40 => 
            array (
                'id_kecamatan' => '7303021',
                'nama' => 'Pa\'bumbungan',
            ),
            41 => 
            array (
                'id_kecamatan' => '7303030',
                'nama' => 'Lembang Gantarangkeke',
            ),
            42 => 
            array (
                'id_kecamatan' => '7303030',
                'nama' => 'Pattallassang',
            ),
            43 => 
            array (
                'id_kecamatan' => '7303030',
                'nama' => 'Bonto-bontoa',
            ),
            44 => 
            array (
                'id_kecamatan' => '7303030',
                'nama' => 'Banyorang',
            ),
            45 => 
            array (
                'id_kecamatan' => '7303030',
                'nama' => 'Campaga',
            ),
            46 => 
            array (
                'id_kecamatan' => '7303030',
                'nama' => 'Bonto Tappalang',
            ),
            47 => 
            array (
                'id_kecamatan' => '7303030',
                'nama' => 'Balumbung',
            ),
            48 => 
            array (
                'id_kecamatan' => '7303030',
                'nama' => 'Ereng-ereng',
            ),
            49 => 
            array (
                'id_kecamatan' => '7303030',
                'nama' => 'Labbo',
            ),
            50 => 
            array (
                'id_kecamatan' => '7303030',
                'nama' => 'Pattaneteang',
            ),
            51 => 
            array (
                'id_kecamatan' => '7303031',
                'nama' => 'Rappoa',
            ),
            52 => 
            array (
                'id_kecamatan' => '7303031',
                'nama' => 'Biangloe',
            ),
            53 => 
            array (
                'id_kecamatan' => '7303031',
                'nama' => 'Lumpangan',
            ),
            54 => 
            array (
                'id_kecamatan' => '7303031',
                'nama' => 'Biangkeke',
            ),
            55 => 
            array (
                'id_kecamatan' => '7303031',
                'nama' => 'Nipa-nipa',
            ),
            56 => 
            array (
                'id_kecamatan' => '7303031',
                'nama' => 'Pa\'jukukang',
            ),
            57 => 
            array (
                'id_kecamatan' => '7303031',
                'nama' => 'Borongloe',
            ),
            58 => 
            array (
                'id_kecamatan' => '7303031',
                'nama' => 'Papanloe',
            ),
            59 => 
            array (
                'id_kecamatan' => '7303031',
                'nama' => 'Baruga',
            ),
            60 => 
            array (
                'id_kecamatan' => '7303031',
                'nama' => 'Batukaraeng',
            ),
            61 => 
            array (
                'id_kecamatan' => '7303032',
                'nama' => 'Tanahloe',
            ),
            62 => 
            array (
                'id_kecamatan' => '7303032',
                'nama' => 'Tombolo',
            ),
            63 => 
            array (
                'id_kecamatan' => '7303032',
                'nama' => 'Layoa',
            ),
            64 => 
            array (
                'id_kecamatan' => '7303032',
                'nama' => 'Bajiminasa',
            ),
            65 => 
            array (
                'id_kecamatan' => '7303032',
                'nama' => 'Kaloling',
            ),
            66 => 
            array (
                'id_kecamatan' => '7303032',
                'nama' => 'Gantarangkeke',
            ),
        ));

        
        
    }
}

class BlogTableSeeder extends Seeder
{
  public function run()
  {
    App\Blog::truncate();

    factory(App\Blog::class, 20)->create();
       
        
        
        
    }
}

class BlogKategoriTableSeeder extends Seeder
{
  public function run()
  {
    App\BlogKategori::truncate();

    factory(App\BlogKategori::class, 25)->create();
       
        
        
        
    }
}

class PageTableSeeder extends Seeder
{
  public function run()
  {

        \DB::table('site_pages')->delete();
        
        \DB::table('site_pages')->insert(array (
            0 => 
            array (
                'id' => 1,
                'judul' => 'Visi, Misi, Kebijakan Pembangunan',
                'slug' => 'visi-misi',
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
                'id_user' => 1,
                'gambar' => '',
                'arsip' => '0',
                'draft' => '0',
                'created_at' => '2016-05-20 21:23:53',
                'updated_at' => '2016-05-20 21:23:53',
            ),
            1 => 
            array (
                'id' => 2,
                'judul' => 'Peta Kab. Bantaeng',
                'slug' => 'peta-kab-bantaeng',
                'konten' => '<div class="about-left col-sm-6">
<h3>Peta Kabupaten Bantaeng</h3>

<p>Kabupaten Bantaeng adalah sebuah kabupaten di provinsi Sulawesi Selatan, Indonesia. Terletak dibagian selatan provinsi Sulawesi Selatan. Kabupaten ini memiliki luas wilayah 395,83 km&sup2; atau 39.583 Ha yang dirinci berdasarkan Lahan Sawah mencapai 7.253 Ha (18,32%) dan Lahan Kering mencapai 32.330 Ha. Secara administrasi Kabupaten Bantaeng terdiri atas 8 kecamatan yang terbagi atas 21 kelurahan dan 46 desa. Jumlah penduduk mencapai 170.057 jiwa.[2] Kabupaten Bantaeng terletak di daerah pantai yang memanjang pada bagian barat dan timur sepanjang 21,5 kilometer yang cukup potensial untuk perkembangan perikanan dan rumput laut.</p>
</div>
<!-- end col-sm-6 -->

<div class="about-right shadow col-sm-6"><img alt="" src="img/about-1.jpg" style="width:100%" /><br />
<br />
<br />
&nbsp;</div>

<div class="clearfix">&nbsp;</div>

<div class="about-left shadow col-sm-6"><img alt="" src="img/about-2.png" style="width:100%" /></div>

<div class="about-right about-list col-sm-6">
<h4>Kondisi geografis dan kependudukan</h4>

<p>Secara geografis Kabupaten Bantaeng terletak pada titik 5o21&rsquo;23&rdquo;-5o35&rsquo;26&rdquo; lintang selatan dan 119o51&rsquo;42&rdquo;-120o5&rsquo;26&rdquo; bujur timur. Berjarak 125 Km kearah selatan dari Ibukota Provinsi Sulawesi Selatan. Luas wilayahnya mencapai 395,83 Km2 dengan jumlah penduduk 170.057 jiwa (2006) dengan rincian Laki-laki sebanyak 82.605 jiwa dan perempuan 87.452 jiwa. Terbagi atas 8 kecamatan serta 46 desa dan 21 kelurahan. Pada bagian utara daerah ini terdapat dataran tinggi yang meliputi pegunungan Lompobattang. Sedangkan di bagian selatan membujur dari barat ke timur terdapat dataran rendah yang meliputi pesisir pantai dan persawahan.</p>

<p>Kabupaten Bantaeng yang luasnya mencapai 0,63% dari luas Sulawesi Selatan, masih memiliki potensi alam untuk dikembangkan lebih lanjut. Lahan yang dimilikinya &plusmn; 39.583 Ha. Di Kabupaten Bantaeng mempunyai hutan produksi terbatas 1.262 Ha dan hutan lindung 2.773 Ha. Secara keseluruhan luas kawasan hutan menurut fungsinya di kabupaten Bantaeng sebesar 6.222 Ha (2006).</p>

<div class="about-list-wrap">
<p>Karena sebagian besar penduduknya petani, maka wajar bila Bantaeng sangat mengandalkan sektor pertanian. Masuk dalam pengembangan Karaeng Lompo, sebab memang jenis tanaman sayur-sayurannya sudah berkembang pesat selama ini. Kentang adalah salah satu tanaman holtikultura yang paling menonjol. Data terakhir menunjukkan bahwa produksi kentang mencapai 4.847 ton (2006). Selain kentang, holtikultura lainnya adalah kool 1.642 ton, wortel 325 ton dan buah-buahan seperti pisang dan mangga. Perkembangan produksi perkebunan, khususnya komoditi utama mengalami peningkatan yang cukup berarti.</p>
</div>
</div>
',
                'id_user' => 1,
                'gambar' => '',
                'arsip' => '0',
                'draft' => '0',
                'created_at' => '2016-05-20 21:40:02',
                'updated_at' => '2016-05-20 21:44:36',
            ),
            2 => 
            array (
                'id' => 3,
                'judul' => 'Struktur Organisasi',
                'slug' => 'struktur-organisasi',
                'konten' => '<p>Berikut adalah susunan Struktur Organisasi Diskanlut Kabupater&nbsp;Bantaeng:</p>
',
                'id_user' => 1,
                'gambar' => '',
                'arsip' => '0',
                'draft' => '0',
                'created_at' => '2016-05-20 21:49:22',
                'updated_at' => '2016-05-20 21:49:22',
            ),
        ));
        
        
    }
}

class PesanTableSeeder extends Seeder
{
  public function run()
  {
    App\Pesan::truncate();

    factory(App\Pesan::class, 20)->create();
       
        
        
        
    }
}

class UserTableSeeder extends Seeder
{
  public function run()
  {

    App\User::truncate();

    $data = array(
      array('name' => 'Admin', 'username' => 'admin', 'email' => 'developer@mediasakti.com', 'password' => bcrypt('admin'), 'profesi' => 'Admin'),
      array('name' => 'Pembudidaya', 'username' => 'pembudidaya', 'email' => 'developer1@mediasakti.com', 'password' => bcrypt('pembudidaya'), 'profesi' => 'Admin'),
      array('name' => 'Nelayan', 'username' => 'nelayan', 'email' => 'developer2@mediasakti.com', 'password' => bcrypt('nelayan'), 'profesi' => 'Admin'),
      array('name' => 'Pengolah', 'username' => 'pengolah', 'email' => 'developer3@mediasakti.com', 'password' => bcrypt('pengolah'), 'profesi' => 'Admin'),
      array('name' => 'Pesisir', 'username' => 'pesisir', 'email' => 'developer7@mediasakti.com', 'password' => bcrypt('pesisir'), 'profesi' => 'Admin'),
      array('name' => 'Blog', 'username' => 'blog', 'email' => 'developer4@mediasakti.com', 'password' => bcrypt('blog'), 'profesi' => 'Admin')
    );

    DB::table('users')->insert($data);

       
        
        
        
    }
}

class KategoriTableSeeder extends Seeder
{
  public function run()
  {
    App\Kategori::truncate();

    factory(App\Kategori::class, 5)->create();
       
        
        
        
    }
}

class SettingTableSeeder extends Seeder
{
  public function run()
  {
    App\Setting::truncate();

    factory(App\Setting::class, 2)->create();
       
        
        
        
    }
}

class MenuTableSeeder extends Seeder
{
  public function run()
  {
    App\Menu::truncate();
    
    \DB::table('site_menu')->insert(array (
        0 => 
        array (
            'id' => 1,
            'judul' => 'Beranda',
            'link' => '/',
            'parent_id' => 0,
            'urutan' => 1,
            'lokasi' => 'Header',
            'jenis' => 'Custom',
        ),
        1 => 
        array (
            'id' => 2,
            'judul' => 'Profil',
            'link' => '#',
            'parent_id' => 0,
            'urutan' => 2,
            'lokasi' => 'Header',
            'jenis' => 'Custom',
        ),
        2 => 
        array (
            'id' => 3,
            'judul' => 'Visi, Misi, Kebijakan Pembangunan',
            'link' => 'http://kelautan.dev/page/visi-misi',
            'parent_id' => 2,
            'urutan' => 3,
            'lokasi' => 'Header',
            'jenis' => 'Halaman',
        ),
        3 => 
        array (
            'id' => 4,
            'judul' => 'Peta Kab. Bantaeng',
            'link' => 'http://kelautan.dev/page/peta-kab-bantaeng',
            'parent_id' => 2,
            'urutan' => 1,
            'lokasi' => 'Header',
            'jenis' => 'Halaman',
        ),
        4 => 
        array (
            'id' => 5,
            'judul' => 'Struktur Organisasi',
            'link' => 'http://kelautan.dev/page/struktur-organisasi',
            'parent_id' => 2,
            'urutan' => 2,
            'lokasi' => 'Header',
            'jenis' => 'Halaman',
        ),
        5 => 
        array (
            'id' => 6,
            'judul' => 'Data Umum',
            'link' => '#',
            'parent_id' => 0,
            'urutan' => 3,
            'lokasi' => 'Header',
            'jenis' => 'Custom',
        ),
        6 => 
        array (
            'id' => 7,
            'judul' => 'Bidang',
            'link' => '#',
            'parent_id' => 0,
            'urutan' => 4,
            'lokasi' => 'Header',
            'jenis' => 'Custom',
        ),
        7 => 
        array (
            'id' => 8,
            'judul' => 'Sekretariat',
            'link' => '#',
            'parent_id' => 0,
            'urutan' => 5,
            'lokasi' => 'Header',
            'jenis' => 'Custom',
        ),
        8 => 
        array (
            'id' => 9,
            'judul' => 'Galeri',
            'link' => '#',
            'parent_id' => 0,
            'urutan' => 6,
            'lokasi' => 'Header',
            'jenis' => 'Custom',
        ),
    ));

    }
}

class BantuanMasterSeeder extends Seeder
{

  public function run() {

  App\Bantuan::truncate();

    $data = array(
        array('nama' => 'Bibit', 'jenis' => 'Pembudidaya'),
        array('nama' => 'Pakan', 'jenis' => 'Pembudidaya'),
        array('nama' => 'Tali', 'jenis' => 'Pembudidaya'),
        array('nama' => 'Para-para', 'jenis' => 'Pembudidaya'),
        array('nama' => 'Perahu', 'jenis' => 'Pembudidaya'),
        array('nama' => 'Perahu/Kapal', 'jenis' => 'Nelayan'),
        array('nama' => 'Alat Tangkap', 'jenis' => 'Nelayan'),
        array('nama' => 'Mesin', 'jenis' => 'Nelayan')
      );

      DB::table('app_bantuan_master')->insert($data);

       
        
        
        
    }
}

class SubSaranaSeeder extends Seeder
{

  public function run() {

  App\Sarana::truncate();

    $data = array(
        array('jenis' => 'Budidaya Air Laut', 'sub' => 'Para-para', 'tipe' => 'Pembudidaya'),
        array('jenis' => 'Budidaya Air Laut', 'sub' => 'Perahu', 'tipe' => 'Pembudidaya'),
        array('jenis' => 'Budidaya Air Tawar', 'sub' => 'Luas Lahan < 1 Ha', 'tipe' => 'Pembudidaya'),
        array('jenis' => 'Perahu Kapal', 'sub' => '< 5 GT', 'tipe' => 'Nelayan'),
        array('jenis' => 'Alat Tangkap', 'sub' => 'Pancing', 'tipe' => 'Nelayan'),
        array('jenis' => 'Mesin', 'sub' => '< 5 PK', 'tipe' => 'Nelayan'),
      );

      DB::table('app_sarana')->insert($data);

       
        
        
        
    }
}

class SubUsahaSeeder extends Seeder
{

  public function run() {

    App\Usaha::truncate();

    $data = array(
        array('nama' => 'KJA', 'jenis' => 'Budidaya Air Laut'),
        array('nama' => 'Kolam Tanah', 'jenis' => 'Budidaya Air Tawar'),
        array('nama' => 'Kolam Terpal', 'jenis' => 'Budidaya Air Tawar'),
        array('nama' => 'Tambak', 'jenis' => 'Budidaya Air Payau')
      );

      DB::table('app_usaha')->insert($data);
        
    }
}

class JabatanSeeder extends Seeder
{

  public function run() {

  App\Jabatan::truncate();

    $data = array(
      array('nama' => 'Ketua'),
      array('nama' => 'Wakil'),
      array('nama' => 'Sekretaris'),
      array('nama' => 'Bendahara'),
      array('nama' => 'Anggota'),
    );

    DB::table('app_jabatan')->insert($data);

       
        
        
        
    }
}


class KelompokSeeder extends Seeder
{
  public function run()
  {
    App\Kelompok::truncate();

    $data = array(
        array('id_kelompok' => "kl1", 'nama' => "Bina Nusantara", 'alamat' => "Jl. Oke", 'tipe' => 'Pembudidaya'),
        array('id_kelompok' => "kl2", 'nama' => "Sipakainge", 'alamat' => "Jl. Oke", 'tipe' => 'Pembudidaya'),
        array('id_kelompok' => "kl3", 'nama' => "Sipatokkong", 'alamat' => "Jl. Oke", 'tipe' => 'Nelayan'),
        array('id_kelompok' => "kl4", 'nama' => "Semangat Nusantara", 'alamat' => "Jl. Durian", 'tipe' => 'Pengolah')
      );

      DB::table('app_kelompok')->insert($data);
       
        
        
        
    }
}

class ValidasiTableSeeder extends Seeder
{
  public function run()
  {

    DB::table('validasi')->truncate();

    $data = array(
      array('key' => 'UEVCYnRqVWVtOEg0dHMxZ3ZRS3JFZXZkU0E2WmxiaWhMQThPYlR0TTc2UT0=')
    );

    DB::table('validasi')->insert($data);        
        
    }
}

class PermissionsSeeder extends Seeder
{
  public function run()
  {
    App\Permissions::truncate();

    $data = array(
        array('id_user' => 1, 'pembudidaya' => 1, 'nelayan' => 1, 'pengolah' => 1, 'admin' => 1, 'blog' => 1, 'pesisir' => 1),
        array('id_user' => 2, 'pembudidaya' => 1, 'nelayan' => 0, 'pengolah' => 0, 'admin' => 0, 'blog' => 0, 'pesisir' => 0),
        array('id_user' => 3, 'pembudidaya' => 0, 'nelayan' => 1, 'pengolah' => 0, 'admin' => 0, 'blog' => 0, 'pesisir' => 0),
        array('id_user' => 4, 'pembudidaya' => 0, 'nelayan' => 0, 'pengolah' => 1, 'admin' => 0, 'blog' => 0, 'pesisir' => 0),
        array('id_user' => 5, 'pembudidaya' => 0, 'nelayan' => 0, 'pengolah' => 0, 'admin' => 0, 'blog' => 1, 'pesisir' => 0),
        array('id_user' => 6, 'pembudidaya' => 0, 'nelayan' => 0, 'pengolah' => 0, 'admin' => 0, 'blog' => 0, 'pesisir' => 1)
      );

      DB::table('permissions')->insert($data);
        
    }
}
