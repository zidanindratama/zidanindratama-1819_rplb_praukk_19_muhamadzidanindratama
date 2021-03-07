@extends('layout-dashboard.home')

@section('content')
   <div class="col-md-12 mt-4">
                                <div class="card">
                                    <div class="card-body">
                                        <!-- title -->
                                        <div class="d-md-flex align-items-center">
                                            <div>
                                                <h2 class="card-title">Edit Pegawai</h2>
                                            </div>
                                        </div>
                                        <!-- title -->
                                        <form action="/user/{{$user->id}}" method="post">
                                            @csrf
                                            @method('put')
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <p>Nama : </p>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <input type="text" name="name" id="" class="form-control @error('name') is-invalid @enderror" value="{{$user->name}}" placeholder="nama pegawai" autocomplete="off">
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
                                                        <input type="email" name="email" id="" class="form-control @error('email') is-invalid @enderror" value="{{$user->email}}" placeholder="email pegawai" readonly>
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
                                                        <input type="text" name="username" id="" class="form-control @error('username') is-invalid @enderror" value="{{$user->username}}" placeholder="username pegawai">
                                                        @error('username')
                                                            <span class="invalid-feedback">Masukkan data yang benar!</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <p>Level : </p>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                    <select name="role" class="custom-select @error('role') is-invalid @enderror">
                                                       <option value="Administrator" {{ $user->role == 'Administrator' ? 'selected' : '' }}>Administrator</option>
                                                       <option value="Kasir" {{ $user->role == 'Kasir' ? 'selected' : '' }}>Kasir</option>
                                                       <option value="Waiter" {{ $user->role == 'Waiter' ? 'selected' : '' }}>Waiter</option>
                                                       <option value="Owner" {{ $user->role == 'Owner' ? 'selected' : '' }}>Owner</option>
                                                       <option value="Pelanggan" {{ $user->role == 'Pelanggan' ? 'selected' : '' }}>Pelanggan</option>
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