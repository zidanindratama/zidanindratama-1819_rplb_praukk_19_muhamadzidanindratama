@extends('layout-dashboard.home')

@section('content')
   <div class="col-md-12 mt-4">
                                <div class="card">
                                    <div class="card-body">
                                        <!-- title -->
                                        <div class="d-md-flex align-items-center">
                                            <div>
                                                <h2 class="card-title">Tambah Pegawai</h2>
                                            </div>
                                        </div>
                                        <!-- title -->
                                        	<form action="/user" method="post">
                                            @csrf
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <p>Nama : </p>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <input type="text" name="name" id="" class="form-control @error('name') is-invalid @enderror" value="{{old('name')}}" placeholder="nama pegawai" autocomplete="off">
                                                        @error('name')
                                                            <span class="invalid-feedback">Masukkan data yang benar!</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <p>Email : </p>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <input type="email" name="email" id="" class="form-control @error('email') is-invalid @enderror" value="{{old('email')}}" placeholder="email pegawai">
                                                        @error('email')
                                                            <span class="invalid-feedback">Masukkan data yang benar!</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <p>Username : </p>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <input type="text" name="username" id="" class="form-control @error('username') is-invalid @enderror" value="{{old('username')}}" placeholder="username pegawai">
                                                        @error('username')
                                                            <span class="invalid-feedback">Masukkan data yang benar!</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <p>Password : </p>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <input type="password" name="password" id="" class="form-control @error('password') is-invalid @enderror" value="{{old('password')}}" placeholder="password pegawai">
                                                        @error('username')
                                                            <span class="invalid-feedback">Masukkan data yang benar!</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <p>Role : </p>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                    <select name="role" class="custom-select @error('role') is-invalid @enderror">
                                                       <option value="Administrator">Administrator</option>
                                                       <option value="Kasir">Kasir</option>
                                                       <option value="Waiter">Waiter</option>
                                                       <option value="Owner">Owner</option>
                                                       <option value="Pelanggan">Pelanggan</option>
                                                    </select>
                                                    @error('role')
                                                        <span class="invalid-feedback">Masukkan data yang benar!</span>
                                                    @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <button type="submit" class="btn btn-primary mb-5 mt-3 mr-4">submit</button>
                                            <a href="/user" class="btn btn-success mb-5 mt-3">kembali</a>
                                        </form>
                                    </div>
                                </div>
                            </div>
@endsection