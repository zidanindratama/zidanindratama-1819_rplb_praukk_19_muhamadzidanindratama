@extends('layout-dashboard.home')

@section('content')
<div class="col-md-12 mt-4">
                                <div class="card">
                                    <div class="card-body">
                                        <!-- title -->
                                        <div class="d-md-flex align-items-center">
                                            <div>
                                                <h4 class="card-title">List Reservasi</h4>
                                                <h5 class="card-subtitle">Diurutkan dari inputan terbaru</h5>
                                                <a href="/petugas/reservasi/create" class="btn btn-success">Tambah Reservasi</a>
                                            </div>
                                        </div>
                                        <!-- title -->
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table v-middle">
                                            <thead>
                                                <tr class="bg-light">
                                                    <th class="border-top-0">Id</th>
                                                    <th class="border-top-0">Akun</th>
                                                    <th class="border-top-0">Atas Nama</th>
                                                    <th class="border-top-0">No Meja</th>
                                                    <th class="border-top-0">Tanggal</th>
                                                    <th class="border-top-0">Keterangan</th>
                                                    <th class="border-top-0">Status</th>
                                                    <th class="border-top-0">Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
												@foreach($reservations as $reservasi)
                                                <tr>
                                                    <td>{{$reservasi->id}}</td>
                                                    <td>{{$reservasi->user->email}}</td>
                                                    <td>{{$reservasi->name}}</td>
                                                    <td>{{$reservasi->no_meja}}</td>
                                                    <td>{{$reservasi->created_at->diffForHumans()}}</td>
                                                    <td>{{$reservasi->keterangan}}</td>
                                                    <td>{{$reservasi->status}}</td>
                                                    <td>
                                                        <form action="/petugas/reservasi/{{$reservasi->id}}" method="post">
															@csrf
															@method('delete')
                                                            @if($reservasi->status == 'Booked')
                                                            <a href="/petugas/order/creates/{{$reservasi->id}}" class="btn btn-success">Order</a>
                                                            @endif
                                                            <a href="/petugas/reservasi/{{$reservasi->id}}" class="btn btn-primary">Detail</a>
                                                            <a href="/petugas/reservasi/{{$reservasi->id}}/edit" class="btn btn-warning">Edit</a>
                                                            <button type="submit" class="btn btn-danger">Hapus</button>
                                                        </form>
                                                    </td>
                                                </tr>
												@endforeach
                                            </tbody>
                                        </table>
										{{$reservations->links()}}
                                    </div>
                                </div>
                            </div>
@endsection