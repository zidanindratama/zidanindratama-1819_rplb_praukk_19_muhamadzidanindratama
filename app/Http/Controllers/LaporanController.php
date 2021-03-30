<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\OrderItem;
use App\User;
use App\Order;
use App\Payment;
use App;
use PDF;
use Illuminate\Support\Facades\DB;

class LaporanController extends Controller
{
    public function __construct(){
        $this->middleware([
           'auth',
           'privilege:Administrator&Owner',
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard-petugas.laporan.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        PDF::setOptions(['dpi' => 150, 'defaultFont' => 'sans-serif']);
        $data = [
            'pemasukan' => DB::table('orders')->where('payment_status', 'paid')->get(),
            'belum_bayar' => DB::table('orders')->where('payment_status', 'unpaid')->get(),
        ];
        $pdf = PDF::loadView('dashboard-petugas.laporan.pdf', $data);
        return $pdf->download('Laporan-pemasukan-warung-kita.pdf');
    }
}
