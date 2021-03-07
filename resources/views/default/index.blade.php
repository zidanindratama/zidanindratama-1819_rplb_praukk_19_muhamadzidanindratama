@extends('layout-default.home')

@section('content')
		<section class="home bg-light">
                     <div class="container">
                            <div class="row mt-5">
                                   <div class="col-lg-6 mt-5 py-5">
                                          <img src="{{asset('warung_kita/assets/img/makanan.png')}}" alt="" class="img-fluid" data-aos="zoom-in-right" data-aos-duration="2000">
                                   </div>
                                   <div class="col-lg-6 my-auto">
                                          <div class="row">
                                                 <div class="home-content offset-lg-1 col-lg-10" data-aos="fade-right" data-aos-duration="2000">
                                                        <h1>WarungKita menjual berbagai macam makanan cepat saji</h1>
                                                        <!-- <h1>Denis sama Baim jelek.</h1> -->
                                                        <p class="pb-3">Layanan Dine-In WarungKita Mulai Dibuka Kembali</p>
                                                        @guest
                                                               <a href="/warung/about"><button class="btn btn-lg btn-outline-secondary mr-3">Learn more</button></a>
                                                               <a href="/login" class="btn btn-lg btn-secondary">Login</a>
                                                        @else
                                                               <a href="/warung/about" class="btn btn-lg btn-outline-secondary mr-3">Learn more</a>
                                                               <a href="/warung/akun" class="btn btn-lg btn-secondary">{{ Auth::user()->name }}</a>
                                                        @endguest
                                                 </div>
                                          </div>
                                   </div>
                            </div>
                     </div>
              	</section>
				<section class="most-sold container">
                     <div class="most mb-5" data-aos="fade-right" data-aos-duration="2000">
                            <h2>Menu Terbaru.</h2>
                            <div class="heading-line"></div>
                     </div>
                     <div class="card-deck" data-aos="fade-down" data-aos-duration="2000">
                            @foreach($favorit as $value)
                            <div class="card shadow p-3" data-aos="fade-down" data-aos-duration="2000">
                                   <div class="row">
                                          <div class="col-lg-6 col-sm-12">
                                                 <img class="card-img-top" src="{{ asset( $value->gambar ) }}" alt="">
                                          </div>
                                          <div class="col-lg-6 col-sm-12">
                                                 <div class="card-body mt-3">
                                                        <h4 class="card-title">{{$value->name}}</h4>
                                                        <p class="card-text">@currency($value->price)</p>
                                                 </div>
                                          </div>
                                   </div>
                            </div>
                            @endforeach
                     </div>
				</section>
				<div class="just-for-you container mb-5">
						<div class="for-you mb-5"  data-aos="fade-right" data-aos-duration="2000">
								<h2>Menu WarungKita.</h2>
								<div class="heading-line"></div>
						</div>
						<div class="row" data-aos="fade-down" data-aos-duration="2000">
							@foreach($menus as $menu)
							<div class="col-md-3 mt-4">
								<div class="card shadow p-3">
									<img class="card-img-top" src="{{ asset( $menu->gambar ) }}" alt="Card image cap">
									<div class="card-body">
										<h5 class="card-title">{{$menu->name}}</h5>
										<p class="card-text">@currency($menu->price)</p>
										<p>{{$menu->status}}</p>
										<a href="/warung/{{$menu->id}}" class="btn btn-primary">Pesan sekarang</a>
									</div>
								</div>
							</div>
							@endforeach
						</div>
				</div>
@endsection