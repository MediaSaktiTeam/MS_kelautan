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
                'id' => '73',
                'nama' => 'Sulawesi Selatan',
            ),
        ));
        
        
    }
}
