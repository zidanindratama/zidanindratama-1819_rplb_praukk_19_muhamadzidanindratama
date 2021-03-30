<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Menu;
use App\User;
use App;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use Session ;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function akun()
    {
        $user = User::where('user_id', Auth::id());
        return view('dashboard-petugas.akun.index', compact('user'));
    }

    public function akunDefault(){
        $user = DB::table('users')->where('id', Auth::id())->first();
        return view('default.akun', compact('user'));
    }

    public function ubahAkun(){
        $user = DB::table('users')->where('id', Auth::id())->first();
        return view('default.akun.edit', compact('user'));
    }

    public function ubahAkunProses(Request $request, $id){
        
        $this->validate($request, [
            'name' => 'required',
            'username' => 'required',
        ]);

        $user = User::findorfail($id);

        if ($request->has('gambar')) {
            $gambar = $request->gambar;
            $new_gambar = time().$gambar->getClientOriginalName();
            $gambar->move('warung_kita/assets/img/uploads/', $new_gambar);

            $upload_data = [
                'name' => $request->name,
                'username' => $request->username,
                'gambar' => 'warung_kita/assets/img/uploads/'.$new_gambar,
            ];
        }
        else{
            $upload_data = [
                'name' => $request->name,
                'username' => $request->username,
            ];
        }
   
        $user->update($upload_data);

        if($user){
            Alert::success('Berhasil','Data akun berhasil diubah');
        }
        return redirect('/warung/akun');
    }
}
