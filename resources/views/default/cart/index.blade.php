@extends('layout-default.home')
@section('judul', 'Cart | WarungKita')
@section('content')
<div class="section about">
                     <div class="container">
                            <h3>Keranjang Orderan Anda</h3>
                            <div class="heading-line"></div>
                            <p class="py-3">
                                   Data <b>keranjang</b> anda akan hilang jika sudah menekan tombol checkout
                            </p>
                     </div>
              </div>
              <section class="contact">
                     <div class="container">
                            <div class="py-5">
                                   <h2 class="py-3">Keranjang Anda</h2>
                                   <div class="heading-line"></div>
                            </div>
							<div class="table-responsive">
								<form action="/warung/carts/update" method="post">
									@csrf   
									<input class="btn btn-success mb-4 mt-2" name="update_cart" value="Update Cart" type="submit">
									<table class="table">
										<thead>
											<tr>
												<th>Menu</th>
												<th>Harga</th>
												<th>Jumlah</th>
												<th>Total</th>
												<th>Aksi</th>
											</tr>
										</thead>
										<tbody>
											@forelse ($items as $item)
											@php
												$image = !empty($item->gambar) ?  asset( $item->gambar )  : asset('assets/img/2.jpg') 
											@endphp
											<tr>
												<td>{{$item->name}}</td>
												<td>@currency($item->price)</td>
												<td>@currency($item->price * $item->quantity)</td>
												<td>
												{!! Form::number('items['. $item->id .'][quantity]', $item->quantity, ['min' => 1, 'required' => true]) !!}
												</td>
												<td>
													<a href="{{ url('warung/carts/remove/'. $item->id)}}" class="btn btn-danger">Hapus</a>
												</td>
											</tr>
											@empty
											<tr>
												<td colspan="6">The cart is empty!</td>
											</tr>
											@endforelse
										</tbody>
									</table>
								</form>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class=" table-responsive mt-5">
										<table class="table">
											<thead>
												<tr class="order-total">
													<th>Order Total</th>
													<td><strong><span class="total-amount">Rp. {{ number_format(\Cart::getSubTotal()) }}</span></strong>
													</td>
												</tr>		
											</thead>
										</table>
									</div>
								</div>
							</div>
							<a href="/warung/order/checkout" class="btn btn-primary mb-2 mt-3 mr-4">Checkout</a>
                        	<a href="/warung" class="btn btn-success mb-2 mt-3">Kembali</a>
                     </div>
              </section>
@endsection