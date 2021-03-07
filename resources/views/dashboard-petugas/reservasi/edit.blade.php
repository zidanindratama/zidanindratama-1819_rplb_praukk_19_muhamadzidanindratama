@extends('layout-dashboard.home')

@section('content')
<div class="col-md-12 mt-4">
                                <div class="card">
                                    <div class="card-body">
                                        <!-- title -->
                                        <div class="d-md-flex align-items-center">
                                            <div>
                                                <h2 class="card-title">Edit Reservasi</h2>
                                            </div>
                                        </div>
                                        <!-- title -->
                                        <form action="/petugas/reservasi/{{$reservasi->id}}" method="post">
											@csrf
											@method('patch')
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <p>Atas Nama : </p>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <input type="text" name="name" id="" class="form-control @error('name') is-invalid @enderror" value="{{$reservasi->name}}" placeholder="nama pelanggan" autocomplete="off">
														@error('name')
                                                            <span class="invalid-feedback">Masukkan data yang benar!</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <p>No Meja : </p>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="row">
                                                        <div class="col-md-3">
                                                            <div class="card shadow">
                                                                <div class="card-body">
                                                                    <h4 class="card-title">Meja No 1</h4>
                                                                    <input type="radio" name="no_meja" id="" value="1" {{ $reservasi->no_meja == '1' ? 'checked' : '' }}> Pilih
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="card shadow">
                                                                <div class="card-body">
                                                                    <h4 class="card-title">Meja No 2</h4>
                                                                    <input type="radio" name="no_meja" id="" value="2" {{ $reservasi->no_meja == '2' ? 'checked' : '' }}> Pilih
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="card shadow">
                                                                <div class="card-body">
                                                                    <h4 class="card-title">Meja No 3</h4>
                                                                    <input type="radio" name="no_meja" id="" value="3" {{ $reservasi->no_meja == '3' ? 'checked' : '' }}> Pilih
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="card shadow">
                                                                <div class="card-body">
                                                                    <h4 class="card-title">Meja No 4</h4>
                                                                    <input type="radio" name="no_meja" id="" value="4" {{ $reservasi->no_meja == '4' ? 'checked' : '' }}> Pilih  
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="card shadow">
                                                                <div class="card-body">
                                                                    <h4 class="card-title">Meja No 5</h4>
                                                                    <input type="radio" name="no_meja" id="" value="5" {{ $reservasi->no_meja == '5' ? 'checked' : '' }}> Pilih
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="card shadow">
                                                                <div class="card-body">
                                                                    <h4 class="card-title">Meja No 6</h4>
                                                                    <input type="radio" name="no_meja" id="" value="6" {{ $reservasi->no_meja == '6' ? 'checked' : '' }}> Pilih
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="card shadow">
                                                                <div class="card-body">
                                                                    <h4 class="card-title">Meja No 7</h4>
                                                                    <input type="radio" name="no_meja" id="" value="7" {{ $reservasi->no_meja == '7' ? 'checked' : '' }}> Pilih
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="card shadow">
                                                                <div class="card-body">
                                                                    <h4 class="card-title">Meja No 8</h4>
                                                                    <input type="radio" name="no_meja" id="" value="8" {{ $reservasi->no_meja == '8' ? 'checked' : '' }}> Pilih
                                                                </div>
                                                            </div>
                                                        </div>
														@error('no_meja')
                                                            <span class="invalid-feedback">Masukkan data yang benar!</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <p>Keterangan : </p>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <textarea name="keterangan" class="form-control" id="" cols="30" rows="10">{{$reservasi->keterangan}}</textarea>
														@error('keterangan')
                                                            <span class="invalid-feedback">Masukkan data yang benar!</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <button type="submit" class="btn btn-primary mb-5 mt-3 mr-4">submit</button>
                                            <a href="/petugas/reservasi" class="btn btn-success mb-5 mt-3">kembali</a>
                                        </form>
                                    </div>
                                </div>
                            </div>
@endsection