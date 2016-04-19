<?php

use Illuminate\Database\Seeder;

class ProvinsiTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('provinsi')->delete();
        
        \DB::table('provinsi')->insert(array (
            0 => 
            array (
                'id' => '11',
                'nama' => 'Aceh',
            ),
            1 => 
            array (
                'id' => '12',
                'nama' => 'Sumatera Utara',
            ),
            2 => 
            array (
                'id' => '13',
                'nama' => 'Sumatera Barat',
            ),
            3 => 
            array (
                'id' => '14',
                'nama' => 'Riau',
            ),
            4 => 
            array (
                'id' => '15',
                'nama' => 'Jambi',
            ),
            5 => 
            array (
                'id' => '16',
                'nama' => 'Sumatera Selatan',
            ),
            6 => 
            array (
                'id' => '17',
                'nama' => 'Bengkulu',
            ),
            7 => 
            array (
                'id' => '18',
                'nama' => 'Lampung',
            ),
            8 => 
            array (
                'id' => '19',
                'nama' => 'Kepulauan Bangka Belitung',
            ),
            9 => 
            array (
                'id' => '21',
                'nama' => 'Kepulauan Riau',
            ),
            10 => 
            array (
                'id' => '31',
                'nama' => 'Dki Jakarta',
            ),
            11 => 
            array (
                'id' => '32',
                'nama' => 'Jawa Barat',
            ),
            12 => 
            array (
                'id' => '33',
                'nama' => 'Jawa Tengah',
            ),
            13 => 
            array (
                'id' => '34',
                'nama' => 'Di Yogyakarta',
            ),
            14 => 
            array (
                'id' => '35',
                'nama' => 'Jawa Timur',
            ),
            15 => 
            array (
                'id' => '36',
                'nama' => 'Banten',
            ),
            16 => 
            array (
                'id' => '51',
                'nama' => 'Bali',
            ),
            17 => 
            array (
                'id' => '52',
                'nama' => 'Nusa Tenggara Barat',
            ),
            18 => 
            array (
                'id' => '53',
                'nama' => 'Nusa Tenggara Timur',
            ),
            19 => 
            array (
                'id' => '61',
                'nama' => 'Kalimantan Barat',
            ),
            20 => 
            array (
                'id' => '62',
                'nama' => 'Kalimantan Tengah',
            ),
            21 => 
            array (
                'id' => '63',
                'nama' => 'Kalimantan Selatan',
            ),
            22 => 
            array (
                'id' => '64',
                'nama' => 'Kalimantan Timur',
            ),
            23 => 
            array (
                'id' => '65',
                'nama' => 'Kalimantan Utara',
            ),
            24 => 
            array (
                'id' => '71',
                'nama' => 'Sulawesi Utara',
            ),
            25 => 
            array (
                'id' => '72',
                'nama' => 'Sulawesi Tengah',
            ),
            26 => 
            array (
                'id' => '73',
                'nama' => 'Sulawesi Selatan',
            ),
            27 => 
            array (
                'id' => '74',
                'nama' => 'Sulawesi Tenggara',
            ),
            28 => 
            array (
                'id' => '75',
                'nama' => 'Gorontalo',
            ),
            29 => 
            array (
                'id' => '76',
                'nama' => 'Sulawesi Barat',
            ),
            30 => 
            array (
                'id' => '81',
                'nama' => 'Maluku',
            ),
            31 => 
            array (
                'id' => '82',
                'nama' => 'Maluku Utara',
            ),
            32 => 
            array (
                'id' => '91',
                'nama' => 'Papua Barat',
            ),
            33 => 
            array (
                'id' => '94',
                'nama' => 'Papua',
            ),
        ));
        
        
    }
}
