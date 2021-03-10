<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Menu;
use RealRashid\SweetAlert\Facades\Alert;
use Auth;

class MenuController extends Controller
{
    public function __construct(){
        $this->middleware([
           'auth',
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menus = Menu::paginate(5);
        return view('dashboard-petugas.menu.index', compact('menus'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Auth::user()->role == 'Administrator') {
            return view('dashboard-petugas.menu.create');
        } else {
            return redirect('/menu');
        }

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request, [
            'name' => 'required',
            'gambar' => 'required',
            'price' => 'required',
            'status' => 'required',
        ]);

        $gambar = $request->gambar;
        $new_gambar = time().$gambar->getClientOriginalName();

        $post = Menu::create([
            'name' => $request->name,
            'status' => $request->status,
            'price' => $request->price,
            'deskripsi' => $request->deskripsi,
            'gambar' => 'warung_kita/assets/img/uploads/'.$new_gambar,
        ]);

        $gambar->move('warung_kita/assets/img/uploads/', $new_gambar);

        
        if($post){
            Alert::success('Berhasil','Data menu berhasil ditambah');
        }
        return redirect('/menu'); 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $menu = Menu::findOrFail($id);
        return view('dashboard-petugas.menu.show', compact('menu'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(Auth::user()->role == 'Administrator') {
            $menu = Menu::findOrFail($id);
            return view('dashboard-petugas.menu.edit', compact('menu'));
        } else {
            return redirect('/menu');
        }
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
        $this->middleware([
           'privilege:Administrator'
        ]);

        $this->validate($request, [
            'name' => 'required',
            'price' => 'required',
            'status' => 'required',
        ]);

        $menu = Menu::findorfail($id);

        if ($request->has('gambar')) {
            $gambar = $request->gambar;
            $new_gambar = time().$gambar->getClientOriginalName();
            $gambar->move('warung_kita/assets/img/uploads/', $new_gambar);

            $upload_data = [
                'name' => $request->name,
                'status' => $request->status,
                'price' => $request->price,
                'deskripsi' => $request->deskripsi,
                'gambar' => 'warung_kita/assets/img/uploads/'.$new_gambar,
            ];
        }
        else{
            $upload_data = [
                'name' => $request->name,
                'status' => $request->status,
                'price' => $request->price,
                'deskripsi' => $request->deskripsi,
            ];
        }
   
        $menu->update($upload_data);

        if($menu){
            Alert::success('Berhasil','Data menu berhasil diubah');
        }
        return redirect('/menu');
   }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->middleware([
           'privilege:Administrator'
        ]);
        
        $menu = Menu::findOrFail($id);
        $validasi = $menu->delete($menu);
        if($validasi){
            Alert::success('Berhasil','Data menu berhasil dihapus');
        }
        return redirect('/menu');
    }
}
