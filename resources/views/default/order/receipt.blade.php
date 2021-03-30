<!doctype html>
<html lang="en">
@section('judul', 'Receipt | WarungKita')
<head>
    <title>Receipt</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!-- style -->
    <link rel="stylesheet" href="{{asset('warung_kita/assets/css/login.css')}}">

    <!-- Animation on scroll -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <!-- Fontawesome -->
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css">

    <!-- Font -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,900&display=swap" rel="stylesheet">
</head>

<body>
    <div class="container">
        <h3 class="text-center p-4">Invoice Orderan Anda</h3>
        <div class="bg-light p-5">
            <h1 class="text-center m-0">{{ $order->customer_first_name }}</h1>
            <div class="row pt-3 mb-2">
                <div class="col-md-6 pull-left mt-3">{{$order->payment_status}}</div>
                <div class="col-md-6 text-right">
                    <h5 class="pt-4">{{$order->code}}</h5>
                    <p class="text-muted mb-0"><i>Created at : {{$order->created_at->format('d/m/Y')}}</i></p>
                </div>
            </div>
            <div class="row b-t pt-5">
                <div class="col-md-6 pt-3 center">
                    <h5>Informasi Pelanggan</h5>
                    <p>{{ $order->customer_first_name }} {{ $order->customer_last_name }}</p>
                    <p>{{ $order->customer_phone }}</p>
                </div>
                <div class="col-md-6 text-right">
                    <h5>Detail Pemesanan</h5>
                    <p>No Meja: {{$order->no_meja}}</p>
                    <p>Keterangan: {{$order->keterangan}}</p>
                    <p>Payment Type: midtrans</p>
                    <p>Nama: {{ $order->customer_first_name }}</p>
                </div>
            </div>
            <table class="table">
                <tr>
                    <thead>
                        <td>Nama Pesanan</td>
                        <td>Quantity</td>
                        <td>Unit Cost</td>
                        <td>Total</td>
                    </thead>
                </tr>
                @forelse ($order->orderItems as $item)
                <tr>
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
            </table>
        </div>
        <div class="bg-dark text-white p-5">
            <div class="row">
                <div class="col-md-4">
                </div>
                <div class="col-md-3 text-right">
                    <h6>Sub - Total amount</h6>
                    <h3>@currency($order->base_total_price)</h3>
                </div>
                <div class="col-md-2 text-right">
                    <h6>Tax (10%)</h6>
                    <h3>@currency($order->tax_amount)</h3>
                </div>
                <div class="col-md-3 text-right">
                    <h6>Grand Total</h6>
                    <h3>@currency($order->grand_total)</h3>
                </div>
            </div>
        </div>
        <div class="my-5">
            <a href="javascript:window.print()" class="btn btn-primary hidden-print" @click.prevent="printme">Print</a>
        </div>
    </div>
    <!-- Optional JavaScript -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

    <!-- Animation on scroll -->
    <script>
        AOS.init();
    </script>
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
</body>

</html>