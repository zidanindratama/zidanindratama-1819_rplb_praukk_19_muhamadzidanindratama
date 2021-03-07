<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Menu;
use App\User;
use App;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Session ;

class CobaController extends Controller
{
    public function index()
    {
        $data = [
            'kasir' => User::where('role', 'Kasir')->get(),
            'waiter' => User::where('role', 'waiter')->get(),
            'menu' => Menu::where('status', 'Tersedia')->get(),
        ];
        // return count($data['menu']);
        // echo $user->name;
        return view('layout-dashboard.card', $data);
    }

    public function akun()
    {
        $user = DB::table('users')->where('id', Auth::id())->first();
        // var_dump($user);
        // echo $user->name;
        return view('dashboard-petugas.akun.index', compact('user'));
    }
}
