@extends('layout-dashboard.home')

@section('content')
                            <div class="col-md-12 mt-4">
                                <div class="card">
                                    <div class="card-body">
                                        <!-- title -->
                                        <div class="d-md-flex align-items-center">
                                            <div>
                                                <h3 class="card-title">List Order Received</h3>
                                            </div>
                                        </div>
                                        <!-- title -->
                                        <table class="table v-middle">
                                            <thead>
                                                <tr class="bg-light">
                                                    <th class="border-top-0">Id</th>
                                                    <th class="border-top-0">Item</th>
                                                    <th class="border-top-0">Quantity</th>
                                                    <th class="border-top-0">Unit Cost</th>
                                                    <th class="border-top-0">Total</th>
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
                                        <div class="row mt-5 pt-5">
                                            <div class="col-md-6">
                                                 <div id="accordion">
                                                    <div class="card">
                                                        <div class="card-header" id="headingOne">
                                                            <h5 class="mb-0">
                                                                <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne" style="text-decoration: none; color : #2a282b">
                                                                    Details
                                                                </button>
                                                            </h5>
                                                        </div>
                                                        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                                                            <div class="card-body">
                                                                <div class="table-responsive">
                                                                    <table class="table v-middle">
                                                                        <thead>
                                                                            <tr class="bg-light">
                                                                                <th class="border-top-0">Id</th>
                                                                                <th class="border-top-0">Dibuat Oleh</th>
                                                                                <th class="border-top-0">Dibuat Pada</th>
                                                                                <th class="border-top-0">Subtotal</th>
                                                                                <th class="border-top-0">Tax (10%)</th>
                                                                                <th class="border-top-0">Status</th>
                                                                                <th class="border-top-0">Total</th>
                                                                            </tr>
                                                                        </thead>
                                                                    <tbody>
                                                                       <tr>
                                                                            <td>{{$order->id}}</td>
                                                                            <td>{{ $order->customer_first_name }} {{ $order->customer_last_name }}</td>
                                                                            <td>{{ $order->created_at }}</td>
                                                                            <td>@currency($order->base_total_price)</td>
                                                                            <td>@currency($order->tax_amount)</td>
                                                                            <td>{{ $order->status }}</td>
                                                                            <td style="font-weight: bold;">@currency($order->grand_total)</td>
                                                                       </tr>
                                                                    </tbody>
                                                                </table>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @if (!$order->isPaid())
                                            <a href="{{ $order->payment_url }}" class="btn btn-primary">Lakukan Pembayaran</a>
                                        @endif
                                        <a href="/order/list" class="btn btn-success">Kembali</a>
                                    </div>
                                </div>
                            </div>
@endsection