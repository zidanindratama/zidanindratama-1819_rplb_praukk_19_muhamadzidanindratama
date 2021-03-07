@extends('layout-dashboard.home')

@section('content')
                            <div class="col-md-12 mt-4">
                                <div class="card">
                                    <div class="card-body">
                                        <!-- title -->
                                        <div class="d-md-flex align-items-center">
                                            <div>
                                                <h4 class="card-title">Keranjang Belanjaan</h4>
                                                <h5 class="card-subtitle">Diurutkan dari inputan terbaru</h5>
                                            </div>
                                        </div>
                                        <!-- title -->
                                        <div class="table-responsive">
                                            <form action="/carts/update" method="post">
                                                @csrf   
                                                <input class="btn btn-success mb-4 mt-2" name="update_cart" value="Update Cart" type="submit">
                                                <table class="table v-middle">
                                                    <thead>
                                                        <tr class="bg-light">
                                                            <th class="border-top-0">Menu</th>
                                                            <th class="border-top-0">Harga</th>
                                                            <th class="border-top-0">Jumlah</th>
                                                            <th class="border-top-0">Total</th>
                                                            <th class="border-top-0">Aksi</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @forelse ($items as $item)
                                                        @php
                                                            $image = !empty($item->gambar) ?  asset( $item->gambar )  : asset('assets/img/2.jpg') 
                                                        @endphp
                                                        <tr>
                                                            <td>{{$item->name}}</td>
                                                            <td>@currency($item->price)</td>
                                                            <td>@currency($item->price * $item->quantity)</td>
                                                            <td>
                                                            {!! Form::number('items['. $item->id .'][quantity]', $item->quantity, ['min' => 1, 'required' => true]) !!}
                                                            </td>
                                                            <td>
                                                                <a href="{{ url('carts/remove/'. $item->id)}}" class="btn btn-danger">Hapus</a>
                                                            </td>
                                                        </tr>
                                                        @empty
                                                        <tr>
                                                            <td colspan="6">The cart is empty!</td>
                                                        </tr>
                                                        @endforelse
                                                    </tbody>
                                                </table>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <h2>Jumlah</h2>
                                                    </div>
                                                    <div class="col-md-6">
                                                        Total Harga
                                                    </div>
                                                    <div class="col-md-6">
                                                        Rp. {{ number_format(\Cart::getSubTotal()) }}
                                                    </div>
                                                    <div class="col-md-6">
                                                        <a href="/order/checkout" class="btn btn-warning">Proceed to checkout</a>
                                                        <a href="/order" class="btn btn-success">Kembali</a>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
@endsection