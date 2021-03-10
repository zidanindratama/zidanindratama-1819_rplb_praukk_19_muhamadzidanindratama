# Menu

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

>{primary} Halo, ini adalah halaman dokumentasi menu

--- 
# Model Menu
---
<a name="section-1">
### Model Menu

---

```php
<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Auth;

class Menu extends Model
{
    use LogsActivity;

    protected $primaryKey = 'id';

    protected $fillable = [
        'name',
        'status',
        'price',
        'gambar',
        'deskripsi',
    ];

    protected static $logAttributes = ['name', 'price', 'status'];

    public function getDescriptionForEvent(string $eventName): string
    {
        return Auth::user()->name." "."has been {$eventName} menu";
    }


    protected static $logName = 'menu';
}

?>
```

--- 
# Migration Menu
---
<a name="section-9">
### Migration Menu

---
```php
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menus', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('price');
            $table->text('deskripsi')->nullable();
            $table->string('status');
            $table->string('gambar');
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
        Schema::dropIfExists('menus');
    }
}

?>
```

--- 
# Controller Menu
---
<a name="section-2">
### function __construct()
```php
<?php
public function __construct(){
    $this->middleware([
       'auth',
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
        $menus = Menu::paginate(5);
        return view('dashboard-petugas.menu.index', compact('menus'));
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
            return view('dashboard-petugas.menu.create');
        } else {
            return redirect('/menu');
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
        $menu = Menu::findOrFail($id);
        return view('dashboard-petugas.menu.show', compact('menu'));
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
            $menu = Menu::findOrFail($id);
            return view('dashboard-petugas.menu.edit', compact('menu'));
        } else {
            return redirect('/menu');
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
        
        $menu = Menu::findOrFail($id);
        $validasi = $menu->delete($menu);
        if($validasi){
            Alert::success('Berhasil','Data menu berhasil dihapus');
        }
        return redirect('/menu');
    }
?>
```
---