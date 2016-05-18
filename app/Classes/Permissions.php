<?php

namespace App\Classes;

use Illuminate\Database\Eloquent\Model;
use DB;
use Auth;

class Permissions
{

	public function pembudidaya()
	{
		$sql = DB::table('permissions')->where('id_user', Auth::user()->id)->first();
		return $sql->pembudidaya == 1 ? true : false; 
	}

	public function nelayan()
	{
		$sql = DB::table('permissions')->where('id_user', Auth::user()->id)->first();
		return $sql->nelayan == 1 ? true : false; 
	}

	public function pengolah()
	{
		$sql = DB::table('permissions')->where('id_user', Auth::user()->id)->first();
		return $sql->pengolah == 1 ? true : false; 
	}

	public function pesisir()
	{
		$sql = DB::table('permissions')->where('id_user', Auth::user()->id)->first();
		return $sql->pesisir == 1 ? true : false; 
	}

	public function admin()
	{
		$sql = DB::table('permissions')->where('id_user', Auth::user()->id)->first();
		return $sql->admin == 1 ? true : false;
	}

	public function blog()
	{
		$sql = DB::table('permissions')->where('id_user', Auth::user()->id)->first();
		return $sql->blog == 1 ? true : false; 
	}

	public function pnp_role()
	{
		$sql = DB::table('permissions')->where('id_user', Auth::user()->id)->first();
		$data = array(
					'Pembudidaya' => $sql->pembudidaya,
					'Nelayan' => $sql->nelayan,
					'Pengolah' => $sql->pengolah
					);
		$jml = array_sum($data);
		if ( $jml == 3 ){
			return false;
		} else {
			$cari = array_search(1, $data);
			return $cari;
		}
	}
}