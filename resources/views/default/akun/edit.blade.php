@extends('layout-default.home')
@section('judul', 'Akun Edit | WarungKita')
@section('content')
<section class="home detail" style="padding-top: 50px;">
              <div class="container">
                     <div class="row mt-5">
                            <div class="col-lg-6 mt-5 py-5 d-flex justify-content-center">
                                   @if($user->gambar == null) 
                                    <img src="{{asset('warung_kita/assets/img/default.jpg')}}" alt="" class="img-fluid">
                                   @else
                                    <img src="/{{$user->gambar}}" alt="" class="img-fluid">
                                   @endif
                            </div>
                            <div class="col-lg-6 my-auto">
								<form action="/warung/akun/{{$user->id}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    @method('patch')
                                   <div class="row">
                                          <div class="home-content offset-lg-1 col-lg-10">
                                                 <h1>Ubah akun</h1>
                                                 <h5 class="card-title">{{$user->name}}</h5>
                                                 <p class="card-text">{{$user->email}}</p>
                                                 <p class="card-text">{{$user->username}}</p>
                                                 <h5>Deskripsi</h5>
                                                 <p class="pb-3">{{$user->name}} adalah seorang {{$user->role}} dengan email {{$user->email}}</p>
												 <div class="row">
													<div class="col-md-6 pt-2">
														   Nama
													</div>
													<div class="col-md-6">
														   <div class="form-group">
																  <input type="text" name="name" id="" class="form-control @error('name') is-invalid @enderror" value="{{$user->name}}" placeholder="name pegawai">
                                                                @error('name')
                                                                    <span class="invalid-feedback">Masukkan data yang benar!</span>
                                                                @enderror
														   </div>
													</div>
													<div class="col-md-6 pt-2">
														   Username
													</div>
													<div class="col-md-6">
														   <div class="form-group">
																  <input type="text" name="username" id="" class="form-control @error('username') is-invalid @enderror" value="{{$user->username}}" placeholder="username pegawai">
                                                                @error('username')
                                                                    <span class="invalid-feedback">Masukkan data yang benar!</span>
                                                                @enderror
														   </div>
													</div>
                                                    <div class="col-md-6 pt-2">
                                                    <p>Gambar</p>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <div class="custom-file">
                                                                <input type="file" name="gambar" class="custom-file-input" id="validatedCustomFile">
                                                                <label class="custom-file-label" for="validatedCustomFile">Pilih gambar</label>
                                                            </div>
                                                        </div>
                                                    </div>
												</div>	
                                                 <a href="/warung/akun" class="btn btn-lg btn-outline-secondary mr-3">Kembali</a>
                                                 <button class="btn btn-lg btn-secondary">Submit</button>
                                          </div>
                                   </div>
								</form>
                            </div>
                     </div>
              </div>
       </section>
@endsection