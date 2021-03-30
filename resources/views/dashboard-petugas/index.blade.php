@extends('layout-dashboard.home')

@section('content')
<div class="col-md-12">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <div class="card">
                                            <div class="card-body">
                                                <h5 class="card-title mb-4">Pelanggan</h5>
                                                <h1 class="display-5 mt-1 mb-3">{{$pelanggan}}</h1>
                                                <div class="mb-1">
                                                    <span class="text-danger">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="card">
                                            <div class="card-body">
                                                <h5 class="card-title mb-4">Kasir</h5>
                                                <h1 class="display-5 mt-1 mb-3">{{$kasir}}</h1>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="card">
                                            <div class="card-body">
                                                <h5 class="card-title mb-4">Menu</h5>
                                                <h1 class="display-5 mt-1 mb-3">{{$menu}}</h1>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="card">
                                            <div class="card-body">
                                                <h5 class="card-title mb-4">Pemasukan</h5>
                                                <h1 class="display-5 mt-1 mb-3">@currency($pemasukan)</h1>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
<div class="col-md-12 mt-4">
                                <div class="card">
                                    <div class="card-body">
                                        <!-- title -->
                                        <div class="d-md-flex align-items-center">
                                            <div>
                                                <h4 class="card-title">List Order</h4>
                                                <h5 class="card-subtitle">Diurutkan dari inputan terbaru</h5>
                                            </div>
                                        </div>
                                        <!-- title -->
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table v-middle">
                                            <thead>
                                                <tr class="bg-light">
                                                    <th class="border-top-0">Id</th>
                                                    <th class="border-top-0">No Meja</th>
                                                    <th class="border-top-0">Keterangan</th>
                                                    <th class="border-top-0">Grand Total</th>
                                                    <th class="border-top-0">Status</th>
                                                    <th class="border-top-0">Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse ($orders as $order)
                                                    <tr>    
                                                        <td>
                                                            {{ $order->id }}<br>
                                                        </td>
                                                        <td>{{ $order->no_meja }}</td>
                                                        <td>{{ $order->keterangan }}</td>
                                                        <td>@currency($order->grand_total)</td>
                                                        <td>{{ $order->status }}</td>
                                                        <td>
                                                            @if (!$order->isPaid())
                                                            <a href="{{ $order->payment_url }}" class="btn btn-primary btn-sm">Lakukan Pembayaran</a>
                                                            @endif
                                                            @if ($order->isPaid())
                                                                <a href="{{ url('/warung/orders/receipt/'. $order->id) }}" class="btn btn-primary btn-sm">Cetak kwitansi</a>
                                                            @endif
                                                            <a href="{{ url('/orders/received/'. $order->id) }}" class="btn btn-info btn-sm">Detail</a>
                                                        </td>
                                                    </tr>
                                                @empty
                                                    <tr>
                                                        <td colspan="5">No records found</td>
                                                    </tr>
                                                @endforelse
                                            </tbody>
                                        </table>
                                        {{ $orders->links() }}
                                    </div>
                                </div>
                            </div>
@endsection