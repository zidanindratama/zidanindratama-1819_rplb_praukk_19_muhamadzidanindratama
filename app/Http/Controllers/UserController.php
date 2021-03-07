<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class UserController extends Controller
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
        $users = User::paginate(10);
        return view('dashboard-petugas.user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Auth::user()->role == 'Administrator') {
            return view('dashboard-petugas.user.create');
        } else {
            return redirect('/user');
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
        $this->middleware([
           'privilege:Administrator'
        ]);

        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'username' => 'required',
            'password' => 'required',
        ]);

        $input = $request->all();
        $input['password'] = bcrypt($request->password);
        $validasi = User::create($input);

        if($validasi){
            Alert::success('Berhasil','Data user berhasil ditambah');
        }
        return redirect('/user');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::findOrFail($id);
        return view('dashboard-petugas.user.show', compact('user'));
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
            $data = [
                'user' => User::findOrFail($id),
            ];
    
            return view('dashboard-petugas.user.edit', $data);
        } else {
            return redirect('/user');
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

        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'username' => 'required',
        ]);

        $input = [
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'role' => $request->role,
            'password' => Auth::user()->password,
        ];
        $user = User::findOrFail($id);
        $validasi = $user->update($input);
        if($validasi){
            Alert::success('Data user berhasil diubah');
        }
        return redirect('/user');
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
        
        $user = User::findOrFail($id);
        $validasi = $user->delete($user);
        if($validasi){
            Alert::success('Data user berhasil dihapus');
        }
        return redirect('/user');
    }
}
