<?php

use Illuminate\Database\Seeder;

class SitePagesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
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
