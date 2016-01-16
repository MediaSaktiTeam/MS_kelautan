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
        $this->call('SubUsahaSeeder');
        $this->call('SubSaranaSeeder');
        $this->call('JabatanSeeder');
        $this->call('ValidasiTableSeeder');
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
    App\Page::truncate();

    factory(App\Page::class, 10)->create();
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
      array('name' => 'Admin', 'username' => 'admin', 'email' => 'developer@mediasakti.com', 'password' => bcrypt('admin'), 'profesi' => 'Admin')
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

    factory(App\Menu::class, 1)->create();
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
        array('nama' => 'Tambak', 'jenis' => 'Budidaya Air Payau'),
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
        array('id_kelompok' => "kl3", 'nama' => "Sipatokkong", 'alamat' => "Jl. Oke", 'tipe' => 'Nelayan')
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
