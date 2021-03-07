@extends('layout-dashboard.home')

@section('content')
<div class="col-md-12 mt-4">
                                <div class="card">
                                    <div class="card-body">
                                        <!-- title -->
                                        <div class="d-md-flex align-items-center">
                                            <div>
                                                <h2 class="card-title">Detail Menu</h2>
                                            </div>
                                        </div>
                                        <!-- title -->
                                        <form action="/carts" method="post">
                                            @csrf
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <input type="hidden" name="menu_id" value="{{$menu->id}}">
                                                </div>
                                                <div class="col-md-12">
                                                    <img src="{{ asset( $menu->gambar ) }}" class="img-fluid mb-5" style="width: 60%; display: block;
                                                        margin-left: auto;
                                                        margin-right: auto;" alt="">
                                                </div>
                                                <div class="col-md-6">
                                                    <p>Nama : </p>
                                                </div>
                                                <div class="col-md-6">
                                                    <p class="warna-oren">{{$menu->name}}</p>
                                                </div>
                                                <div class="col-md-6">
                                                    <p>Harga : </p>
                                                </div>
                                                <div class="col-md-6">
                                                    <p class="warna-oren">@currency($menu->price)</p>
                                                </div>
                                                <div class="col-md-6">
                                                    <p>Status : </p>
                                                </div>
                                                <div class="col-md-6">
                                                    <p class="warna-oren">{{$menu->status}}</p>
                                                </div>
                                                <div class="col-md-6">
                                                    <p>Deskripsi : </p>
                                                </div>
                                                <div class="col-md-6">
                                                    {!! $menu->deskripsi !!}
                                                </div>
                                                <div class="col-md-6">
                                                    <p>Quantity</p>
                                                </div>
                                                <div class="col-md-6">
                                                    <!-- <input type="hidden" value="{{$menu->id}}"> -->
                                                    <input type="number" name="quantity" class="form-control" placeholder="Jumlah pesanan" min="1">
                                                </div>
                                            </div>
                                            <button class="btn btn-primary">Tambah Ke Keranjang</button>
                                        </form>
                                    </div>
                                </div>
                            </div>

@endsection