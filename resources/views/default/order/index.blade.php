@extends('layout-default.home')

@section('content')
<div class="section about">
                     <div class="container">
                            <h3>Orderan Anda</h3>
                            <div class="heading-line"></div>
                            <p class="py-3">
                                   Ini adalah <b>list orderan</b> yangg telah anda buat
                            </p>
                     </div>
              </div>
              <section class="contact">
                     <div class="container">
                            <div class="py-5">
                                   <h2 class="py-3">Data Orderan Anda</h2>
                                   <div class="heading-line"></div>
                            </div>
							<div class="table-responsive">
								<form action="" method="post">
									@csrf   
									<table class="table">
										<thead>
											<tr>
												<th>Id</th>
												<th>No Meja</th>
												<th>Keterangan</th>
												<th>Grand Total</th>
												<th>Status</th>
												<th>Aksi</th>
											</tr>
										</thead>
										<tbody>
                                            @forelse ($orders as $order)
                                                <tr>    
                                                    <td>
                                                        {{ $order->id }}<br>
                                                    </td>
                                                    <td>{{ $order->no_meja }}</td>
                                                    <td>{{ $order->keterangan }}</td>
                                                    <td>@currency($order->grand_total)</td>
                                                    <td>{{ $order->payment_status }}</td>
                                                    <td>
                                                        @if (!$order->isPaid())
                                                            <a href="{{ $order->payment_url }}" class="btn btn-primary">Lakukan Pembayaran</a>
                                                        @endif
                                                        @if ($order->isPaid())
                                                            <a href="{{ url('/warung/orders/receipt/'. $order->id) }}" class="btn btn-primary">Cetak kwitansi</a>
                                                        @endif
                                                        <a href="{{ url('/warung/orders/received/'. $order->id) }}" class="btn btn-info">Detail</a>
                                                    </td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="5">No records found</td>
                                                </tr>
                                            @endforelse
                                        </tbody>
									</table>
								</form>
							</div>
                        	<a href="/warung" class="btn btn-success mb-2 mt-3">Kembali</a>
                     </div>
              </section>
@endsection