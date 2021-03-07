@extends('layout-dashboard.home')

@section('content')
 <div class="col-md-12 mt-4">
                                <div class="card">
                                    <div class="card-body">
                                        <!-- title -->
                                        <div class="d-md-flex align-items-center">
                                            <div>
                                                <h2 class="card-title">Detail Level</h2>
                                            </div>
                                        </div>
                                        <!-- title -->
                                        <div class="row">
                                            <div class="col-md-6">
                                                <p>Nama level : </p>
                                            </div>
                                            <div class="col-md-6">
                                                <p class="warna-oren">{{$level->name}}</p>
                                            </div>
                                        </div>
                                        <a href="/petugas/level" class="btn btn-success mb-5 mt-3">kembali</a>
                                    </div>
                                </div>
                            </div>
@endsection