<?php

namespace App\Classes;

class Sakti
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

	public function hari_indo($day){
		switch ($day){
			case "Sunday": 
				return "Minggu";
				break;
			case "Monday":
				return "Senin";
				break;
			case "Thuesday":
				return "Selasa";
				break;
			case "Wednesday":
				return "Rabu";
				break;
			case "Thursday":
				return "Kamis";
				break;
			case "Friday":
				return "Jumat";
				break;
			case "Saturday":
				return "Sabtu";
				break;
		}
	}

	public function TglLaporan($tgl_awal, $tgl_akhir)
	{
		$tgl_1 = explode(" ",substr($tgl_awal,0,10));
		$tgl_1 = explode("-",$tgl_1[0]);

		$tgl_2 = explode(" ",substr($tgl_akhir,0,10));
		$tgl_2 = explode("-",$tgl_2[0]);

		$data['tgl_awal'] 	= $tgl_1[2] ." ". $this->getBulan($tgl_1[1]);
		$data['tgl_akhir'] 	= $this->getBulan($tgl_2[1]);
		$data['tahun'] 		= $tgl_1[0];

		return $data;
	}

}