<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use DB, Validator, Auth;

class UserController extends Controller
{
    
    protected $Id_User;

    public function __construct(){
        $this->Id_User = Auth::user()->id;
    }

    public function getIndex()
    {
        $Users = User::orderBy('id','desc')->get();
        return view('admin.users.index', ['Users' => $Users ]);
    }


    public function getTambah()
    {
        return view('admin.users.new');
    }


    public function postSimpan(Request $request)
    {
        $this->validate($request,
            [
                'name'      => 'required',
                'username'  => 'required|unique:users',
                'email'     => 'required|unique:users|email',
                'password'     => 'required|min:6',
                'repassword'     => 'required|same:password',
            ]);

        $User = new User;
        $User->name     = $request->name;
        $User->email    = $request->email;
        $User->username = $request->username;
        $User->password = bcrypt($request->password);

        $User->save();

        $request->session()->flash('success','Berhasil menyimpan pengguna');
        return redirect(route('user'));
    }


    public function getHapus(Request $request, $id)
    {
        User::where('id',$id)->delete();

        $request->session()->flash('success', 'Berhasil menghapus pengguna');
        return redirect(route('user'));
    }

    public function getPengaturan(Request $req)
    {
        $User = User::find($this->Id_User);
        return view('admin.users.setting', ['User' => $User]);
    }

    public function postPengaturan(Request $request)
    {
        $User = User::find($this->Id_User);
        $User->name     = $request->name;
        $User->username = $request->username;
        $User->save();

        $request->session()->flash('success','Berhasil mengubah data');
        return redirect(route('user_pengaturan'));
    }

    public function postGantiPassword(Request $request)
    {
        $this->validate($request,
                [
                    'pass_lama' => 'required',
                    'pass_baru' => 'required',
                    'pass_konfir' => 'required|same:pass_baru',
                ]);

        if ( !Auth::attempt(['password' => $request->pass_lama]) ) {
          
            $request->session()->flash('err','Password lama tidak sesuai');
            return redirect(route('user_pengaturan'));
        
        }

        $user = User::find($this->Id_User);
        $user->password = bcrypt($request->pass_baru);
        $user->save();

        $request->session()->flash('success','Berhasil mengubah password');

        return redirect(route('user_pengaturan'));

    }

}
