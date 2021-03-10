# Menu

--- 

- [Construct()](#section-2)
- [Index()](#section-3)
- [Create()](#section-4)

>{primary} Halo, ini adalah halaman dokumentasi laporan

--- 
# Controller Laporan
---
<a name="section-2">
### function __construct()
```php
<?php
    public function __construct(){
        $this->middleware([
           'auth',
           'privilege:Administrator&Owner',
        ]);
    }
```

---
<a name="section-3">
### function index()
```php
<?php
    public function index()
    {
        return view('dashboard-petugas.laporan.index');
    }
?>
```
---

<a name="section-4">
### function create()
```php
<?php
    public function create()
    {
        PDF::setOptions(['dpi' => 150, 'defaultFont' => 'sans-serif']);

        $pemasukan = Order::all();
        $pdf = PDF::loadView('dashboard-petugas.laporan.pdf', compact('pemasukan'));
        return $pdf->download('Laporan-pemasukan-warung-kita.pdf');
    }
?>
```
---
