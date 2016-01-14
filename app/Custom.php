<?php

namespace App;

class Custom
{

	public function tgl_indo($tgl) {
			$tanggal = substr($tgl,8,2);
			$bulan = $this->getBulan(substr($tgl,5,2));
			$tahun = substr($tgl,0,4);
			return $tanggal.' '.$bulan.' '.$tahun;		 
	}

	public function getBulan($bln){
				switch ($bln){
					case 1: 
						return "Januari";
						break;
					case 2:
						return "Februari";
						break;
					case 3:
						return "Maret";
						break;
					case 4:
						return "April";
						break;
					case 5:
						return "Mei";
						break;
					case 6:
						return "Juni";
						break;
					case 7:
						return "Juli";
						break;
					case 8:
						return "Agustus";
						break;
					case 9:
						return "September";
						break;
					case 10:
						return "Oktober";
						break;
					case 11:
						return "November";
						break;
					case 12:
						return "Desember";
						break;
				}
	}

	public function getSymbolByQuantity($bytes) {
	    $symbols = array('b', 'KB', 'MB', 'GB', 'TB', 'PB', 'EB', 'ZB', 'YB');
	    $exp = floor(log($bytes)/log(1024));

	    return sprintf('%.2f '.$symbols[$exp], ($bytes/pow(1024, floor($exp))));
	}

	public function show_disk_space()
	{
		$total = disk_total_space("/");
		$total = $this->getSymbolByQuantity($total);
		return $total;
	}

	public function show_free_space()
	{
		$free_space = disk_free_space("/");
		$free_space = $this->getSymbolByQuantity($free_space);
		return $free_space;
	}

	public function show_use_space()
	{
		$total = disk_total_space("/");
		$free_space = disk_free_space("/");
		$use_space = $this->getSymbolByQuantity($total - $free_space);
		return $use_space;
	} 

	public function waktu_lalu($time_ago){

		if ( empty( $time_ago ) ){
			return "Belum pernah diubah";
			exit;
		}
		
		$waktu_sekarang = strtotime(date('Y-m-d H:i:s'));
		$waktu_lalu 	= $waktu_sekarang - strtotime($time_ago);
		$detik 			= $waktu_lalu ;
		$menit 			= round($waktu_lalu / 60 );
		$jam 			= round($waktu_lalu / 3600);
		$hari 			= round($waktu_lalu / 86400 );
		$minggu 		= round($waktu_lalu / 604800);
		$bulan 			= round($waktu_lalu / 2600640 );
		$tahun 			= round($waktu_lalu / 31207680 );

		// detik
		if($detik <= 60){
			return "Beberapa detik yang lalu";
		}
		//menit
		else if($menit <=60){
			if($menit==1){
				return "1 menit yang lalu";
			}
			else{
				return "$menit menit yang lalu";
			}
		}
		//jam
		else if($jam <=24){
			if($jam==1){
				return "1 jam yang lalu";
			}else{
				return "$jam jam yang lalu";
			}
		}
		//hari
		else if($hari <= 7){
			if($hari==1){
				return "kemarin";
			}else{
				return "$hari hari yang lalu";
			}
		}
		//minggu
		else if($minggu <= 4.3){
			if($minggu==1){
				return "satu minggu yang lalu";
			}else{
				return "$minggu minggu yang lalu";
			}
		}
		//bulan
		else if($bulan <=12){
			if($bulan==1){
				return "satu bulan yang lalu";
			}else{
				return "$bulan bulan yang lalu";
			}
		}
		//tahun
		else{
			if($tahun==1){
				return "satu tahun yang lalu";
			}else{
				return "$tahun tahun yang lalu";
			}
		}
	}
}
