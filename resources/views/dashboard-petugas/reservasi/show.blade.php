@extends('layout-dashboard.home')

@section('content')
<div class="col-md-12 mt-4">
                                <div class="card">
                                    <div class="card-body">
                                        <!-- title -->
                                        <div class="d-md-flex align-items-center">
                                            <div>
                                                <h2 class="card-title">Detail Reservasi</h2>
                                            </div>
                                        </div>
                                        <!-- title -->
                                        <div class="row">
                                            <div class="col-md-6">
                                                <p>Nama : </p>
                                            </div>
                                            <div class="col-md-6">
                                                <p class="warna-oren">{{$reservasi->name}}</p>
                                            </div>
                                            <div class="col-md-6">
                                                <p>No Meja : </p>
                                            </div>
                                            <div class="col-md-6">
                                                <p class="warna-oren">{{$reservasi->no_meja}}</p>
                                            </div>
                                            <div class="col-md-6">
                                                <p>Tanggal : </p>
                                            </div>
                                            <div class="col-md-6">
                                                <p class="warna-oren">{{$reservasi->created_at->diffForHumans()}}</p>
                                            </div>
                                            <div class="col-md-6">
                                                <p>Keterangan : </p>
                                            </div>
                                            <div class="col-md-6">
                                                <p class="warna-oren">{{$reservasi->keterangan}}</p>
                                            </div>
                                            <div class="col-md-6">
                                                <p>Status : </p>
                                            </div>
                                            <div class="col-md-6">
                                                <p class="warna-oren">{{$reservasi->status}}</p>
                                            </div>
                                        </div>
                                        <a href="/petugas/reservasi" class="btn btn-success mt-3">kembali</a>
                                    </div>
                                </div>
                            </div>
@endsection