# Route

--- 

- [Log](#section-1)
- [Dashboard](#section-2)
- [User](#section-3)
- [Menu](#section-4)
- [Laporan](#section-5)
- [Warung](#section-6)
- [Cart](#section-7)
- [Order](#section-7)
- [Payment](#section-8)

>{primary} Halo, ini adalah halaman dokumentasi route

--- 
# Route 
---
<a name="section-1">
### route log activity
```php
<?php
    Route::get('/activity', function () {
        $activities = Activity::all();
        return view('dashboard-petugas.activity.index', compact('activities'));
    });
```

---
<a name="section-2">
### route dashboard
```php
<?php
    Route::get('/dashboard', function () {
        $data = [
            'kasir' => User::where('role', 'Kasir')->count(),
            'waiter' => User::where('role', 'Waiter')->count(),
            'menu' => Menu::where('status', 'Tersedia')->count(),
            'pemasukan' => Order::where('payment_status', 'paid')->sum('grand_total'),
            'orders' => Order::orderBy('created_at', 'DESC')
                        ->paginate(10),
        ];
        return view('dashboard-petugas.index', $data);
    });
?>
```
---

<a name="section-3">
### route user
```php
<?php
    Route::resource('/user', 'UserController');
?>
```
---

<a name="section-4">
### route menu
```php
<?php
    Route::resource('/menu', 'MenuController');
?>
```
---

<a name="section-5">
### route laporan
```php
<?php
    Route::get('/laporan', 'LaporanController@index');
    Route::get('/laporan/create', 'LaporanController@create');
?>
```
---

<a name="section-6">
### route warung
```php
<?php
    Route::get('/warung', 'DefaultController@index');
    Route::get('/warung/akun', 'HomeController@akunDefault');
    Route::get('/warung/about', 'HomeController@about');
    Route::get('/warung/cara', 'HomeController@cara');
    Route::get('/warung/list', 'DefaultController@list');
    Route::get('/warung/create', 'DefaultController@create');
    Route::get('/warung/{warung}', 'DefaultController@show')->name('warung.show');
    Route::get('/warung/akun/edit', 'HomeController@ubahAkun');
    Route::patch('/warung/akun/{ubah}', 'HomeController@ubahAkunProses');
?>
```
---

<a name="section-7">
### route cart warung
```php
<?php
    Route::get('/warung/carts/remove/{warung}', 'WarungCartController@destroy');
    Route::get('/keranjang', 'WarungCartController@index');
    Route::post('/warung/carts', 'WarungCartController@store');
    Route::post('/warung/carts/update', 'WarungCartController@update');
?>
```
---

<a name="section-8">
### route order
```php
<?php
    Route::get('/warung/order', 'WarungOrderController@index');
    Route::get('/warung/order/list', 'WarungOrderController@list');
    Route::get('/warung/order/checkout', 'WarungOrderController@checkout');
    Route::post('/warung/order/checkout', 'WarungOrderController@doCheckout');
    Route::get('/warung/orders/received/{orderID}', 'WarungOrderController@received');
    Route::get('/warung/order/{order}', 'WarungOrderController@show');
    Route::get('/warung/order/create', 'WarungOrderController@create');
?>
```

---
<a name="section-9">
### route payment
```php
<?php
    Route::post('payments/notification', 'PaymentController@notification');
    Route::get('payments/completed', 'PaymentController@completed');
    Route::get('payments/failed', 'PaymentController@failed');
    Route::get('payments/unfinish', 'PaymentController@unfinish');

    Route::post('payments/notification', 'DashboardPaymentController@notification');
    Route::get('payments/completed', 'DashboardPaymentController@completed');
    Route::get('payments/failed', 'DashboardPaymentController@failed');
    Route::get('payments/unfinish', 'DashboardPaymentController@unfinish');
?>
```
---