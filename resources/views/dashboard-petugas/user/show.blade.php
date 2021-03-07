@extends('layout-dashboard.home')

@section('content')
 <div class="col-md-12 mt-4">
                                <div class="card">
                                    <div class="card-body">
                                        <!-- title -->
                                        <div class="d-md-flex align-items-center">
                                            <div>
                                                <h2 class="card-title">Detail Pegawai</h2>
                                            </div>
                                        </div>
                                        <!-- title -->
                                          <div class="row">
                                            <div class="col-md-6">
                                                <p>Email : </p>
                                            </div>
                                            <div class="col-md-6">
                                                <p class="warna-oren">{{$user->email}}</p>
                                            </div>
                                            <div class="col-md-6">
                                                <p>Nama : </p>
                                            </div>
                                            <div class="col-md-6">
                                                <p class="warna-oren">{{$user->name}}</p>
                                            </div>
                                            <div class="col-md-6">
                                                <p>Username : </p>
                                            </div>
                                            <div class="col-md-6">
                                                <p class="warna-oren">{{$user->username}}</p>
                                            </div>
                                            <div class="col-md-6">
                                                <p>Level : </p>
                                            </div>
                                            <div class="col-md-6">
                                                <p class="warna-oren">{{$user->role}}</p>
                                            </div>
                                        </div>
                                        <a href="/user" class="btn btn-success mb-5 mt-3">kembali</a>
                                    </div>
                                </div>
                            </div>
@endsection