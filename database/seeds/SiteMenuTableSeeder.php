<?php

use Illuminate\Database\Seeder;

class SiteMenuTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('site_menu')->delete();
        
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
