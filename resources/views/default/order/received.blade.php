@extends('layout-default.home')
@section('judul', 'Order Detail | WarungKita')
@section('content')
                <div class="section about">
                     <div class="container">
                            <h3>Data Orderan Anda</h3>
                            <div class="heading-line"></div>
                            <p class="py-3">
                                   Segera lakukan <b>pembayaran</b> sekarang
                            </p>
                     </div>
              </div>
              <section class="contact">
                     <div class="container">
                            <div class="py-5">
                                   <h2 class="py-3">Orderan {{ $order->customer_first_name }}</h2>
                                   <div class="heading-line"></div>
                            </div>
							<div class="table-responsive">
								<form action="" method="post">
									@csrf   
									<table class="table">
										<thead>
											<tr>
												<th>Id</th>
												<th>Item</th>
												<th>Quantity</th>
												<th>Unit Cost</th>
												<th>Total</th>
											</tr>
										</thead>
										<tbody>
                                            @forelse ($order->orderItems as $item)
                                            <tr>
                                                <td>{{ $item->id }}</td>
                                                <td>{{ $item->name }}</td> 
                                                <td>{{ $item->quantity }}</td>
                                                <td>@currency($item->base_price)</td>
                                                <td>@currency($item->sub_total)</td>
                                            </tr>
                                            @empty
                                            <tr>
                                                <td colspan="6">Order item not found!</td>
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
													<th>Subtotal</th>
													<td><span class="amount">@currency($order->base_total_price)</span></td>
												</tr>		
												<tr class="order-total">
													<th>Tax (10%)</th>
													<td><span class="amount">@currency($order->tax_amount)</span></td>
												</tr>		
												<tr class="order-total">
													<th>Status</th>
													<td><span class="amount">{{ $order->status }}</span></td>
												</tr>		
                                                <tr class="order-total">
                                                    <th>Order Total</th>
                                                    <td><strong><span class="total-amount">@currency($order->grand_total)</span></strong>
                                                    </td>
                                                </tr>
											</thead>
										</table>
									</div>
								</div>
							</div>
							@if (!$order->isPaid())
                                <a href="{{ $order->payment_url }}" class="btn btn-primary">Lakukan Pembayaran</a>
                            @endif
                            <a href="/warung/order/list" class="btn btn-success">Kembali</a>
                     </div>
              </section>
@endsection