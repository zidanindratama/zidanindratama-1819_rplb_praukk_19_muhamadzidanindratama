@extends('layout-default.home')

@section('content')
<section class="home detail" style="padding-top: 50px;">
              <div class="container">
                     <div class="row mt-5">
                            <div class="col-lg-12 my-auto">
								<form id="logout-form" action="{{ route('logout') }}" method="POST">
                                    @csrf
                                   <div class="row">
									   <input type="hidden" name="menu_id" value="">
                                          <div class="home-content offset-lg-1 col-lg-10">
                                                 <h1>Deskripsi akun</h1>
                                                 <h5 class="card-title">{{$user->email}}</h5>
                                                 <p class="card-text">{{$user->role}}</p>
                                                 <h5>Deskripsi</h5>
                                                 <p class="pb-3">{{$user->name}} adalah seorang {{$user->role}} dengan email {{$user->email}}</p>
												<button type="submit" class="btn btn-primary">Logout</button>
                                                 <a href="/warung" class="btn btn-outline-secondary ml-3">Kembali</a>
                                          </div>
                                   </div>
								</form>
                            </div>
                     </div>
              </div>
       </section>
@endsection