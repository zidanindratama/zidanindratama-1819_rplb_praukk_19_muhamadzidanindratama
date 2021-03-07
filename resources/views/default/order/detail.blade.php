@extends('layout-default.home')

@section('content')
<section class="home detail" style="padding-top: 50px;">
              <div class="container">
                     <div class="row mt-5">
                            <div class="col-lg-6 mt-5 py-5 pl-5">
                                   <img src="{{ asset( $menu->gambar ) }}" alt="" class="img-fluid">
                            </div>
                            <div class="col-lg-6 my-auto">
								<form action="/warung/carts" method="post">
                                	@csrf
                                   <div class="row">
									   <input type="hidden" name="menu_id" value="{{$menu->id}}">
                                          <div class="home-content offset-lg-1 col-lg-10">
                                                 <h1>Deskripsi makanan</h1>
                                                 <h5 class="card-title">{{$menu->name}}</h5>
                                                 <p class="card-text">@currency($menu->price)</p>
                                                 <h5>Deskripsi</h5>
                                                 <p class="pb-3">{!!$menu->deskripsi!!}</p>
												 <div class="row">
													<div class="col-md-6 pt-2">
														   Mau pesan berapa?
													</div>
													<div class="col-md-6">
														   <div class="form-group">
																  <input type="number" name="quantity" class="form-control" id="name" placeholder="Input disini">
														   </div>
													</div>
												</div>	
                                                 <a href="/warung" class="btn btn-lg btn-outline-secondary mr-3">Kembali</a>
                                                 <button class="btn btn-lg btn-secondary">Tambah Ke Keranjang</button>
                                          </div>
                                   </div>
								</form>
                            </div>
                     </div>
              </div>
       </section>
@endsection