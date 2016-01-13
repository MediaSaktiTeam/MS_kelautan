<?php

namespace App\Http\Controllers\App;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\RefBantuan, App\User, App\Bantuan;
use DB;

class RefBantuanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function getIndex()
    {
        $data['users'] = DB::table('users as u')
                            ->leftJoin('app_kelompok as ak', 'u.id_kelompok', '=', 'ak.id_kelompok')
                            ->select('u.*', 'ak.nama as nama_kelompok')
                                ->where('u.profesi','<>','Admin')
                                ->orderBy('ak.nama', 'asc')->get();

        $data['bantuan_users'] = DB::table('app_bantuan as ab')
                            ->leftJoin('users as u', 'u.id', '=', 'ab.id_user')
                            ->leftJoin('app_kelompok as ak', 'u.id_kelompok', '=', 'ak.id_kelompok')
                            ->select('u.*','ak.nama as nama_kelompok', 'ab.tahun as tahun_bantuan')
                                ->where('u.profesi', '<>', 'Admin')
                                ->groupBy('ab.tahun')
                                ->orderBy('ab.tahun', 'desc')->get();

        return view('app.bantuan.index', $data);
    }

    public function postSimpan(Request $request)
    {

        foreach( $request->id_bantuan as $val ) {
            $dt = new RefBantuan;
            $dt->id_user = $request->id_user;   
            $dt->id_bantuan = $val;
            $dt->tahun = $request->tahun;
            $dt->save();   
        }

        $request->session()->flash('success','Berhasil menyimpan data');
        return redirect()->route('ref_bantuan');
    }

    public function getEdit($id, $tahun)
    {
        $data['user'] = DB::table('app_bantuan as ab')
                            ->leftJoin('users as u', 'u.id', '=', 'ab.id_user')
                            ->select('u.*', 'ab.tahun as tahun_bantuan')
                                ->where('ab.id_user', $id)
                                ->where('ab.tahun', $tahun)
                                ->groupBy('ab.id_user')->first();

        return view('app.bantuan.edit', $data);
    }

    public function postUpdate(Request $r)
    {

        RefBantuan::where('id_user', $r->id)
                    ->where('tahun', $r->tahun_edit)
                    ->delete();

        $user = User::find($r->id);

        foreach( $r->id_bantuan as $val ) {
            $dt = new RefBantuan;
            $dt->id_user = $r->id_user;   
            $dt->id_bantuan = $val;
            $dt->tahun = $r->tahun_update;
            $dt->save();   
        }

        $r->session()->flash('success','Berhasil menyimpan data');

        return redirect()->route('ref_bantuan');
    }

    public function getHapus(Request $r, $data){

        $val = explode(",", $data);

        foreach ($val as $v) {

            $value      = explode("|", $v);
            $id_user    = $value[0];
            $thn        = $value[1];

            RefBantuan::where('id_user', $id_user)
                        ->where('tahun', $thn)
                        ->delete();           
        }

        $r->session()->flash('success','Berhasil menghapus data');
        return redirect()->route('ref_bantuan');
    }

    public function getCari($cari)
    {

        $data['bantuan_users'] = DB::table('app_bantuan as ab')
                            ->leftJoin('users as u', 'u.id', '=', 'ab.id_user')
                            ->leftJoin('app_kelompok as ak', 'u.id_kelompok', '=', 'ak.id_kelompok')
                            ->select('u.*','ak.nama as nama_kelompok', 'ab.tahun as tahun_bantuan')
                                ->where('u.profesi', '<>', 'Admin')
                                ->where('u.name', 'LIKE', '%'. $cari .'%')
                                ->groupBy('ab.tahun')
                                ->orderBy('ab.tahun', 'desc')->get();

        return view('app.bantuan.cari', $data);
    }

    public function getDataPreview($id)
    {
        $data['user'] = DB::table('users as u')
                            ->leftJoin('app_kelompok as ak', 'u.id_kelompok', '=', 'ak.id_kelompok')
                            ->select('u.*', 'ak.nama as nama_kelompok')
                                ->where('u.profesi','<>','Admin')
                                ->where('u.id', $id)
                                ->first();
        return view('app.bantuan.data-preview', $data);
    }

    public function getListBantuan($id)
    {
        $user = User::find($id);
        $data['bantuan'] = Bantuan::where('jenis', $user->profesi)->get();

        return view('app.bantuan.list-bantuan', $data); 
    }

}