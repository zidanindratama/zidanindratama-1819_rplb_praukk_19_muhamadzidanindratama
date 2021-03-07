@extends('layout-dashboard.home')

@section('content')
<div class="col-md-12 mt-4">
                                <div class="card">
                                    <div class="card-body">
                                        <!-- title -->
                                        <div class="d-md-flex align-items-center">
                                            <div>
                                                <h4 class="card-title">Generate Laporan</h4>
                                            </div>
                                        </div>
                                        <!-- title -->
                                        <div class="card w-100 shadow">
                                            <img class="card-img-top" src="holder.js/100x180/" alt="">
                                            <div class="card-body">
                                                <h4 class="card-title">Buat Laporan</h4>
                                                <p class="card-text background-oren p-2 rounded">Buat laporan pemasukan,
                                                    semua data transaksi
                                                    akan di rekap dan di buat laporannya.</p>
                                                <a href="/laporan/create" class="btn btn-primary mb-5 mt-3 mr-4">Buat
                                                    laporan</a>
                                                <a href="/dashboard" class="btn btn-success mb-5 mt-3">Kembali</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>  								
@endsection