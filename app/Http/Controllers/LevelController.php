<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Level;
use RealRashid\SweetAlert\Facades\Alert;

class LevelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $levels = Level::paginate(5);
        return view('dashboard-petugas.level.index', compact('levels'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('dashboard-petugas.level.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $input = $request->all();
        $validasi = Level::create($input);
        if($validasi){
            Alert::success('Data level berhasil ditambah');
        }
        return redirect('/level');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $level = Level::findOrFail($id);
        return view('dashboard-petugas.level.show', compact('level'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       $level = Level::findOrFail($id);
       return view('dashboard-petugas.level.edit', compact('level'));
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
        $request->validate([
                'name' => 'required',
        ]);

        $input = $request->all();
        $level = Level::findOrFail($id);
        $validasi = $level->update($input);
        if($validasi){
            Alert::success('Data tahun berhasil diubah');
        }
    return redirect('/level');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $level = Level::findOrFail($id);
        $validasi = $level->delete($level);
        if($validasi){
            Alert::success('Data tahun berhasil dihapus!');
        }
        return redirect('/level');
    }
}
