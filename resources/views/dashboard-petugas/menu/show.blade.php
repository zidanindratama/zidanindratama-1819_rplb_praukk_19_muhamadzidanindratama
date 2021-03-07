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
                                        <div class="row">
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
                                                <p>Status : </p>
                                            </div>
                                            <div class="col-md-6">
                                                {!! $menu->deskripsi !!}
                                            </div>
                                        </div>
                                        <a href="/menu" class="btn btn-success mb-5 mt-3">kembali</a>
                                    </div>
                                </div>
                            </div>
@endsection