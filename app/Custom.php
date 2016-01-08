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

}
