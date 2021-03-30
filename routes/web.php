<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Order;
use App\User;
use App\Menu;
use App\Reservation;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use Spatie\Activitylog\Models\Activity;

Route::get('/activity', function () {
    $activities = Activity::paginate(15);
    // dd($activities[5]['properties']['attributes']['name']);
    return view('dashboard-petugas.activity.index', compact('activities'));
});

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    $data = [
        'menus' => Menu::where('status', 'Tersedia')->get(),
        'favorit' => Menu::orderBy('id', 'desc')->take(3)->where('status', 'Tersedia')->get(),
    ];

    return view('default.index', $data);
});

Route::get('/dashboard', function () {
    $data = [
        'kasir' => User::where('role', 'Kasir')->count(),
        'pelanggan' => User::where('role', 'Pelanggan')->count(),
        'menu' => Menu::where('status', 'Tersedia')->count(),
        'pemasukan' => Order::where('payment_status', 'paid')->sum('grand_total'),
        'orders' => Order::orderBy('created_at', 'DESC')
                    ->paginate(10),
    ];
    // dd($data);
    return view('dashboard-petugas.index', $data);
});


Route::get('/warung/about', function(){
    return view('default.about');
});

Route::get('/warung/cara', function(){
    return view('default.cara');
});
/*
|--------------------------------------------------------------------------
| ROUTE DEFAULT
|--------------------------------------------------------------------------
|
*/
// Route::get('/warung', function () {
//     return view('default.index');
// });

/*
|--------------------------------------------------------------------------
| ROUTE USER
|--------------------------------------------------------------------------
|
*/
Route::resource('/user', 'UserController');

/*
|--------------------------------------------------------------------------
| ROUTE MENU
|--------------------------------------------------------------------------
|
*/
Route::resource('/menu', 'MenuController');

/*
|--------------------------------------------------------------------------
| ROUTE LAPORAN
|--------------------------------------------------------------------------
|
*/
Route::get('/laporan', 'LaporanController@index');
Route::get('/laporan/create', 'LaporanController@create');

/*
|--------------------------------------------------------------------------
| ROUTE CART ADMINISTRATOR
|--------------------------------------------------------------------------
|
*/
Route::get('/carts', 'CartController@index');
Route::get('/carts/remove/{cartID}', 'CartController@destroy');
Route::post('/carts', 'CartController@store');
Route::post('/carts/update', 'CartController@update');

/*
|--------------------------------------------------------------------------
| ROUTE ORDER
|--------------------------------------------------------------------------
|
*/
Route::get('/order', 'OrderController@index');
Route::get('/order/list', 'OrderController@list');
Route::get('/order/checkout', 'OrderController@checkout');
Route::post('order/checkout', 'OrderController@doCheckout');
Route::get('orders/received/{orderID}', 'OrderController@received');
Route::get('/order/{order}', 'OrderController@show');
Route::get('/order/create', 'OrderController@create');

Auth::routes();

/*
|--------------------------------------------------------------------------
| ROUTE HOME
|--------------------------------------------------------------------------
|
*/
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/akun', 'CobaController@akun')->name('akun');

/*
|--------------------------------------------------------------------------
| ROUTE WARUNG
|--------------------------------------------------------------------------
|
*/
Route::get('/warung', 'DefaultController@index');
Route::get('/warung/akun', 'HomeController@akunDefault');
Route::get('/warung/list', 'DefaultController@list');
Route::get('/warung/create', 'DefaultController@create');
Route::get('/warung/{warung}', 'DefaultController@show')->name('warung.show');
Route::get('/warung/akun/edit', 'HomeController@ubahAkun');
Route::patch('/warung/akun/{ubah}', 'HomeController@ubahAkunProses');

/*
|--------------------------------------------------------------------------
| ROUTE CART WARUNG
|--------------------------------------------------------------------------
|
*/
Route::get('/warung/carts/remove/{warung}', 'WarungCartController@destroy');
Route::get('/keranjang', 'WarungCartController@index');
Route::post('/warung/carts', 'WarungCartController@store');
Route::post('/warung/carts/update', 'WarungCartController@update');

/*
|--------------------------------------------------------------------------
| ROUTE ORDER
|--------------------------------------------------------------------------
|
*/
Route::get('/warung/order', 'WarungOrderController@index');
Route::get('/warung/order/list', 'WarungOrderController@list');
Route::get('/warung/order/checkout', 'WarungOrderController@checkout');
Route::post('/warung/order/checkout', 'WarungOrderController@doCheckout');
Route::get('/warung/orders/received/{orderID}', 'WarungOrderController@received');
Route::get('/warung/orders/receipt/{orderID}', 'WarungOrderController@receipt');
Route::get('/warung/order/{order}', 'WarungOrderController@show');
Route::get('/warung/order/create', 'WarungOrderController@create');

/*
|--------------------------------------------------------------------------
| ROUTE PEMBAYARAN WARUNG
|--------------------------------------------------------------------------
|
*/
Route::post('payments/notification', 'PaymentController@notification');
Route::get('payments/completed', 'PaymentController@completed');
Route::get('payments/failed', 'PaymentController@failed');
Route::get('payments/unfinish', 'PaymentController@unfinish');

/*
|--------------------------------------------------------------------------
| ROUTE PEMBAYARAN DASHBOARD
|--------------------------------------------------------------------------
|
*/
Route::post('payments/notification', 'DashboardPaymentController@notification');
Route::get('payments/completed', 'DashboardPaymentController@completed');
Route::get('payments/failed', 'DashboardPaymentController@failed');
Route::get('payments/unfinish', 'DashboardPaymentController@unfinish');