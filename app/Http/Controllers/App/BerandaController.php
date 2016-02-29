<?php

namespace App\Http\Controllers\app;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Custom, App\User;

class BerandaController extends Controller
{

	public function index()
	{
		$data['total_pembudidaya'] = User::where('profesi','Pembudidaya')->count();
		$data['total_nelayan'] = User::where('profesi','Nelayan')->count();
		$data['total_pengolah'] = User::where('profesi','Pengolah')->count();
		
		$data_bmkg = file_get_contents('http://data.bmkg.go.id/propinsi_28_1.xml', false);
		$xml = simplexml_load_string($data_bmkg);
		
		for ($i=0; $i<sizeof($xml->Isi->Row); $i++) {
		   
		    $row = $xml->Isi->Row[$i];
		    
		    if(strtolower($row->Kota) == "bantaeng") {
		    	$data['kota'] 			= $row->Kota;
		    	$data['gambar'] 		= $row->Cuaca;
		    	$data['cuaca'] 			= $row->Cuaca;
		    	$data['suhu_min'] 		= $row->SuhuMin;
		    	$data['suhu_max'] 		= $row->SuhuMax;
		    	$data['kelembapan_min'] = $row->KelembapanMin;
		    	$data['kelembapan_max'] = $row->KelembapanMax;
		    	$data['kecepatan_angin'] = $row->KecepatanAngin;
		    	$data['arah_angin'] 	= $row->ArahAngin;
		        break;
		    }
		}

		return view('app.beranda.index', $data);

	}

}
