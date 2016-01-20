<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB, Validator, Auth, Mail;
use App\Pesan;

class PesanController extends Controller
{

    protected $Perpage;

    public function __construct()
    {
        $this->Perpage = 20;
    }

    public function getIndex(Request $request)
    {
        if ( !$request->tipe ) {
        return redirect( route('pesan', [
                'tipe' => 'Masuk'
            ]));
        } else {
            $tipe = $request->tipe;

            $Hal = "";

            $Pesan = Pesan::where('tipe', $tipe)->orderBy('id', 'desc')->paginate($this->Perpage);
            $JmlPesanTerkirim = Pesan::where('tipe', 'Keluar')->count();
            $JmlPesanBaru = Pesan::where('tipe', 'Masuk')
                                    ->where('baru', 1)
                                    ->count();

            return view('admin.pesan.index', 
                [
                    'Pesan' => $Pesan, 
                    'Hal' => $Hal, 
                    'Tipe' => $tipe, 
                    'JmlPesanBaru' => $JmlPesanBaru, 
                    'JmlPesanTerkirim' => $JmlPesanTerkirim
                ]);
        }
    }

    public function getDetail($id,$tipe){

        Pesan::where('id',$id)
                ->update(['baru' => 0]);

        $JmlPesanTerkirim = Pesan::where('tipe', 'Keluar')->count();
        $JmlPesanBaru = Pesan::where('tipe', 'Masuk')
                                ->where('baru', 1)
                                ->count();

        $Pes = Pesan::findOrFail($id);

        $Pes->baru = 0;
        $Pes->save();

        return view('admin.pesan.index', 
            [
                'Pes' => $Pes, 
                'Hal' => 'detail', 
                'Tipe' => $tipe, 
                'JmlPesanBaru' => $JmlPesanBaru, 
                'JmlPesanTerkirim' => $JmlPesanTerkirim
            ]);

    }

    public function getCari(Request $request)
    {
        $tipe = $request->tipe;

        $Hal = "";

        $Pesan = Pesan::where('tipe', $tipe)
                            ->where('nama', 'like', '%'.$request->cari.'%')
                            ->orWhere('subjek', 'like', '%'.$request->cari.'%')
                            ->orderBy('id', 'desc')->paginate($this->Perpage);
        $JmlPesanTerkirim = Pesan::where('tipe', 'Keluar')->count();
        $JmlPesanBaru = Pesan::where('tipe', 'Masuk')
                                ->where('baru', 1)
                                ->count();

        return view('admin.pesan.index', 
            [
                'Cari' => $request->cari,
                'Pesan' => $Pesan, 
                'Hal' => $Hal, 
                'Tipe' => $tipe, 
                'JmlPesanBaru' => $JmlPesanBaru, 
                'JmlPesanTerkirim' => $JmlPesanTerkirim
            ]);
    }

    public function getTulis($email = null){

        $JmlPesanTerkirim = Pesan::where('tipe', 'Keluar')->count();
        $JmlPesanBaru = Pesan::where('tipe', 'Masuk')
                                ->where('baru', 1)
                                ->count();

        return view('admin.pesan.index', 
            [
                'Hal' => 'tulis', 
                'To' => $email,
                'Tipe' => "", 
                'JmlPesanBaru' => $JmlPesanBaru, 
                'JmlPesanTerkirim' => $JmlPesanTerkirim
            ]);
    }

    public function postKirim(Request $request){

        $this->validate($request, [
            'email' => 'required|email|min:3',
            'pesan' => 'required'
        ]);

        $JmlPesanTerkirim = Pesan::where('tipe', 'Keluar')->count();
        $JmlPesanBaru = Pesan::where('tipe', 'Masuk')
                                ->where('baru', 1)
                                ->count();
        // Kirim email
        $Set = DB::table('site_setting')->where('id',1)->first();
        $email_dari = $Set->email;

        $this->kirim_email($email_dari, $request->email, $request->subject, $request->pesan);

        $Pesan = new Pesan;
        $Pesan->nama = "-";
        $Pesan->email = $request->email;
        $Pesan->subjek = $request->subjek;
        $Pesan->pesan = $request->pesan;
        $Pesan->tipe = "Keluar";
        $Pesan->baru = "0";

        $Pesan->save();

        $request->session()->flash('success','Pesan Anda telah dikirim');

        return redirect(route('pesan',[ 'tipe' => "Keluar" ]));
    }

    public function postHapus(Request $request){

        $id = $request->id;
        $id = explode(",", $id);
        foreach( $id as $val ) {
            Pesan::where('id', $val)->delete();
        }
    }

    public function postReadAll(){
        Pesan::where('baru',1)->update(['baru' => 0]);
    }

    public function sendEmail($data, $input)
    {
     
     Mail::send('admin.pesan.index', $data, function($message) use ($input) {
     
        $message->from('team@laravel-indonesia.com', 'Laravel-indonesia');

        $message->to($input['email'], $input['subjek'])->subject('Please verify your account registration!');
     
     });

    }

    public function kirim_email($email_dari, $email_ke, $subject, $body){
        
        // Always set content-type when sending HTML email
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

        // More headers
        $headers .= "Dari: $email_dari<$email_dari>" . "\r\n";

        @mail($email_ke,$subject,$body,$headers);

    }

    public function getUpdateNotif(){

        Pesan::where('baru',1)
                ->update(['baru' => 0]);

    }
}