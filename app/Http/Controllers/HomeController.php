<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Menu;
use App\User;
use App;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
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
        // var_dump($user);
        // echo $user->name;
        return view('default.akun', compact('user'));
    }

    public function about()
    {
        return view('default.about');
    }

    public function cara()
    {
        return view('default.cara');
    }
}
