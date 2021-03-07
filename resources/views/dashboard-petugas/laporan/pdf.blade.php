<!doctype html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		
		<title>Laporan pembayaran SPP</title>

	</head>
	<body>

		<style>
			.page-break{
				page-break-after:always;
			}
			.text-center{
				text-align:center;
			}
			.text-header {
				font-size:1.1rem;
			}
			.size2 {
				font-size:1.4rem;
			}
			.border-bottom {
				border-bottom:1px black solid;
			}
			.border {
				border: 2px block solid;
			}
			.border-top {
				border-top:1px black solid;
			}
			.float-right {
				float:right;
			}
			.mt-4 {
				margin-top:4px;
			}
			.mx-1 {
				margin:1rem 0 1rem 0;
			}
			.mr-1 {
				margin-right:1rem;
			}
			.mt-1 {
				margin-top:1rem;
			}
			ml-2 {
				margin-left:2rem;
			}
			.ml-min-5 {
				margin-left:-5px;
			}
			.text-uppercase {
				font:uppercase;
			}
			.d1 {
				font-size:2rem;
			}
			.img {
				position:absolute;
			}
			.link {
				font-style:underline;
			}
			.text-desc {
				font-size:14px;
			}
			.text-bold {
				font-style:bold;
			}
			.underline {
				text-decoration:underline;
			}
			
			table {
				font-family: Arial, Helvetica, sans-serif;
				color: #666;
				text-shadow: 1px 1px 0px #fff;
				background: #eaebec;
				border: #ccc 1px solid;
			}
			table th {
				padding: 10px 15px;
				border-left:1px solid #e0e0e0;
				border-bottom: 1px solid #e0e0e0;
				background: #ededed;
			}  
			table tr {
				text-align: center;
				padding-left: 20px;
			}
			table td {
				padding: 10px 15px;
				border-top: 1px solid #ffffff;
				border-bottom: 1px solid #e0e0e0;
				border-left: 1px solid #e0e0e0;
				background: #fafafa;
				font-size: 10px;
				background: -webkit-gradient(linear, left top, left bottom, from(#fbfbfb), to(#fafafa));
				background: -moz-linear-gradient(top, #fbfbfb, #fafafa);
			}
			.table-center {
				margin-left:auto;
				margin-right:auto;
			}
			.mb-1 {
				margin-bottom:1rem;
			}
		</style>
	
		<!-- header -->
		<div class="text-center">
			<img src="{{ public_path('/warung_kita/assets/img/menu-2.png') }}" class="img" alt="logo.png" width="90">
			<div style="margin-left:6rem;">
				<span class="text-header text-bold text-danger">
					KAMI SELALU MENJAGA KEBERSIHAN RESTORAN <br> SERTA MENERAPKAN <br>
					STANDAR KEAMANAN PANGAN SETIAP SAAT <br>
				</span>
				<span class="text-desc">Jalan Bintara 8 No.2 Telepon  (021) 88951151<br>(021) 88951151 Website <span class="underline">www.warungkita.com</span> - Email <span class="underline">warungkita@gmail.com</span> <br> Jalan Bintara 8 No.2, Bintara, Bekasi Barat, Bintara, Bekasi Barat, RT.005/RW.003, Bintara, Kec. Bekasi Bar., Kota Bks, Jawa Barat 17134 <br> </span>
			</div>    
		</div>
		<!-- /header -->
		
		<hr class="border">
		
		<!-- content -->
		
		<div class="size2 text-center mb-1">LAPORAN PEMASUKAN</div>

		<h3 class="m-4">Pemasukan</h3>
		<table class="table-center mb-1">
			<thead>
				<tr>
                    <th>Invoice</th>
                    <th>Name</th>
                    <th>No Meja</th>
                    <th>Keterangan</th>
                    <th>Status Pembayaran</th>
                    <th>Jumlah Pajak</th>
                    <th>Jumlah Bayar</th>
				</tr>
			</thead>
			<tbody>
				@foreach($pemasukan as $hasil)
				<tr>
                    <td>{{ $hasil->code }}</td>
                    <td>{{ $hasil->customer_first_name }}</td>
                    <td>{{ $hasil->no_meja }}</td>
                    <td>{{ $hasil->keterangan }}</td>
                    <td>{{ $hasil->payment_status }}</td>
                    <td>{{ $hasil->tax_amount }}</td>
                    <td>{{ $hasil->grand_total }}</td>
                </tr>
				@endforeach
			</tbody>
		</table>
		<!-- /content -->
		
		<!-- footer -->
		<div>Dibuat oleh : {{ auth()->user()->name }}</div>
		<!-- /footer -->
	</body>
</html>