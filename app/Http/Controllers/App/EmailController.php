<?php

namespace App\Http\Controllers\App;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Mail;
use App\User;

class EmailController extends Controller
{

	public function LaporMasalah(Request $r)
	{
		$data['pesan'] 	= $r->pesan;
		$data['subjek'] = $r->subjek;


        $kirim = Mail::send(['html' => 'app.lapor-masalah.index'], [ 'data' => $data ], function ($m) use($data) {
		            $m->from(env('MAIL_USERNAME'), 'Diskanlut Bantaeng');

		            $m->to("support@media-sakti.com", "Media Sakti")->subject($data['subjek']);
		        });

        if ( $kirim ) {
        	$r->session()->flash('EmailSukses', 'Berhasil mengirimkan laporan anda');
        	return redirect(url($r->url));
        } else {
        	$r->session()->flash('EmailGagal', 'Gagal mengirimkan laporan, silahkan coba lagi dan pastikan koneksi internet anda stabil');
        	return redirect(url($r->url));
        }
	}

}
