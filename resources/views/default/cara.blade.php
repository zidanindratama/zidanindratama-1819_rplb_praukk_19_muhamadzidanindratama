@extends('layout-default.home')
@section('judul', 'Cara Memakai | WarungKita')
@section('content')
                <div class="section about">
                     <div class="container">
                            <div class="">
                                   <h3>Cara melakukan pembayaran</h3>
                                   <div class="heading-line"></div>
                                   <ul class="pt-3">
									   <li>
										   	Pesan makanan terlebih dahulu <br>
											<img src="{{asset('warung_kita/assets/img/254.JPG')}}" class="img-fluid" style="width: 700px;" alt="">
									   </li>
									   <li>
										   	Pesanan tersebut akan masuk ke dalam keranjang anda, lalu lakukan checkout
											<img src="{{asset('warung_kita/assets/img/255.JPG')}}" class="img-fluid" style="width: 700px;" alt="">
									   </li>
									   <li>
										   	Isi form dibawah ini untuk melakukan pembayaran, setelah itu tekan tombol submit
											<img src="{{asset('warung_kita/assets/img/256.JPG')}}" class="img-fluid" style="width: 700px;" alt="">
									   </li>
									   <li>
										   	Anda akan diarahkan ke halaman pembayaran
											<img src="{{asset('warung_kita/assets/img/257.JPG')}}" class="img-fluid" style="width: 700px;" alt="">
									   </li>
									   <li>
										   	Pilih pembayaran dengan kartu kredit/debit, lalu lakukan pembayaran dengan credentials sebagai berikut <a href="https://docs.midtrans.com/en/technical-reference/sandbox-test">(testing credentials dari midtrans)</a>
											<div class="table-responsive mt-3">
												<table class="table">
													<thead>
														<tr>
															<th>Card Name</th>
															<th>Card Number</th>
															<th>Expiry Month</th>
															<th>Expiry Year</th>
															<th>CVV</th>
															<th>OTP/3DS</th>
														</tr>
													</thead>
													<tbody>
														<tr>
															<td>VISA</td>
															<td>4811 1111 1111 1114</td>
															<td>01</td>
															<td>2025</td>
															<td>123</td>
															<td>112233</td>
														</tr>
														<tr>
															<td>MASTERCARD</td>
															<td>5211 1111 1111 1117</td>
															<td>01</td>
															<td>2025</td>
															<td>123</td>
															<td>112233</td>
														</tr>
														<tr>
															<td>JCB</td>
															<td>3528 2033 2456 4357</td>
															<td>01</td>
															<td>2025</td>
															<td>123</td>
															<td>112233</td>
														</tr>
														<tr>
															<td>AMEX</td>
															<td>3701 9216 9722 458</td>
															<td>01</td>
															<td>2025</td>
															<td>123</td>
															<td>112233</td>
														</tr>
													</tbody>
												</table>
											</div>
									   </li>
								   </ul>
                            </div>
                     </div>
                </div>
@endsection