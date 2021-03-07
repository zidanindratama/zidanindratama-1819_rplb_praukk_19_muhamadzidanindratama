<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\OrderItem;
use App\Menu;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\OrderRequest;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\DB;

class DefaultController extends Controller
{
    public function __construct(){
        $this->middleware([
           'auth',
           'privilege:Administrator&Pelanggan'
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'menus' => Menu::where('status', 'Tersedia')->get(),
            'favorit' => Menu::orderBy('id', 'desc')->take(3)->get(),
        ];

        return view('default.index', $data);
    }

    public function about()
    {
        return view('default.about');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = [
            'menu' => Menu::findOrFail($id),
        ];

        return view('default.order.detail', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
