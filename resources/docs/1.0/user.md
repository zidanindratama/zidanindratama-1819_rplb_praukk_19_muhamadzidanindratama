# User

--- 

- [Model](#section-1)
- [Migration](#section-9)
- [Construct()](#section-2)
- [Index()](#section-3)
- [Create()](#section-4)
- [Store()](#section-5)
- [Show()](#section-10)
- [Edit()](#section-6)
- [Update()](#section-7)
- [Destroy()](#section-8)

>{primary} Halo, ini adalah halaman dokumentasi user

--- 
# Model User
---
<a name="section-1">
### Model User

---

```php
<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

// memanggil package log activity dari spatie
use Spatie\Activitylog\Traits\LogsActivity;

use Auth;

class User extends Authenticatable
{
    use Notifiable, LogsActivity;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'level_id', 'username', 'role', 'gambar',
    ];

    // mencatat field log
    protected static $logAttributes = ['name', 'role', 'username'];

    // pesan saat terjadi logging
    public function getDescriptionForEvent(string $eventName): string
    {
        return "Someone has been {$eventName} user";
    }

    // nama log
    protected static $logName = 'user';

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // user mempunyai satu level
    public function Level(){
        return $this->belongsTo(Level::class, 'level_id');
    }
}

?>
```

--- 
# Migration User
---
<a name="section-9">
### Migration User

---
```php
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('username')->nullable();
            $table->string('gambar')->nullable();
            $table->string('role')->default('Pelanggan')->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
?>
```

--- 
# Controller User
---
<a name="section-2">
### function __construct()
```php
<?php
public function __construct(){
    $this->middleware([
       'auth',
       'privilege:administrator'
    ]);
}
```

---
<a name="section-3">
### function index()
```php
<?php
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
?>
```
---

<a name="section-4">
### function create()
```php
<?php
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
?>
```
---

<a name="section-5">
### function store()
```php
<?php
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
?>
```
---
<a name="section-10">
### function show()
```php
<?php
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
?>
```
---

<a name="section-6">
### function edit()
```php
<?php
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

?>
```
---

<a name="section-7">
### function update()
```php
<?php
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
?>
```
---

---
<a name="section-8">
### function destroy()
```php
<?php
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
?>
```
---