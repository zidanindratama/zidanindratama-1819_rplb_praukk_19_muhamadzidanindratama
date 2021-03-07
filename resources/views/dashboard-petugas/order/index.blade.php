@extends('layout-dashboard.home')

@section('content')
                            <div class="col-md-12 mt-4">
                                <div class="card">
                                    <div class="card-body">
                                        <!-- title -->
                                        <div class="d-md-flex align-items-center">
                                            <div>
                                                <h4 class="card-title">List Order</h4>
                                                <h5 class="card-subtitle">Diurutkan dari inputan terbaru</h5>
                                            </div>
                                        </div>
                                        <!-- title -->
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table v-middle">
                                            <thead>
                                                <tr class="bg-light">
                                                    <th class="border-top-0">Id</th>
                                                    <th class="border-top-0">Grand Total</th>
                                                    <th class="border-top-0">Status</th>
                                                    <th class="border-top-0">Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse ($orders as $order)
                                                    <tr>    
                                                        <td>
                                                            {{ $order->id }}<br>
                                                        </td>
                                                        <td>@currency($order->grand_total)</td>
                                                        <td>{{ $order->status }}</td>
                                                        <td>
                                                            <a href="{{ url('orders/received/'. $order->id) }}" class="btn btn-info btn-sm">details</a>
                                                        </td>
                                                    </tr>
                                                @empty
                                                    <tr>
                                                        <td colspan="5">No records found</td>
                                                    </tr>
                                                @endforelse
                                            </tbody>
                                        </table>
                                        {{ $orders->links() }}
                                    </div>
                                </div>
                            </div>
@endsection