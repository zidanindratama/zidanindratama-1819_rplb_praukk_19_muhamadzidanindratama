@extends('layout-dashboard.home')

@section('content')
<div class="col-md-12 mt-4">
                                <div class="card">
                                    <div class="card-body">
                                        <!-- title -->
                                        <div class="d-md-flex align-items-center">
                                            <div>
                                                <h2 class="card-title">Tambah Level</h2>
                                            </div>
                                        </div>
                                        <!-- title -->
                                       <form action="/petugas/level" method="post">
                                            @csrf
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <p>Nama level : </p>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <input type="text" name="name" id="" class="form-control @error('name') is-invalid @enderror" value="{{old('name')}}" placeholder="nama level">
                                                        @error('name')
                                                            <span class="invalid-feedback">Masukan data yang benar!</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <button type="submit" class="btn btn-primary mb-5 mt-3 mr-4">submit</button>
                                            <a href="/petugas/level" class="btn btn-success mb-5 mt-3">kembali</a>
                                        </form>
                                    </div>
                                </div>
                            </div>
@endsection