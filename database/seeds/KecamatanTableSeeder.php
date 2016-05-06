<?php

use Illuminate\Database\Seeder;

class KecamatanTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('kecamatan')->delete();
        
        \DB::table('kecamatan')->insert(array (
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
